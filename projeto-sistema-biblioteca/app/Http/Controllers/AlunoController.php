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

    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.show')->with(['aluno' => $aluno]);
    }

    public function edit(string $id)
    {
        $aluno = Aluno::with('user')->findOrFail($id);

        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, $id)
    {
        $aluno = Aluno::with('user')->findOrFail($id);

        $validatedUser = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $aluno->user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $validatedAluno = $request->validate([
            'matricula' => 'required|string|unique:alunos,matricula,' . $aluno->id,
            'curso' => 'required|string',
            'data_nascimento' => 'required|date',
        ]);

        $aluno->user->name = $validatedUser['name'];
        $aluno->user->email = $validatedUser['email'];

        if (!empty($validatedUser['password'])) {
            $aluno->user->password = bcrypt($validatedUser['password']);
        }

        $aluno->user->save();

        $aluno->update($validatedAluno);

        $rota = auth()->user()->tipo === 'admin' ? 'admin.alunos.index' : 'alunos.index';

        return redirect()->route($rota, $aluno->id)->with('success', 'Aluno atualizado com sucesso.');
    }
}
