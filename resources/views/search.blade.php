<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <a href="{{ route('buku.create') }}" class="btn btn-primary float-end">Tambah Buku</a>
    <a href="{{ route('buku.view') }}" class="btn btn-primary float-end">kembali</a>
    <h1>Daftar Buku</h1>
    <table class="table table-bordered">
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

    <div class="d-flex justify-content-center mt-4">
            {{ $data_book->links('pagination::bootstrap-5') }}
        </div>

    <h3>Jumlah Buku : {{ $jumlahBuku }}</h3>
    <h3>Total Harga : {{"Rp. ".number_format($totalPrice, 2, ',', '.') }}</h3>

    
</body>
</html>