<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocktailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cocktails', [CocktailController::class, 'index'])->name('cocktails.index');
Route::get('/cocktails/{id}', [CocktailController::class, 'show'])->name('cocktails.show');