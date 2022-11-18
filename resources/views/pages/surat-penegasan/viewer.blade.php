<html>
    <head>
        <body>
            <h4>Contoh menampilkan file pdf dengan tag embed</h4>
            <embed type="application/pdf" src="{{ asset('assets/surat_penegasan/'.$surat_penegasan->tgl_surat->isoFormat('DDMMYYYY').'-'.$surat_penegasan->bank->nama) }}" width="600" height="400">
            </embed>
        </body>
    </head>
</html>
