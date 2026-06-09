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
            'valor' => 'required|numeric|min:0',
            'quantidade_vagas' => 'required|integer|min:1'
        ]);
        
    Evento::create([
        'titulo' => $request->titulo,
        'descricao' => $request->descricao,
        'data_evento' => $request->data_evento,
        'valor' => $request->valor,
        'quantidade_vagas' => $request->quantidade_vagas,
    ]);

    return redirect()
        ->route('eventos.index')
        ->with('success', 'Evento cadastrado com sucesso!');
}

    public function show(Evento $evento)
    {
        return view('eventos.show', compact('evento'));
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
            'valor' => 'required|numeric|min:0',
            'quantidade_vagas' => 'required|integer|min:1'
    ]);

    $evento = Evento::findOrFail($id);

    $evento->update([
        'titulo' => $request->titulo,
        'descricao' => $request->descricao,
        'data_evento' => $request->data_evento,
        'valor' => $request->valor,
        'quantidade_vagas' => $request->quantidade_vagas
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