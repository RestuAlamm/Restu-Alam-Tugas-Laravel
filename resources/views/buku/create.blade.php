<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
</head>

<body>

    <h1>Tambah Buku</h1>

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf

        <label>Judul</label>
        <br>
        <input type="text" name="judul" value="{{ old('judul') }}">
        @error('judul')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <label>Deskripsi</label>
        <br>
        <textarea name="deskripsi">{{ old('deskripsi') }}</textarea>
        @error('deskripsi')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </form>

</body>

</html>
