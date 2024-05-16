<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function ()
{
    return view('welcome');
});
Route::get('/skuad', function ()
{
    return view('skuad');
});
Route::resource('employees', EmployeeController::class);


Route::get('/login', function ()
{
    return view('authentication/login');
});
Route::get('/register', function ()
{
    return view('authentication/register');
});
