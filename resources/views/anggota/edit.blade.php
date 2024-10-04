<!DOCTYPE html>
<html>
<head>
    <title>Edit Anggota</title>
</head>
<body>
    <h1>Edit Anggota</h1>

    <form action="{{ route('anggota.update', $anggota) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nama:</label>
            <input type="text" name="name" value="{{ $anggota->name }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $anggota->email }}" required>
        </div>
        <button type="submit">Update</button>
    </form>

    <a href="{{ route('anggota.index') }}">Kembali</a>
</body>
</html>
