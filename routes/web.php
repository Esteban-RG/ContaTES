<?php

use App\Http\Controllers\Admin\AdminUsers;
use App\Http\Controllers\Admin\AdminPlazas;
use App\Http\Controllers\Admin\AdminPermisos;
use App\Http\Controllers\Admin\AdminBonos;
use App\Http\Controllers\Admin\AdminEmpleados;
use App\Http\Controllers\Admin\AdminDeducciones;
use App\Http\Controllers\Admin\BonoEmpleadoController;
use App\Http\Controllers\Admin\AdminTarifas;
use App\Http\Controllers\NominaController;
use App\Http\Controllers\LicenciaController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\TwoFactorAuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ProfileController;


Route::get('/2fa', [TwoFactorAuthController::class, 'show2faForm'])->name('2fa.form');
Route::post('/2fa/verify', [TwoFactorAuthController::class, 'verify2fa'])->name('2fa.verify');

Route::get('/', function () {
    return view('guest');
})->name('guest');



Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/terms', function () {
    return view('terminos');
})->name('terminos');

Route::get('/forgot', function () {
    return view('auth.forgot-password');
});


// Rutas para 2FA
Route::middleware('auth')->group(function () {
   
    

});



Route::middleware('auth','2fa')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

    

    Route::get('/home', [HomeController::class, 'show'])->name('home')->middleware('isAdmin');

    
    

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('/nomina', [NominaController::class, 'show'])->name('show_nomina');
    Route::get('/nomina/{nomina}', [NominaController::class, 'details'])->name('details-nomina');
    Route::post('/nomina/{empleado}', [NominaController::class, 'store'])->name('create-nomina');
    Route::get('/nomina/pdf/{id}', [NominaController::class, 'descargarPDF'])->name('nomina-pdf');
    Route::get('/nomina/export/{matricula}', [NominaController::class, 'export'])->name('nomina-export');

    Route::get('/licencia', [LicenciaController::class, 'show'])->name('show_licencia');

    Route::get('/permiso', [PermisoController::class, 'show'])->name('show-permiso');
    Route::post('/permiso', [PermisoController::class, 'store'])->name('store-permiso');

    Route::get('/expediente', [ExpedienteController::class, 'show'])->name('show-expediente');



});

Route::middleware('guest')->group(function() {
    Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');

});



Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('dashboard');


    Route::get('/admin/user', [AdminUsers::class, 'show'] )->name('admin-user');
    Route::post('/admin/user',[AdminUsers::class, 'store' ])->name('admin-user-create');
    Route::delete('/admin/user/{user}',[AdminUsers::class, 'destroy'])->name('admin-user-destroy');
    Route::get('/admin/user/{user}/edit/',[AdminUsers::class, 'edit'])->name('admin-user-edit');
    Route::put('/admin/user/{user}',[AdminUsers::class, 'update'])->name('admin-user-update');

    Route::get('/admin/plaza', [AdminPlazas::class, 'show'] )->name('admin-plaza');
    Route::post('/admin/plaza',[AdminPlazas::class, 'store' ])->name('admin-plaza-create');
    Route::delete('/admin/plaza/{plaza}',[AdminPlazas::class, 'destroy'])->name('admin-plaza-destroy');
    Route::get('/admin/plaza/{plaza}/edit/',[AdminPlazas::class, 'edit'])->name('admin-plaza-edit');
    Route::put('/admin/plaza/{plaza}',[AdminPlazas::class, 'update'])->name('admin-plaza-update');

    Route::get('/admin/permisos', [AdminPermisos::class, 'show'] )->name('admin-permisos');
    Route::post('/admin/permisos',[AdminPermisos::class, 'store' ])->name('admin-permisos-create');
    Route::delete('/admin/permisos/{permisos}',[AdminPermisos::class, 'destroy'])->name('admin-permisos-destroy');
    Route::get('/admin/permisos/{permisos}/edit/',[AdminPermisos::class, 'edit'])->name('admin-permisos-edit');

    Route::put('/admin/permisos/{permisos}/allow',[AdminPermisos::class, 'allow'])->name('admin-permisos-allow');
    Route::put('/admin/permisos/{permisos}/deny',[AdminPermisos::class, 'deny'])->name('admin-permisos-deny');




    Route::get('/admin/bono', [AdminBonos::class, 'show'] )->name('admin-bono');
    Route::post('/admin/bono',[AdminBonos::class, 'store' ])->name('admin-bono-create');
    Route::delete('/admin/bono/{bono}',[AdminBonos::class, 'destroy'])->name('admin-bono-destroy');
    Route::get('/admin/bono/{bono}/edit/',[AdminBonos::class, 'edit'])->name('admin-bono-edit');
    Route::put('/admin/bono/{bono}',[AdminBonos::class, 'update'])->name('admin-bono-update');

    Route::get('/admin/empleado', [AdminEmpleados::class, 'show'] )->name('admin-empleado');
    Route::post('/admin/empleado',[AdminEmpleados::class, 'store' ])->name('admin-empleado-create');
    Route::delete('/admin/empleado/{empleado}',[AdminEmpleados::class, 'destroy'])->name('admin-empleado-destroy');
    Route::get('/admin/empleado/{empleado}/edit/',[AdminEmpleados::class, 'edit'])->name('admin-empleado-edit');
    Route::get('/admin/empleado/{empleado}',[AdminEmpleados::class, 'details'])->name('admin-empleado-details');
    Route::put('/admin/empleado/{empleado}',[AdminEmpleados::class, 'update'])->name('admin-empleado-update');

    Route::get('/admin/empleado/{empleado}/nomina',[AdminEmpleados::class, 'showNominas'])->name('empleado-show-nomina');

    Route::get('admin/empleado/{empleado}/bonos', [BonoEmpleadoController::class, 'getBonos'])->name('empleado-get-bono');
    Route::post('admin/empleado/{empleado}/bonos', [BonoEmpleadoController::class, 'assignBono'])->name('empleado-assign-bono');
    Route::delete('admin/empleado/{empleado}/bonos/{bono}', [BonoEmpleadoController::class, 'removeBono'])->name('empleado-remove-bono');


    Route::get('/admin/deduccion', [AdminDeducciones::class, 'show'] )->name('admin-deduccion');
    Route::post('/admin/deduccion',[AdminDeducciones::class, 'store' ])->name('admin-deduccion-create');
    Route::delete('/admin/deduccion/{deduccion}',[AdminDeducciones::class, 'destroy'])->name('admin-deduccion-destroy');
    Route::get('/admin/deduccion/{deduccion}/edit/',[AdminDeducciones::class, 'edit'])->name('admin-deduccion-edit');
    Route::put('/admin/deduccion/{deduccion}',[AdminDeducciones::class, 'update'])->name('admin-deduccion-update');

    Route::get('/admin/tarifa/{isr}/edit/',[AdminTarifas::class, 'edit'])->name('admin-tarifa-edit');
    Route::put('/admin/tarifa/{isr}',[AdminTarifas::class, 'update'])->name('admin-tarifa-update');


});
