<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Book</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-6">Edit Book</h2>

        <!-- Form Edit Buku -->
            <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                @csrf
                @method('PUT')
        
            <!-- Input untuk Judul -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Judul:</label>
                <input type="text" name="title" id="title" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="{{ old('title', $buku->title) }}" required>
            </div>

            <!-- Input untuk Penulis -->
            <div class="mb-4">
                <label for="author" class="block text-gray-700 font-bold mb-2">Penulis:</label>
                <input type="text" name="author" id="author" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="{{ old('author', $buku->creator) }}" required>
            </div>

            <!-- Input untuk Harga -->
            <div class="mb-4">
                <label for="harga" class="block text-gray-700 font-bold mb-2">Harga:</label>
                <input type="number" name="harga" id="harga" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="{{ old('harga', $buku->harga) }}" required>
            </div>

            <!-- Input untuk Tanggal Terbit -->
            <div class="mb-4">
                <label for="tanggal_terbit" class="block text-gray-700 font-bold mb-2">Tanggal Terbit:</label>
                <input type="date" name="tanggal_terbit" id="tanggal_terbit" class="w-full px-3 py-2 border border-gray-300 rounded-lg" value="{{ old('tanggal_terbit', $buku->tanggal_terbit) }}" required>
            </div>

            <!-- Tombol Update -->
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>

                <!-- Tombol Back -->
                <a href="{{'/bookView'}}" class="text-gray-600 hover:text-gray-800">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
