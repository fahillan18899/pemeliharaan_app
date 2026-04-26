<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\PemeliharaanDuaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// PUBLIC (tanpa login)
Route::get('/pemeliharaan/{id}', [PemeliharaanController::class, 'view']);
Route::get('/pemeliharaan/print/{id}', [PemeliharaanController::class, 'print'])->name('pemeliharaan.print');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [PemeliharaanController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('pemeliharaan', PemeliharaanController::class);
    Route::resource('pemeliharaandua', PemeliharaanDuaController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
