<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\DashboardController;


// 1. Rotas Públicas 
Route::get('/', [PrincipalController::class, 'home'])->name('index');
Route::get('/sobre-nos', [SobreNosController::class, 'aboutUs'])->name('about');
Route::get('/contato', [ContatoController::class, 'contact'])->name('contact');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('contact.salvar');

// 2. Rotas Protegidas 
Route::middleware(['auth', 'verified'])->group(function () {
    
    
    // Rotas do Profile do Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
  
   
});

// 3. Rotas de Autenticação do Breeze (Login, Register, etc.)
require __DIR__.'/auth.php';troy'])->name('profile.destroy');