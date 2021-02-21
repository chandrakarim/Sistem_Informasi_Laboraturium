<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Praktikum</title>
</head>
<body>
    <h2>{{ $soal->judul }}</h2>
   <p><span>Matakuliah : {{ $soal->nama_matkul }} <br> Jurusan : {{ $soal->nama_jurusan }} <br> Kelas : {{ ($soal->nama_kelas) }}</span></p>
    <h4>{{ $soal->pertemuan }}</h4>
    <p>{!! $soal->soal !!}<p>
</body>
</html>