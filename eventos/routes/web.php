<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Models\Evento;

Route::get('/dashboard', function () {

    $totalEventos = Evento::count();

    return view('dashboard', compact('totalEventos'));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('eventos', EventoController::class);

});

require __DIR__.'/auth.php';