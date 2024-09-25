<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h4>Tambah Buku</h4>
        <form method="post" action="{{route('buku.store')}}">
            @csrf
            <div>Judul<input type="text" name="title"></div>
            <div>Penulis<input type="text" name="creator"></div>
            <div>Harga<input type="text" name="price"></div>
            <div>Tanggal Terbit<input type="date" name="publication_date"></div>
            <button type="submit">Simpan</button>
            <a href="{{'/buku'}}">Kembali</a>
        </form>
    </div>
</body>
</html>
