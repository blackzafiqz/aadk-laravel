<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function ()
{
    return view('welcome');
});
Route::get('/admin', function ()
{
    return view('skuad');
});
Route::resource('employees', EmployeeController::class);
