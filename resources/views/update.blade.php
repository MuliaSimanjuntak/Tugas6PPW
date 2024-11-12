<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-6">Edit Book</h2>

        <!-- Form Edit Buku -->
            <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                @csrf
                @method('PUT')
        
                <h2 class="text-center">Edit Buku</h2>
            <input type="hidden" class="form-control" id="id" name="id" value="{{ $buku->id }}">

            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $buku->title }}" required>
            </div>
            <div class="mb-3">
                <label for="creator" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="creator" name="creatot" value="{{ $buku->creator }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $buku->price }}" required>
            </div>
            <div class="mb-3">
                <label for="publication_date" class="form-label">Tanggal Terbit</label>
                <input type="date" class="form-control" id="publication_date" name="publication_date" value="{{ $buku->publication_date }}" required>
            </div>
            <h4>Gambar Galeri:</h4>
                    <div class="gallery">
                        @foreach($books->galleries as $gallery)
                            <img src="{{ asset('storage/galleries/' . $gallery->image) }}" class="rounded w-25" alt="Gallery Image">
                        @endforeach
                    </div>

                    <!-- Input for gallery images -->
                    <div class="form-group">
                        <label for="gallery_images">Tambah Gambar Galeri:</label>
                        <input type="file" name="gallery_images[]" class="form-control" multiple>
                    </div>
            <button type="submit" class="btn btn-primary">Update Buku</button>

                <!-- Tombol Back -->
                <a href="{{'/bookView'}}" class="text-gray-600 hover:text-gray-800">Back</a>
        </form>
    </div>
</body>
</html>
