<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;

class BookController extends Controller
{
    public function index()
    {
        // $data_book = book::all()->sortByDesc('id');

        $jumlahBuku = book::count();
        $totalPrice = book::sum('price');
        $batas = 3;
        $data_book = book::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_book->currentPage() - 1);
        return view('bookView', compact('data_book', 'jumlahBuku', 'totalPrice'));

    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $buku = new Book();
        $buku->title = $request->title;
        $buku->creator = $request->creator;
        $buku->price = $request->price;
        $buku->publication_date = $request->publication_date;
        $buku->save();

        return redirect('bookView');
    }

    public function destroy($id){
        $buku = Book::find($id);
        $buku->delete();

        return redirect('bookView');
    }

    public function edit($id){
        $buku = Book::find($id);
        return view('update', compact('buku'));
    }

    public function update(Request $request, $id){
        $buku = Book::find($id);
        $buku->title = $request->input('title');
        $buku->creator = $request->input('creator');
        $buku->price = $request->input('price');
        $buku->publication_date = $request->input('publication_date');

        return redirect('/bookView');

    }
    public function search(Request $request){
        $batas = 5;
        $search = $request->search;
        $data_book = Book::where('title', 'like', "%" . $search . "%")->orwhere('creator','like','%'.
        $search.'%')->paginate($batas);
        $jumlahBuku = $data_book->count();
        $totalPrice = Book::sum('price');
        $no = $batas * ($data_book->currentPage() - 1);
        return view('search', compact('data_book', 'no', 'search', 'jumlahBuku', 'totalPrice'));
    }
}
