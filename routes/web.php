<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthLogin;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SuperAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/generar-pdf', [PdfController::class, 'generarPdf']);

Route::get('/',[AuthLogin::class,'index'])->name('login');

Route::controller(AuthLogin::class)->group(function () {
    Route::post('/logear', 'logear')->name('logear');
    Route::get('/logout', 'logout')->name('logout');
});
Route::get('/dashSadm',[SuperAdmin::class,'index'])->name('inicio-sadmin');
Route::controller(SuperAdmin::class)->group(function () {
    Route::get('/dashSadm', 'index')->name('inicio-sadmin');
    Route::get('/nuevoAdmin', 'crearNuevoAdmin')->name('nuevo-sadmin');
    Route::post('/store', 'store')->name('guardar-sadmin');
    Route::get('/cambio', 'cambiar')->name('cambio-sadmin');
    Route::get('/cambiarPass/{id}', 'cambiarPass')->name('cambiarPass-sadmin');
    Route::get('/editarAdmin/{id}', 'editAdmin')->name('editar-sadmin');
    Route::put('/updateAdmin/{id}', 'updateAdmin')->name('actualizar-sadmin');
    Route::delete('/eliminar/{id}', 'destroy')->name('destroy-sadmin');
    Route::post('/cambiarContrasenia/{id}','cambioContrasenia')->name('cambiar-contrasenia');
});
Route::get('/dashAdm',[Admin::class,'index'])->name('admin');
Route::controller(Admin::class)->group(function () {
    Route::get('/dashAdm', 'index')->name('admin');
    Route::get('/creditosLib', 'creditosLib')->name('liberado-admin');
    Route::get('/agregarEvidencias', 'agregarEvidencias')->name('evidencias-admin');
    Route::get('/creditosTram', 'creditosTram')->name('tramite-admin');
    Route::get('/registrarAlum', 'registrarAlum')->name('registrar-admin');
    Route::get('/constanciasLibe', 'constanciasLib')->name('constancias-liberadas');
    Route::get('/evidencias', 'evidencias')->name('evidencias');
    Route::post('/darAlta','darAlta')->name('darAlta');
    Route::get('/editarAlumno/{id}','editAlumno')->name('editar-admin');
});
