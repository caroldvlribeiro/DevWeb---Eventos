<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();

        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        Evento::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'data_evento' => $request->data_evento,
            'local' => $request->local
        ]);

        return redirect()->route('eventos.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $evento = Evento::findOrFail($id);

        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, string $id)
    {
        $evento = Evento::findOrFail($id);

        $evento->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'data_evento' => $request->data_evento,
            'local' => $request->local
        ]);

        return redirect()->route('eventos.index');
    }

    public function destroy(string $id)
    {
        $evento = Evento::findOrFail($id);

        $evento->delete();

        return redirect()->route('eventos.index');
    }
}