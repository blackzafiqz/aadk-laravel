<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\PelajarController;
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


        Route::get('/negeri', [AlamatController::class, 'negeri'])->name('alamat.negeri');
        Route::get('/daerah/{negeri}', [AlamatController::class, 'daerah'])->name('alamat.daerah');
        Route::get('/mukim/{daerah}', [AlamatController::class, 'mukim'])->name('alamat.mukim');
        Route::get('/poskod', [AlamatController::class, 'poskod'])->name('alamat.poskod');

        Route::get('/{alamat}', [AlamatController::class, 'show'])->name('alamat.show');
        Route::get('/{alamat}/edit', [AlamatController::class, 'edit'])->name('alamat.edit');
        Route::put('/{alamat}', [AlamatController::class, 'update'])->name('alamat.update');
        Route::delete('/{alamat}', [AlamatController::class, 'destroy'])->name('alamat.destroy');
    });
    Route::prefix('sekolah')->group(function ()
    {
        Route::get('/', [SekolahController::class, 'index'])->name('sekolah.index');
        Route::get('/create', [SekolahController::class, 'create'])->name('sekolah.create');
        Route::post('/', [SekolahController::class, 'store'])->name('sekolah.store');

        Route::get('/findByPostcode/{postcode}', [SekolahController::class, 'findByPostcode'])->name('sekolah.findByPostcode');

        Route::get('/{sekolah}', [SekolahController::class, 'show'])->name('sekolah.show');
        Route::get('/{sekolah}/edit', [SekolahController::class, 'edit'])->name('sekolah.edit');
        Route::put('/{sekolah}', [SekolahController::class, 'update'])->name('sekolah.update');
        Route::delete('/{sekolah}', [SekolahController::class, 'destroy'])->name('sekolah.destroy');
    });

    Route::prefix('pelajar')->group(function ()
    {
        Route::get('/', [PelajarController::class, 'index'])->name('pelajar.index');
        Route::get('/create', [PelajarController::class, 'create'])->name('pelajar.create');
        Route::post('/', [PelajarController::class, 'store'])->name('pelajar.store');
        Route::get('/{pelajar}', [PelajarController::class, 'show'])->name('pelajar.show');
        Route::get('/{pelajar}/edit', [PelajarController::class, 'edit'])->name('pelajar.edit');
        Route::put('/{pelajar}', [PelajarController::class, 'update'])->name('pelajar.update');
        Route::delete('/{pelajar}', [PelajarController::class, 'destroy'])->name('pelajar.destroy');
    });
});
//});
require __DIR__ . '/auth.php';
