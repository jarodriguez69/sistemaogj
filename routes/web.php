<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactanosController;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', [HomeController::class, 'welcome'])->name('home.welcome');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/registros', [HomeController::class, 'registros'])->name('home.registros');
Route::get('/formularios', [HomeController::class, 'formularios'])->name('home.formularios');
Route::get('/mapa', [HomeController::class, 'mapa'])->name('home.mapa');

Route::get('contactanos', [ContactanosController::class,'index'])->name('contactanos.index');
Route::post('contactanos',  [ContactanosController::class,'store'])->name('contactanos.store');

