<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthLogin;
use App\Http\Controllers\SuperAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthLogin::class,'index'])->name('login');

Route::controller(SuperAdmin::class)->group(function(){
    Route::get('/dashSadm','index')->name('inicio-sadmin');
    Route::get('/cambiarPass','cambiarPass')->name('cambiarPass-sadmin');
    Route::get('/nuevoAdmin','crearNuevoAdmin')->name('nuevo-sadmin');
});

Route::controller(Admin::class)->group(function(){
    Route::get('/dashAdm','index')->name('admin');
    Route::get('/creditosLib','creditosLib')->name('liberado-admin');
    Route::get('/evidencias','evidencias')->name('evidencias-admin');
    Route::get('/creditosTram','creditosTram')->name('tramite-admin');
    Route::get('/registrarAlum','registrarAlum')->name('registrar-admin');
});
