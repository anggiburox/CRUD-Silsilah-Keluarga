<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SilsilahKeluarga;

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


//route
Route::get('/', [SilsilahKeluarga::class, 'index']);
Route::get('/index', [SilsilahKeluarga::class, 'index']);
Route::post('/store', [SilsilahKeluarga::class, 'store']);
Route::get('/edit/{id}',[SilsilahKeluarga::class, 'edit']);
Route::post('/update',[SilsilahKeluarga::class, 'update']);
Route::get('/hapus/{id}',[SilsilahKeluarga::class, 'hapus']);
Route::get('/search',[SilsilahKeluarga::class, 'search'])->name('search');