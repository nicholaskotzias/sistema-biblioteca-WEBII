<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\AlunoController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AlunoMiddleware;
use App\Http\Controllers\Admin\AlunoController as AdminAlunoController;
use App\Http\Controllers\Admin\CategoriaController as AdminCategoriaController;
use App\Http\Controllers\Admin\AutorController as AdminAutorController;
use App\Http\Controllers\Admin\LivroController as AdminLivroController;
use App\Http\Controllers\Admin\ExemplarController as AdminExemplarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => view('admin.index'))->name('index');

    Route::get('/alunos', [AdminAlunoController::class, 'index'])->name('alunos.index');
    Route::get('/alunos/create', [AdminAlunoController::class, 'create'])->name('alunos.create');
    Route::post('/alunos', [AdminAlunoController::class, 'store'])->name('alunos.store');
    Route::delete('/alunos/{id}', [AdminAlunoController::class, 'destroy'])->name('alunos.destroy');

    Route::resource('/categorias', AdminCategoriaController::class);
    Route::resource('/autores', AdminAutorController::class);
    Route::resource('/livros', AdminLivroController::class);
    Route::resource('/exemplares', AdminExemplarController::class);

    Route::get('/emprestimos/pendentes', [EmprestimoController::class, 'indexAdmin'])->name('emprestimos.pendentes');
    Route::post('/emprestimos/aprovar/{id}', [EmprestimoController::class, 'aprovar'])->name('emprestimos.aprovar');
    Route::delete('/emprestimos/recusar/{id}', [EmprestimoController::class, 'recusar'])->name('emprestimos.recusar');
});

Route::middleware(['auth', AlunoMiddleware::class])->prefix('alunos')->name('alunos.')->group(function () {
    Route::get('/', [AlunoController::class, 'index'])->name('index');

    Route::get('/emprestimos', [EmprestimoController::class, 'indexAluno'])->name('emprestimos.index');
    Route::get('/emprestimos/solicitar', [EmprestimoController::class, 'formSolicitacao'])->name('emprestimos.form');
    Route::post('/emprestimos/solicitar/{exemplarId}', [EmprestimoController::class, 'solicitar'])->name('emprestimos.solicitar');
    Route::post('/emprestimos/devolver/{id}', [EmprestimoController::class, 'devolver'])->name('emprestimos.devolver');

    Route::get('/{id}', [AlunoController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [AlunoController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AlunoController::class, 'update'])->name('update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
