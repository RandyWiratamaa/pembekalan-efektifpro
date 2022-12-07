<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $invoice->no_invoice }}</title>
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
        @if ($invoice->pembekalan->pic->jenkel == 'perempuan')
            Ibu
        @else
            Bapak
        @endif
        @if ($invoice->pembekalan->pic->midle_name == '')
        {{ $invoice->pembekalan->pic->first_name }} {{ $invoice->pembekalan->pic->last_name }}
        @elseif ($invoice->pembekalan->pic->last_name == '')
        {{ $invoice->pembekalan->pic->first_name }} {{ $invoice->pembekalan->pic->midle_name }}
        @elseif ($invoice->pembekalan->pic->midle_name && $invoice->pembekalan->pic->last_name == '')
        {{ $invoice->pembekalan->pic->first_name }}
        @else
        {{ $invoice->pembekalan->pic->first_name }} {{ $invoice->pembekalan->pic->midle_name }} {{ $invoice->pembekalan->pic->last_name }}
        @endif
        ({{ $invoice->pembekalan->bank->nama }})
        </b>
    </p>
    <br>
    Berikut kami kirimkan Invoice
    {{ ucwords($invoice->pembekalan->jenis_pembekalan->jenis) }} - {{ $invoice->pembekalan->materi_pembekalan->materi }} ({{ strtoupper($invoice->pembekalan->materi_pembekalan->kode) }})
</body>
</html>
