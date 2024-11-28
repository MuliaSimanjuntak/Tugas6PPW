<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/bookView', [BookController::class, 'index'])->name('buku.view');
Route::middleware(['admin'])->group(function(){
    Route::get('/buku/create', [BookController::class, 'create'])->name('buku.create');
    Route::post('/buku', [BookController::class, 'store'])->name('buku.store');
    Route::delete('/bookView/{id}', [BookController::class, 'destroy'])->name('buku.destroy');
    Route::put('/bookView/{id}/update', [BookController::class, 'update'])->name('buku.update');
    Route::get('/bookView/{id}/edit', [BookController::class, 'edit'])->name('buku.edit');
    Route::get('/buku/search',[BookController::class,'search'])->name('search.book');

});

use App\Http\Controllers\Auth\LoginRegisterController;
Route::controller(LoginRegisterController::class)->group(function() {
 Route::get('/register', 'register')->name('register');
 Route::post('/store', 'store')->name('store');
 Route::get('/login', 'login')->name('login');
 Route::post('/authenticate', 'authenticate')->name('authenticate');
//  Route::get('/dashboard', 'dashboard')->name('dashboard');
 Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
});



