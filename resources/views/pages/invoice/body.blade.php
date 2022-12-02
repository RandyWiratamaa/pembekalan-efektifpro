<p>Dengan Hormat, </p>
<p style="text-indent:50px; text-align:justify">
    Pertama-tama kami menyampaikan terima kasih atas kesempatan yang diberikan oleh {{ $i->bank->nama }}
    berkenaan dengan dipercayakannya PT. Efektifpro Knowledge Source untuk melaksanakan
    {{ ucwords($i->jenis_pembekalan->jenis) }} ({{ $i->metode_pembekalan->metode }}) {{ $i->materi_pembekalan->materi }} -
    {{ strtoupper($i->penyelenggara->singkatan) }} ({{ ucwords($i->penyelenggara->nama) }})
    pada tanggal {{ $i->tanggal_mulai->isoFormat('DD MMMM YYYY') }} & {{ $i->tanggal_selesai->isoFormat('DD MMMM YYYY') }}
</p>
<p style="text-indent:50px; text-align:justify">
    Bersama ini kami sampaikan invoice pelaksanaan kegiatan tersebut berdasarkan Surat Perintah kerja nomor : {{ $i->surat_penegasan->no_surat }}.
    Harga yang tercantum pada invoice sudah termasuk PPh 23 (2%) dan tidak termasuk PPN.
    Bukti pembayaran dapat dikirimkan ke alamat email : efektifpro@gmail.com. Bukti potong PPh 23 (jika melakukan pemotongan)
    dapat dikirimkan ke alamat kantor kami di Gandaria 8 Office Tower 19<sup>th</sup> Floor Unit B, Kebayoran Lama - Jakarta Selatan 12240
</p>
<p>Demikian kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>
