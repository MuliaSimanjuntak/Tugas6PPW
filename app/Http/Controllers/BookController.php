<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;

class BookController extends Controller
{
    public function index()
    {
        // $data_book = book::all()->sortByDesc('id');
        $data_book = book::all()->sortByDesc('id');
        $jumlahBuku = book::count();
        $totalPrice = book::sum('price');
        return view('bookView', compact('data_book', 'jumlahBuku', 'totalPrice'));

    }
}
