<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AlunoMiddleware;
use App\Http\Controllers\Admin\AlunoController as AdminAlunoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin.index');
    Route::get('/admin/alunos', [AdminAlunoController::class, 'index'])->name('admin.alunos.index');
    Route::get('/admin/alunos/create', [AdminAlunoController::class, 'create'])->name('admin.alunos.create');
    Route::post('/alunos', [AdminAlunoController::class, 'store'])->name('admin.alunos.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AlunoMiddleware::class])->group(function () {
    Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');
});

Route::get('/alunos/{id}', [AlunoController::class, 'show'])->name('alunos.show');

require __DIR__.'/auth.php';
