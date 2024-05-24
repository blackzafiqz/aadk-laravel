<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PelajarController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\AlamatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return view('welcome');
});

Route::get('/dashboard', function ()
{
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function ()
{
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Route::middleware('auth')->group(function () {
Route::prefix('admin')->group(function ()
{
    Route::prefix('alamat')->group(function ()
    {
        Route::get('/', [AlamatController::class, 'index'])->name('alamat.index');
        Route::get('/create', [AlamatController::class, 'create'])->name('alamat.create');
        Route::post('/', [AlamatController::class, 'store'])->name('alamat.store');
        Route::get('/{alamat}', [AlamatController::class, 'show'])->name('alamat.show');
        Route::get('/{alamat}/edit', [AlamatController::class, 'edit'])->name('alamat.edit');
        Route::put('/{alamat}', [AlamatController::class, 'update'])->name('alamat.update');
        Route::delete('/{alamat}', [AlamatController::class, 'destroy'])->name('alamat.destroy');
    });
});
//});
require __DIR__ . '/auth.php';
