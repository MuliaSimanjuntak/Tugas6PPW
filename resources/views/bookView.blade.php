<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('buku.create') }}" class="btn btn-primary float-end">Tambah Buku</a>
    <table class="table table-stripped">
    <h1>Daftar Buku</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Number</th>
                <th>ID</th>
                <th>Book's Title</th>
                <th>Cretor</th>
                <th>Price</th>
                <th>Publication Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_book as $index => $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td>{{ $index+1 }}</td> --}}
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->creator }}</td>
                    <td>{{"Rp. ".number_format($book->price, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($book->publication_date)->format('d-m-Y') }}</td>
                    <td>
                    <form action="{{ route('buku.destroy', $book->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Sure you want to DELETE?')" type="submit"
                            class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('buku.edit', $book->id)}}">Edit</a>
                    </td>  
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Jumlah Buku : {{ $jumlahBuku }}</h3>
    <h3>Total Harga : {{"Rp. ".number_format($totalPrice, 2, ',', '.') }}</h3>
</body>
</html>