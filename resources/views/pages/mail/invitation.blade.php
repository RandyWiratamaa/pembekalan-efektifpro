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
    <p><b>Dear Bapak/Ibu Peserta {{ $pembekalan->materi_pembekalan->materi }}</b></p><br>

    <p>Sehubungan akan dilaksanakan <b>{{ $pembekalan->materi_pembekalan->materi }}</b> pada :</p><br>

    <p class="bg-color">Hari/Tanggal  :  {{ $pembekalan->hari_tanggal->isoFormat('dddd, DD MMMM YYYY') }}</p><br>

    <p><b>Terlampir Materi dan link Zoom yang digunakan untuk {{ $pembekalan->materi_pembekalan->materi }}</b></p><br>

    <p> EfektifPro Knowledge Source is inviting you to a scheduled Zoom meeting.</p><br>

    Topic : EfektifPro Knowledge Source's Personal Meeting Room<br>

    Join Zoom Meeting<br>
    {{ $pembekalan->link_zoom }}<br>
    <br>
    <p class="bg-color">Meeting ID  :   819 180 7951</p>
    <p class="bg-color">Passcode     :   Efektifpro<p></p>

    One tap mobile<br>
    +33186995831,,8191807951# France<br>
    +33170372246,,8191807951# France<br>

    Dial by your location<br>
            +33 1 8699 5831 France<br>
            +33 1 7037 2246 France<br>

    Find your local number: https://us02web.zoom.us/u/kcME3XoIS9<br>
</body>
</html>
