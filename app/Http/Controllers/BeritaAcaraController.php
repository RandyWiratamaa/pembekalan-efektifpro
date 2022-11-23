<?php

namespace App\Http\Controllers;

use App\Models\Bpo;
use App\Models\Bank;
use App\Models\BeritaAcara;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BeritaAcaraController extends Controller
{
    public function index()
    {
        $page_name = 'Berita Acara';
        $bank = Bank::all();
        $bpo = Bpo::all();
        $berita_acara = BeritaAcara::with([
            'pembekalan' => function($query){
                return $query->with(['materi_pembekalan', 'bank']);
            }
            ])->orderBy('tanggal')->get();
        return view('pages.berita-acara.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        $absensi = $request->file('absensi');
        $name_absensi = 'absen'.'-'.time().'-'.$request->uuid;
        $ext_absensi = $absensi->getClientOriginalExtension();
        $newName_absensi = $name_absensi . '.' . $ext_absensi;
        $path_absensi = $absensi->move('assets/absensi', $newName_absensi);

        $dokumentasi = $request->file('dokumentasi');
        $name_dokumentasi = 'dokumentasi'.'-'.time().'-'.$request->uuid;
        $ext_dokumentasi = $dokumentasi->getClientOriginalExtension();
        $newName_dokumentasi = $name_dokumentasi . '.' . $ext_dokumentasi;
        $path_dokumentasi = $dokumentasi->move('assets/dokumentasi', $newName_dokumentasi);

        $berita_acara = new BeritaAcara;
        $berita_acara->tanggal = $request->tanggal;
        $berita_acara->pembekalan_uuid = $request->uuid;
        $berita_acara->body = $request->body;
        $berita_acara->absensi = $newName_absensi;
        $berita_acara->dokumentasi = $newName_absensi;
        $berita_acara->save();

        if ($berita_acara) {
            return redirect()->route('pembekalan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function view($id)
    {
        $berita_acara = BeritaAcara::firstWhere('id', $id);
        return view('pages.berita-acara.detail', get_defined_vars());
    }

    public function approve(Request $request, $id)
    {
        $approved = 1;
        $approve = BeritaAcara::firstWhere('id', $id);
        $approve->is_approved = $approved;
        $approve->approved_by = $request->approved_by;
        $approve->save();

        if ($approve) {
            return redirect()->route('berita-acara.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function generatePDF($id)
    {
        $berita_acara = BeritaAcara::with([
            'pembekalan' => function($query){
                return $query->with(['materi_pembekalan', 'bank', 'level_pembekalan', 'pic']);
            }, 'bpo'])->firstWhere('id', $id);
        $slug_bank = Str::slug($berita_acara->pembekalan->bank->nama);
        $filename = "BA-{$berita_acara->tanggal->isoFormat('DDMMYYYY')}-{$slug_bank}.pdf";
        $berita_acara->dokumen = $filename;
        $berita_acara->save();

        $path = public_path('assets/berita-acara');
        $data = [
            'berita_acara' => $berita_acara
        ];
        $body = explode(" ", $berita_acara->body);
        $body = $berita_acara->body;
        $exp = explode("<br>", $body);
        $pdf = Pdf::setOption(['dpi' => 150]);
        $pdf = Pdf::loadView('pages.berita-acara.download', $data)->setPaper('A4', 'potrait');
        $pdf->save($path . '/' . $filename);
        if($berita_acara) {
            return $pdf->download($filename);
        }

        // $pdf = Pdf::setPaper('a4', 'potrait');
        // $pdf = Pdf::loadHtml($surat_penawaran->body)->setPaper('a4', 'potrait')->setWarnings(false);
        // $pdf = Pdf::render();
        // return $pdf->stream();
    }
}
