<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.1/dist/css/datepicker-bs5.min.css">

</head>
<body>
    
    <div class="container">
        <h4>Tambah Buku</h4>
        <form method="post" action="{{route('buku.store')}}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="mb-3">
                <label for="creator" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="creator" name="creator">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>

            <div class="mb-3">
                <label for="publication_date" class="form-label">Tanggal Terbit</label>
                <input type="date" class="form-control" id="publication_date" name="publication_date">
            </div>
            <div id="gallery-images" class="form-group">
            <label for="gallery_images">Tambah Gambar Galeri:</label>
            <input type="file" name="gallery_images[]" class="form-control mb-2">
        </div>
        <button type="button" id="add-gallery" class="btn btn-secondary">Tambah Gambar Galeri</button>


            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="{{'/buku'}}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Review</h1>
    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="book_id" class="form-label">Select Book</label>
            <select name="book_id" id="book_id" class="form-select" required>
                <option value="">-- Select a Book --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="review_text" class="form-label">Review Text</label>
            <textarea name="review_text" id="review_text" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <input type="text" name="tags[]" id="tags" class="form-control" placeholder="e.g. Adventure, Epic, Fantasy" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
</div>
@endsection
</body>
</html>
