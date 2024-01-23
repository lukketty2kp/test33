<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/invoice', [App\Http\Controllers\InvoiceController::class, 'generateInvoiceFront'] )->name('invoice');
