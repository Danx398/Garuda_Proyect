<?php

use App\Http\Controllers\AuthLogin;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthLogin::class,'index'])->name('login');