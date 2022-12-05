<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .bg-color {
        background-color: yellow;
    }
</style>
<body>
    {{-- {{ ($pembekalan->uuid) }} --}}
    <p>
        <b>Dear
        @if ($berita_acara->pembekalan->pic->jenkel == 'perempuan')
            Ibu
        @else
            Bapak
        @endif
        @if ($berita_acara->pembekalan->pic->midle_name == '')
        {{ $berita_acara->pembekalan->pic->first_name }} {{ $berita_acara->pembekalan->pic->last_name }}
        @elseif ($berita_acara->pembekalan->pic->last_name == '')
        {{ $berita_acara->pembekalan->pic->first_name }} {{ $berita_acara->pembekalan->pic->midle_name }}
        @elseif ($berita_acara->pembekalan->pic->midle_name && $berita_acara->pembekalan->pic->last_name == '')
        {{ $berita_acara->pembekalan->pic->first_name }}
        @else
        {{ $berita_acara->pembekalan->pic->first_name }} {{ $berita_acara->pembekalan->pic->midle_name }} {{ $berita_acara->pembekalan->pic->last_name }}
        @endif
        ({{ $berita_acara->pembekalan->bank->nama }})
        </b>
    </p>
    <br>
    Berikut kami kirimkan Berita Acara
    {{ ucwords($berita_acara->pembekalan->jenis_pembekalan->jenis) }} - {{ $berita_acara->pembekalan->materi_pembekalan->materi }} ({{ strtoupper($berita_acara->pembekalan->materi_pembekalan->kode) }})
</body>
</html>
