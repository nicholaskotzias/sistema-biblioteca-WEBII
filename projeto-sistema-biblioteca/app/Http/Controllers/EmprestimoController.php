<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Exemplar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EmprestimoController extends Controller
{
    public function indexAluno()
    {
        $aluno = Auth::user()->aluno;

        $meusEmprestimos = $aluno->emprestimos()
            ->with('exemplar.livro')
            ->orderBy('data_emprestimo', 'desc')
            ->get();

        $exemplaresDisponiveis = Exemplar::where('status', 'DISPONIVEL')
            ->with('livro')
            ->get();

        return view('alunos.emprestimos.index', compact('meusEmprestimos', 'exemplaresDisponiveis'));
    }

    public function formSolicitacao()
    {
        $exemplaresDisponiveis = Exemplar::where('status', 'DISPONIVEL')
            ->with('livro')
            ->get();

        return view('alunos.emprestimos.solicitar', compact('exemplaresDisponiveis'));
    }

    public function solicitar($exemplarId)
    {
        $user = Auth::user();

        if ($user->tipo !== 'aluno') {
            return back()->with('error', 'Apenas alunos podem solicitar empréstimos.');
        }

        $aluno = $user->aluno;
        $exemplar = Exemplar::findOrFail($exemplarId);

        if ($exemplar->status !== 'DISPONIVEL') {
            return back()->with('error', 'Este exemplar não está disponível.');
        }

        $ativos = $aluno->emprestimos()
            ->whereIn('status', ['PENDENTE', 'APROVADO'])
            ->count();

        if ($ativos >= 3) {
            return back()->with('error', 'Você já possui 3 empréstimos ativos.');
        }

        Emprestimo::create([
            'aluno_id' => $aluno->id,
            'exemplar_id' => $exemplar->id,
            'data_emprestimo' => now(),
            'data_devolucao_prevista' => now()->addDays(14),
            'status' => 'PENDENTE',
        ]);

        $exemplar->update(['status' => 'EMPRESTADO']);

        return back()->with('success', 'Empréstimo solicitado com sucesso.');
    }

    public function devolver($id)
    {
        $aluno = Auth::user()->aluno;
        $emprestimo = Emprestimo::where('id', $id)
            ->where('aluno_id', $aluno->id)
            ->where('status', 'APROVADO')
            ->firstOrFail();

        $emprestimo->update([
            'status' => 'DEVOLVIDO',
            'data_devolucao_real' => now(),
        ]);

        $emprestimo->exemplar->update([
            'status' => 'DISPONIVEL',
        ]);

        return back()->with('success', 'Empréstimo devolvido com sucesso.');
    }

    public function indexAdmin()
    {
        if (Auth::user()->tipo !== 'admin') {
            abort(403);
        }

        $emprestimos = Emprestimo::where('status', 'PENDENTE')
            ->with('aluno.user', 'exemplar.livro')
            ->orderBy('data_emprestimo', 'asc')
            ->get();

        return view('admin.emprestimos.index', compact('emprestimos'));
    }

    public function aprovar($id)
    {
        if (Auth::user()->tipo !== 'admin') {
            abort(403);
        }

        $emprestimo = Emprestimo::findOrFail($id);

        if ($emprestimo->status !== 'PENDENTE') {
            return back()->with('error', 'Este empréstimo já foi analisado.');
        }

        $emprestimo->update(['status' => 'APROVADO']);

        return back()->with('success', 'Empréstimo aprovado com sucesso.');
    }

    public function recusar($id)
    {
        if (Auth::user()->tipo !== 'admin') {
            abort(403);
        }

        $emprestimo = Emprestimo::findOrFail($id);

        if ($emprestimo->status !== 'PENDENTE') {
            return back()->with('error', 'Este empréstimo não pode ser recusado.');
        }

        $emprestimo->exemplar->update(['status' => 'DISPONIVEL']);
        $emprestimo->delete();

        return back()->with('success', 'Empréstimo recusado com sucesso.');
    }
}
