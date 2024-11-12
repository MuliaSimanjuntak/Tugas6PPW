@extends('auth.layouts')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>
                @endif
            </div>
        </div>
    <div class="container mt-5">
        <div class = "mb-5">
            <a href="{{ route('buku.create') }}" class="btn btn-primary float-end">Tambah Buku</a>
        </div>
        <form action="{{route('search.book')}}" method="GET">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari buku" name="search">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
            </div>
            @if (@session('status'))
            <script>
                alert('{{ session('status') }}');
            </script>
        @endif
           
    <h1>Daftar Buku</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Number</th>
                <th>ID</th>
                <th >Gambar</th>
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
                    <td>
                    <img src="{{ asset('storage/img/'.$buku->image) }}" class="rounded"
                    style="width: 150px">
                </td>
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

    <div>
    {{ $data_book->links('pagination::bootstrap-5') }}</div>
    <h3>Jumlah Buku : {{ $jumlahBuku }}</h3>
    <h3>Total Harga : {{"Rp. ".number_format($totalPrice, 2, ',', '.') }}</h3>
</div>

</div>
</div>
@endsection