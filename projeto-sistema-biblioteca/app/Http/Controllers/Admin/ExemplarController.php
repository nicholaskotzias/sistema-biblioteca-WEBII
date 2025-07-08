<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exemplar;
use App\Models\Livro;
use Illuminate\Http\Request;

class ExemplarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exemplares = Exemplar::with('livro')->paginate(10);
        return view('admin.exemplares.index', compact('exemplares'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $livros = Livro::all();
        return view('admin.exemplares.create', compact('livros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'livro_id' => 'required|exists:livros,id',
            'codigo_exemplar' => 'required|string|max:50|unique:exemplares,codigo_exemplar',
            'status' => 'required|in:DISPONIVEL,EMPRESTADO,DANIFICADO,PERDIDO',
            'localizacao' => 'nullable|string|max:100',
        ]);

        Exemplar::create($validated);

        return redirect()->route('admin.exemplares.index')->with('success', 'Exemplar criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exemplar = Exemplar::with('livro.autor')->findOrFail($id);
        return view('admin.exemplares.show', compact('exemplar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exemplar = Exemplar::findOrFail($id);
        $livros = Livro::all();

        return view('admin.exemplares.edit', compact('exemplar', 'livros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $exemplar = Exemplar::findOrFail($id);

        $validated = $request->validate([
            'livro_id' => 'required|exists:livros,id',
            'codigo_exemplar' => 'required|string|max:50|unique:exemplares,codigo_exemplar,' . $exemplar->id,
            'status' => 'required|in:DISPONIVEL,EMPRESTADO,DANIFICADO,PERDIDO',
            'localizacao' => 'nullable|string|max:100',
        ]);

        $exemplar->update($validated);

        return redirect()->route('admin.exemplares.index')->with('success', 'Exemplar atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exemplar = Exemplar::findOrFail($id);
        $exemplar->delete();

        return redirect()->route('admin.exemplares.index')->with('success', 'Exemplar deletado com sucesso');
    }
}
