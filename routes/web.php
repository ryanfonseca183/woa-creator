<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\NavegacaoController;
use App\Http\Controllers\TrabalhoController;
use App\Http\Controllers\OcupacaoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::get('navegacao', NavegacaoController::class)->name('navegacao');

Route::get('trabalhos/{trabalho}', [TrabalhoController::class, 'show'])->name('trabalhos.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('usuario/{id?}', [UsuarioController::class, 'trabalhos'])->name('user.profile');
Route::get('usuario/{id}/portfolios', [UsuarioController::class, 'portfolios'])->name('user.portfolios.index');
Route::get('usuario/{usuario}/portfolios/{portfolio}', [UsuarioController::class, 'portfolio'])->name('user.portfolios.show');

Route::middleware('auth')->group(function(){
    Route::resource('portfolios', PortfolioController::class);
    Route::get('portfolios/{portfolio}/ocupacoes/{ocupacao}/show', OcupacaoController::class)->name('portfolios.ocupacoes.show');
    Route::resource('portfolios.ocupacoes.trabalhos', TrabalhoController::class)->parameters([
        'ocupacoes' => 'ocupacao'
    ])->except('show')->shallow();
});


require __DIR__.'/auth.php';
