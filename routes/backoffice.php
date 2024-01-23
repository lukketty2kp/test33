<?php


use App\Http\Controllers\RoleController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Admin.index');
})->name('dashboard');

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);


