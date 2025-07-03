<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Livro;
use App\Models\Categoria;
use App\Models\Autor;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Livro::with(['autor', 'categoria'])->paginate(10);
        return view('admin.livros.index', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $autores = Autor::all();

        return view('admin.livros.create', compact('categorias', 'autores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'isbn' => 'required|string|max:20|unique:livros,isbn',
            'descricao' => 'nullable|string',
            'ano_publicacao' => 'required|integer|min:1000|max:' . date('Y'),
            'categoria_id' => 'required|exists:categorias,id',
            'autor_id' => 'required|exists:autores,id',
        ]);

        Livro::create($validated);

        return redirect()->route('admin.livros.index')->with('success', 'Livro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $livro = Livro::with(['autor', 'categoria'])->findOrFail($id);
        return view('admin.livros.show', compact('livro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $livro = Livro::findOrFail($id);
        $categorias = Categoria::all();
        $autores = Autor::all();

        return view('admin.livros.edit', compact('livro', 'categorias', 'autores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livro $livro)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'isbn' => 'required|string|max:20|unique:livros,isbn,' . $livro->id,
            'descricao' => 'nullable|string',
            'ano_publicacao' => 'required|integer|min:1000|max:' . date('Y'),
            'categoria_id' => 'required|exists:categorias,id',
            'autor_id' => 'required|exists:autores,id',
        ]);

        $livro->update($validated);

        return redirect()->back()->with('success', 'Livro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();

        return redirect()->route('admin.livros.index')->with('success', 'Livro deletado com sucesso');
    }
}
