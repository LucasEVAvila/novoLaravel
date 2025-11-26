<?php

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\DashboardController; // Seu controller
use App\Http\Controllers\ProfileController; // Do Breeze
use Illuminate\Support\Facades\Route;

// 1. Rotas Públicas (Mantidas)
Route::get('/', [PrincipalController::class, 'home'])->name('index');
Route::get('/sobre-nos', [SobreNosController::class, 'aboutUs'])->name('about');
Route::get('/contato', [ContatoController::class, 'contact'])->name('contact');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('contact.salvar');

// 2. Rotas Protegidas (Dashboard Antiga Adaptada e Rotas do Profile)
Route::middleware(['auth', 'verified'])->group(function () {
    // Sua Dashboard, agora protegida e no caminho /admin/dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Rotas do Profile do Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Se quiser manter o /dashboard antigo, mas redirecionando:
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');
});

// 3. Rotas de Autenticação do Breeze (Login, Register, etc.)
require __DIR__.'/auth.php';