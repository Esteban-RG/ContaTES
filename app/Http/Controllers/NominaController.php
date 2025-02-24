<?php

namespace App\Http\Controllers;

use App\Models\Deduccion;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Empleado;
use App\Models\Nomina;
use App\Models\ISR;
use App\Models\OtraDeduccion;
use App\Models\Percepcion;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Barryvdh\DomPDF\Facade\Pdf ;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Illuminate\Http\RedirectResponse;




class NominaController extends Controller
{
    public function show(Request $request): View
    {
        $user = User::with(['persona.empleado.nominas'])->find($request->user()->id); 

        
        // Verificar si el usuario existe
        if (!$user || !$user->persona || !$user->persona->empleado) {
            abort(404, 'Usuario no encontrado o sin datos de nómina');
        }

        // Obtener las nóminas si el usuario tiene un empleado asociado
        $nominas = $user->persona->empleado->nominas ?? collect(); // Evitar error si no hay relación

        return view('nomina', compact(['user', 'nominas']));
    }


    public function store(Request $request, Empleado $empleado): RedirectResponse
    {

       

        $request->validate([
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['required', 'date', 'after_or_equal:fecha_inicio'],
        ]);

        $nomina = Nomina::create([
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'empleado_id' => $empleado->id 
        ]);

        $fecha_inicio = $request -> fecha_inicio;
        $fecha_fin = $request -> fecha_fin;

        $deducciones_globales = OtraDeduccion::all();
        $sueldo_quincenal = $empleado->plaza->sueldo;
        $sueldo_quincenal_neto = $sueldo_quincenal;
        $sueldo_quincenal_bruto = $sueldo_quincenal;

        //APLICAR PERCEPCIONES
        
        $percepcion = Percepcion::create([
            'nombre' => 'Sueldo quincenal',
            'valor' => $sueldo_quincenal,
            'nomina_id' => $nomina->id,
        ]);

        $bonos = $empleado->bonos;

        foreach ($bonos as $key => $bono) {
            $percepcion = Percepcion::create([
                'nombre' => $bono->descripcion,
                'valor' => $bono->monto,
                'nomina_id' => $nomina->id,
            ]);

            $sueldo_quincenal_bruto += $bono->monto;
            $sueldo_quincenal_neto += $bono->monto;
        }


        //APLICAR DEDUCCIONES
        foreach ($deducciones_globales as $key => $deduccion_global) {

            if ($deduccion_global->tipo == 'porcentual') {
                $deduccion_aplicada = $sueldo_quincenal_bruto * ($deduccion_global->valor / 100);
            } elseif ($deduccion_global->tipo == 'fijo') {
                $deduccion_aplicada = $deduccion_global->valor;
            }

            $deduccion = Deduccion::create([
                'nombre' => $deduccion_global->descripcion,
                'valor' => $deduccion_aplicada,
                'nomina_id' => $nomina->id,
            ]);

            $sueldo_quincenal_neto -= $deduccion_aplicada;
            
        }

        $permisos = $empleado->permisos()
                ->where('estado', 'aceptado')
                ->whereIn('descripcion', ['sin_sueldo', 'falta'])
                ->whereBetween('fecha', [$fecha_inicio, $fecha_fin])
                ->get();

        $sueldo_por_dia = $sueldo_quincenal / 15;

        foreach ($permisos as $permiso){
            $deduccion = Deduccion::create([
                'nombre' => $permiso->descripcion." (".$permiso->fecha.")",
                'valor' => $sueldo_por_dia,
                'nomina_id' => $nomina->id,
            ]);
            $sueldo_quincenal_neto -= $sueldo_por_dia;

        }

        //CALCULAR ISR

        $tarifas_isr = ISR::all();

        foreach ($tarifas_isr as $tarifa) 
        {
            if ($sueldo_quincenal_neto >= $tarifa->limite_inferior &&
                ($tarifa->limite_superior === null || $sueldo_quincenal_neto <= $tarifa->limite_superior)) 
            {
            
                $isr_aplicado = $tarifa->cuota_fija + ($sueldo_quincenal_neto - $tarifa->limite_inferior) * ($tarifa->porcentaje_aplicable / 100);
                
                Deduccion::create([
                    'nombre' => 'ISR',
                    'valor' => $isr_aplicado,
                    'nomina_id' => $nomina->id,
                ]);
                $sueldo_quincenal_neto -= $isr_aplicado; // Restar el ISR del sueldo neto
                break;
            }
        }

       

        

        

        
        $nomina->salario_bruto = $sueldo_quincenal_bruto;
        $nomina->salario_neto = $sueldo_quincenal_neto;

        $nomina->save();

        return redirect()->route('empleado-show-nomina',$empleado->id )->with('success', 'Nomina generada correctamente.');
    }



