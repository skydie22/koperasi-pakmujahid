<?php

use App\Http\Controllers\SeragamController;
use App\Http\Controllers\SiswaController;
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

Route::get('/siswa/search', [SiswaController::class , 'search'])->name('siswa.search');
Route::get('/siswa' , [SiswaController::class , 'index'])->name('siswa.index');
Route::post('/siswa/add', [SiswaController::class , 'store'])->name('siswa.add');
Route::put('/siswa/edit/{id}', [SiswaController::class, 'update']);
Route::delete('/siswa/delete/{id}' , [SiswaController::class , 'destroy']);


Route::get('/seragam/search', [SeragamController::class , 'search'])->name('seragam.search');
Route::get('/seragam' , [SeragamController::class , 'index'])->name('seragam.index');
Route::post('/seragam/add', [SeragamController::class , 'store'])->name('seragam.add');
Route::delete('/seragam/delete/{id}' , [SeragamController::class , 'destroy']);
Route::put('/seragam/edit/{id}', [SeragamController::class, 'update']);