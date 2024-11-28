<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(){
        $books = Book::all();
        return view('review', compact('books'));
    }

    public function store(Request $request){
        $request->validate([
            'book_id' => 'required',
            'review' => 'required',
            'tags' => 'required',
        ]);

        Review::create([
            'book_id' => $request->book_id,
            'reviewer_id' => Auth::user()->id,
            'review_text' => $request->review,
            'tags' => $request->tags,
        ]);
        return redirect()->route('buku.view')->with('status', 'Review Berhasil Dibuat');
    }

    public function destroy($id){
        $review = Review::find($id);
        $review->delete();
        return redirect()->route('buku.view')->with('status', 'Review Berhasil Dihapus');
    }

    public function edit($id){
        $review = Review::find($id);
        return view('updateReview', compact('review'));
    }

    public function index(){
        $reviews = Review::with('book', 'reviewer')->get();
        return view('reviewer', compact('reviews'));
    }
}
