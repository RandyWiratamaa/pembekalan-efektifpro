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
        @if ($surat_penegasan->pembekalan->pic->jenkel == 'perempuan')
            Ibu
        @else
            Bapak
        @endif
        @if ($surat_penegasan->pembekalan->pic->midle_name == '')
        {{ $surat_penegasan->pembekalan->pic->first_name }} {{ $surat_penegasan->pembekalan->pic->last_name }}
        @elseif ($surat_penegasan->pembekalan->pic->last_name == '')
        {{ $i->pembekalan->pic->first_name }} {{ $surat_penegasan->pembekalan->pic->midle_name }}
        @elseif ($surat_penegasan->pembekalan->pic->midle_name && $surat_penegasan->pembekalan->pic->last_name == '')
        {{ $surat_penegasan->pembekalan->pic->first_name }}
        @else
        {{ $surat_penegasan->pembekalan->pic->first_name }} {{ $surat_penegasan->pembekalan->pic->midle_name }} {{ $surat_penegasan->pembekalan->pic->last_name }}
        @endif
        ({{ $surat_penegasan->pembekalan->bank->nama }})
        </b>
    </p>
    <br>
    Berikut kami kirimkan Surat Penegasan
    {{ ucwords($surat_penegasan->jenis_pembekalan->jenis) }} - {{ $surat_penegasan->pembekalan->materi_pembekalan->materi }} ({{ strtoupper($surat_penegasan->pembekalan->materi_pembekalan->kode) }})
</body>
</html>
