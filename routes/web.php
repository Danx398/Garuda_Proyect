<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthLogin;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SuperAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/generar-pdf', [PdfController::class, 'generarPdf']);

Route::controller(AuthLogin::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('/logear', 'logear')->name('logear');
    Route::get('/logout', 'logout')->name('logout');
});
Route::get('/dashSadm',[SuperAdmin::class,'index'])->name('inicio-sadmin');
Route::controller(SuperAdmin::class)->group(function () {
    // Route::get('/dashSadm', 'index')->name('inicio-Sadmin')->middleware('RolValido:Sadm');
    Route::get('/nuevoAdmin', 'crearNuevoAdmin')->name('nuevo-sadmin')->middleware('RolValido:Sadm');
    Route::post('/store', 'store')->name('guardar-sadmin')->middleware('RolValido:Sadm');
    Route::get('/cambio', 'cambiar')->name('cambio-sadmin')->middleware('RolValido:Sadm');
    Route::get('/cambiarPass/{id}', 'cambiarPass')->name('cambiarPass-sadmin')->middleware('RolValido:Sadm');
    Route::get('/editarAdmin/{id}', 'editAdmin')->name('editar-sadmin')->middleware('RolValido:Sadm');
    Route::put('/updateAdmin/{id}', 'updateAdmin')->name('actualizar-sadmin')->middleware('RolValido:Sadm');
    Route::delete('/eliminar/{id}', 'destroy')->name('destroy-sadmin')->middleware('RolValido:Sadm');
    Route::post('/cambiarContrasenia/{id}','cambioContrasenia')->name('cambiar-contrasenia')->middleware('RolValido:Sadm');
});
Route::get('/dashAdm',[Admin::class,'index'])->name('admin');
Route::controller(Admin::class)->group(function () {
    // Route::get('/dashAdm', 'index')->name('admin')->middleware('RolValido:admin');
    Route::get('/creditosLib', 'creditosLib')->name('liberado-admin')->middleware('RolValido:admin');
    Route::get('/agregarEvidencias', 'agregarEvidencias')->name('evidencias-admin')->middleware('RolValido:admin');
    Route::get('/creditosTram', 'creditosTram')->name('tramite-admin')->middleware('RolValido:admin');
    Route::get('/registrarAlum', 'registrarAlum')->name('registrar-admin')->middleware('RolValido:admin');
    Route::get('/constanciasLibe', 'constanciasLib')->name('constancias-liberadas')->middleware('RolValido:admin');
    Route::get('/evidencias', 'evidencias')->name('evidencias')->middleware('RolValido:admin');
});
