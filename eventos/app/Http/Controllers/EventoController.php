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
    $request->validate([
        'titulo' => 'required|max:255',
        'descricao' => 'required',
        'data_evento' => 'required|date',
        'local' => 'required|max:255'
    ]);

    Evento::create([
        'titulo' => $request->titulo,
        'descricao' => $request->descricao,
        'data_evento' => $request->data_evento,
        'local' => $request->local
    ]);

    return redirect()
        ->route('eventos.index')
        ->with('success', 'Evento cadastrado com sucesso!');
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
    $request->validate([
        'titulo' => 'required|max:255',
        'descricao' => 'required',
        'data_evento' => 'required|date',
        'local' => 'required|max:255'
    ]);

    $evento = Evento::findOrFail($id);

    $evento->update([
        'titulo' => $request->titulo,
        'descricao' => $request->descricao,
        'data_evento' => $request->data_evento,
        'local' => $request->local
    ]);

    return redirect()
        ->route('eventos.index')
        ->with('success', 'Evento atualizado com sucesso!');
}

    public function destroy(string $id)
{
    $evento = Evento::findOrFail($id);

    $evento->delete();

    return redirect()
        ->route('eventos.index')
        ->with('success', 'Evento removido com sucesso!');
}
}