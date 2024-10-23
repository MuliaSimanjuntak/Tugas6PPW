<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/bookView', [BookController::class, 'index'])->name('buku.view');
Route::get('/buku/create', [BookController::class, 'create'])->name('buku.create');
Route::post('/buku', [BookController::class, 'store'])->name('buku.store');
Route::delete('/bookView/{id}', [BookController::class, 'destroy'])->name('buku.destroy');
Route::put('/bookView/{id}/update', [BookController::class, 'update'])->name('buku.update');
Route::get('/bookView/{id}/edit', [BookController::class, 'edit'])->name('buku.edit');
Route::get('/buku/search',[BookController::class,'search'])->name('search.book');
