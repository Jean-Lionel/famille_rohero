<?php

use App\Http\Livewire\ContributionComponent;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ListeContribution;
use Illuminate\Support\Facades\Route;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('contribution', ContributionComponent::class)->name('contribution');
Route::get('liste-contribution', ListeContribution::class)->name('liste-contribution');
Route::get('dashboard', Dashboard::class)->name('dashboard');

Route::resource('cellule', 'App\Http\Controllers\CelluleController');
Route::resource('membre', 'App\Http\Controllers\MembreController');
Route::resource('type-cotisation', 'App\Http\Controllers\TypeCotisationController');