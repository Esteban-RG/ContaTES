<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\returnSelf;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $table = $this->input('table');

        if ($table == 'user') {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $this->user()->id,
            ];
        }
    
        if ($table == 'personal') {
            return [
                'nombre' => 'required|string|max:100',
                'ap_paterno' => 'required|string|max:100',
                'ap_materno' => 'nullable|string|max:100',
                'telefono' => 'nullable|string|max:20',
                'genero' => 'nullable|in:M,F',
            ];
        }

        if($table == 'laboral'){
            return[
                'curp' => 'nullable|file|mimes:pdf|max:2048', // Máximo 2MB
                'rfc' => 'nullable|file|mimes:pdf|max:2048',
                'nss' => 'nullable|file|mimes:pdf|max:2048',
            ];
        }
    }


    public function messages(): array
    {
        return [
            'curp.mimes' => 'El CURP debe ser un archivo PDF',
            'rfc.mimes' => 'El RFC debe ser un archivo PDF',
            'nss.mimes' => 'El NSS debe ser un archivo PDF',
            '*.max' => 'El archivo no debe superar los 2MB',
        ];
    }
    
}
