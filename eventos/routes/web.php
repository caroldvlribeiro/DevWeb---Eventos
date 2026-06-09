<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
use App\Models\Evento;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Página Institucional
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $eventos = Evento::all();

    return view('welcome', compact('eventos'));
})->name('home');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/


Route::get('/dashboard', function () {

    $totalEventos = Evento::count();
    $eventos = Evento::latest()->take(6)->get();

    return view('dashboard', compact(
        'totalEventos',
        'eventos'
    ));

})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Rotas Protegidas
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de Eventos
    Route::resource('eventos', EventoController::class);

});

/*
|--------------------------------------------------------------------------
| Autenticação
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';