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
        <script>
        // Menambahkan input file galeri gambar dinamis
        document.getElementById('add-gallery').addEventListener('click', function() {
            const galleryImagesDiv = document.getElementById('gallery-images');
            const newInput = document.createElement('input');
            newInput.setAttribute('type', 'file');
            newInput.setAttribute('name', 'gallery_images[]');
            newInput.classList.add('form-control', 'mb-2');
            galleryImagesDiv.appendChild(newInput);
        });
    </script>
    </div>
</body>
</html>
