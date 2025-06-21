<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\User;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('alunos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('alunos.create')->with(['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedUser = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validatedAluno = $request->validate([
            'matricula' => 'required|string|unique:alunos,matricula',
            'curso' => 'required|string',
            'data_nascimento' => 'required|date',
        ]);

        $user = User::create([
            'name' => $validatedUser['name'],
            'email' => $validatedUser['email'],
            'password' => bcrypt($validatedUser['password']),
            'tipo' => 'aluno',
        ]);

        Aluno::create([
            'user_id' => $user->id,
            'matricula' => $validatedAluno['matricula'],
            'curso' => $validatedAluno['curso'],
            'data_nascimento' => $validatedAluno['data_nascimento'],
        ]);

        return redirect()->route('admin.index')->with('success', 'Aluno criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aluno $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aluno $aluno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        //
    }
}
