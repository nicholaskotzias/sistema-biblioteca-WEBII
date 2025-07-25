<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\User;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::with('user')->paginate(10);
        return view('admin.alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.alunos.create')->with(['users' => $users]);
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

        return redirect()->route('admin.alunos.index')->with('success', 'Aluno criado com sucesso!');
    }

    public function destroy(string $id)
    {
        $aluno = Aluno::with('user')->findOrFail($id);

        $aluno->user->delete();
        $aluno->delete();

        return redirect()->route('admin.alunos.index')->with('success', 'Aluno excluído com sucesso.');
    }
}
