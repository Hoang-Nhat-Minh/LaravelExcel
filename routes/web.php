<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'index'])->name('index');

Route::get('/add', [PageController::class, 'add'])->name('add');

Route::get('/excel', [PageController::class, 'excel'])->name('excel');

Route::post('/add/store', [PageController::class, 'add_store'])->name('add.store');
