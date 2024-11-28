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
        $batas = 3;
        $data_book = book::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_book->currentPage() - 1);
        return view('bookView', compact('data_book', 'jumlahBuku'));

    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'creator' => 'required',
            'price' => 'required',
            'publication_date' => 'required',
            'image' => 'required|file|mimes:jpeg,jpg,png,gif|max:10000',
        'gallery_images.*' => 'required|file|mimes:jpeg,jpg,png,gif|max:10000',

        ]);
        $imagePath = $request->file('image')->store('public/img');
        $buku = new Book();
        $buku->title = $request->title;
        $buku->creator = $request->creator;
        $buku->price = $request->price;
        $buku->publication_date = $request->publication_date;
        $buku->image = $imagePath;
        $buku->save();

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('public/gallery');
                $buku->gallery_images()->create([
                    'image' => $path,
                ]);
            }
        }
        return redirect('bookView')->with('status', 'Data Buku Berhasil Disimpan');
    }

    public function destroy($id){
        $buku = Book::find($id);
        if($buku->$image){
            Storage::delete('public/img/' . $buku->image);
        }
        foreach ($buku->galleries as $gallery) {
            Storage::delete('public/galleries/' . $gallery->image);
        }
        $buku->delete();

        return redirect('bookView')->with('status', 'Data Buku Berhasil Dihapus');
    }

    public function edit($id){
        $buku = Book::find($id);
        return view('update', compact('buku'))->with('status', 'Data Buku Berhasil Diedit');
    }

    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required',
            'creator' => 'required',
            'price' => 'required',
            'publication_date' => 'required',
            'image' => 'required|file|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $data = [
            'title' => $request->title,
            'creator' => $request->creator,
            'price' => $request->price,
            'publication_date' => $request->publication_date,
            ];
        if($request->hash_file('image')){
            if ($buku->image) {
                Storage::delete('public/img/' . $book->image);
            }
            $imagePath = $request->file('image')->store('public/img');
            $data['image'] = basename($imagePath);
        }
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $galleryPath = $image->store('public/galleries');
                $book->galleries()->create([
                    'image' => basename($galleryPath),
                    'book_id' => $book->id,
                ]);
            }
        }
        $buku->update($data);

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

    public function review($id){
        $review = Review::with('book')->first(); 
        return view('bookView', compact('review'));
    }
        

}