    public function details(Request $request, Nomina $nomina): View
    {

        return view('details-nomina', compact('nomina'));
    }

    public function descargarPDF($id)
    {
        $nomina = Nomina::with(['percepciones', 'deducciones'])->findOrFail($id);
        $pdf = Pdf::loadView('pdf.nomina', compact('nomina'));
        
        return $pdf->download('nomina_'.$id.'.pdf'); // Descargar el archivo PDF
    }

    public function export($matricula)
    {
        $empleado = Empleado::where('matricula', $matricula)->first();
    
        if (!$empleado) {
            return redirect()->back()->with('error', 'Empleado no encontrado');
        }
    
        $nominas = $empleado->nominas;
    
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        $sheet->setCellValue('A1', 'Folio');
        $sheet->setCellValue('B1', 'Fecha inicio');
        $sheet->setCellValue('C1', 'Fecha final');
        $sheet->setCellValue('D1', 'Matricula');
        $sheet->setCellValue('E1', 'Nombre empleado');
        $sheet->setCellValue('F1', 'Plaza');
        $sheet->setCellValue('G1', 'Sueldo quincenal');
        $sheet->setCellValue('H1', 'Total percepciones');
        $sheet->setCellValue('I1', 'Total deducciones');
        $sheet->setCellValue('J1', 'Salario bruto');
        $sheet->setCellValue('K1', 'Salario neto');

        // Crear un estilo para el encabezado
        $headerStyle = [
            'font' => [
                'bold' => true, // Texto en negrita
                'color' => ['rgb' => 'FFFFFF'], // Color de la letra (blanco)
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID, // Relleno sólido
                'startColor' => ['rgb' => '069a2e'], // Color de fondo (azul)
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER, // Alinear texto al centro
                'vertical' => Alignment::VERTICAL_CENTER, // Alinear texto verticalmente al centro
            ],
        ];

        // Aplicar el estilo a las celdas del encabezado
        $sheet->getStyle('A1:K1')->applyFromArray($headerStyle);
    
        $row = 2;
        foreach ($nominas as $nomina) {

            $sheet->setCellValue('A' . $row, $nomina->id);
            $sheet->setCellValue('B' . $row, $nomina->fecha_inicio);
            $sheet->setCellValue('C' . $row, $nomina->fecha_fin);
            $sheet->setCellValue('D' . $row, $empleado->matricula);
    
            $nombreEmpleado = $empleado->persona
                ? $empleado->persona->nombre . ' ' . $empleado->persona->ap_paterno . ' ' . $empleado->persona->ap_materno
                : 'N/A';
            $sheet->setCellValue('E' . $row, $nombreEmpleado);
    
            $plazaNombre = $empleado->plaza ? $empleado->plaza->nombre : 'N/A';
            $sheet->setCellValue('F' . $row, $plazaNombre);
    
            $sueldoQuincenal = $empleado->plaza ? $empleado->plaza->sueldo : 'N/A';
            $sheet->setCellValue('G' . $row, $sueldoQuincenal);
    
            $totalPercepciones = 0;
            $totalDeducciones = 0;

            foreach ($nomina->percepciones as $percepcion) {
                $totalPercepciones += $percepcion->valor;
            }

            foreach ($nomina->deducciones as $deduccion) {
                $totalDeducciones += $deduccion->valor;
            }

            $sheet->setCellValue('H' . $row, $totalPercepciones);
            $sheet->setCellValue('I' . $row, $totalDeducciones);
            $sheet->setCellValue('J' . $row, $nomina->salario_bruto);
            $sheet->setCellValue('K' . $row, $nomina->salario_neto);
    
            $row++;
        }
    
        $writer = new Xlsx($spreadsheet);
    
        $fileName = 'nomina_' . $matricula . '.xlsx';
    
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        $writer->save('php://output');
        exit;
    }
}
