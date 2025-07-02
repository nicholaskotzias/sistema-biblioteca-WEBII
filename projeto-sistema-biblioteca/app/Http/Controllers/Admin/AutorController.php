<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = Autor::paginate(10);
        return view('admin.autores.index', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.autores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:3|max:100',
            'biografia' => 'required|string|min:50|max:1000',
            'nacionalidade' => 'required|string|min:3|max:20',
        ]);

        Autor::create([
            'nome' => $request->nome,
            'biografia' => $request->biografia,
            'nacionalidade' => $request->nacionalidade,
        ]);

        return redirect()->route('admin.autores.index')->with('success', 'Autor criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $autor = Autor::findOrFail($id);

        return view('admin.autores.show')->with(['autor' => $autor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $autor = Autor::findOrFail($id);

        return view('admin.autores.edit')->with(['autor' => $autor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $autor = Autor::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|min:3|max:100',
            'biografia' => 'required|string|min:50|max:1000',
            'nacionalidade' => 'required|string|min:3|max:20',
        ]);

        $autor->update([
            'nome' => $request->nome,
            'biografia' => $request->biografia,
            'nacionalidade' => $request->nacionalidade,
        ]);

        return redirect()->route('admin.autores.index')->with('success', 'Autor atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();

        return redirect()->route('admin.autores.index')->with('success', 'Autor deletado com sucesso');
    }
}
