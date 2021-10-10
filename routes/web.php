<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TrabalhoController;
use App\Http\Controllers\OcupacaoController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function(){
    Route::view('/usuario/perfil', 'user.conta')->name('user.profile');
    Route::resource('portfolios', PortfolioController::class)->except('show');
    Route::get('portfolios/{portfolio}/ocupacoes/{ocupacao}/show', OcupacaoController::class)->name('portfolios.ocupacoes.show');
    Route::resource('portfolios.ocupacoes.trabalhos', TrabalhoController::class)->parameters([
        'ocupacoes' => 'ocupacao'
    ])->except('show')->shallow();
});


require __DIR__.'/auth.php';
