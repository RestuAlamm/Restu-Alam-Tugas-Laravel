<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
</head>

<body>

    <h1>Edit Buku</h1>

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Judul</label>
        <br>
        <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}">
        @error('judul')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <label>Deskripsi</label>
        <br>
        <textarea name="deskripsi">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
        @error('deskripsi')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </form>

</body>

</html>
