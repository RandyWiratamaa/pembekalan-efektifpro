<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Bpo;
use App\Models\Bank;
use App\Models\BeritaAcara;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BeritaAcaraController extends Controller
{
    public function index(Request $request)
    {
        $page_name = 'Berita Acara';
        $bank = Bank::all();
        $bpo = Bpo::all();
        $berita_acara = BeritaAcara::with([
            'pembekalan' => function($query){
                return $query->with(['materi_pembekalan', 'bank']);
            }
            ])->orderBy('tanggal')->get();
        if($request->ajax()){
            $data = BeritaAcara::with([
                'pembekalan' => function($query){
                    return $query->with(['materi_pembekalan', 'bank']);
                }
                ])->orderBy('tanggal', 'ASC')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('bank', function (BeritaAcara $berita_acara){
                    return $berita_acara->pembekalan->bank->nama;
                })
                ->addColumn('materi_pembekalan', function (BeritaAcara $berita_acara){
                    return $berita_acara->pembekalan->materi_pembekalan->materi;
                })
                ->addColumn('tanggal', function($row){
                    $tgl = $row['tanggal']->isoFormat('dddd, DD MMMM YYYY');
                    return $tgl;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="btn btn-soft-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
            toastr()->success('Berita Acara berhasil dibuat');
            return redirect()->route('pembekalan.index');
        } else {
            toastr()->error('Gagal membuat berita acara');
            return redirect()->back()->withInput();
        }
    }

    public function view($id)
    {
        $berita_acara = BeritaAcara::firstWhere('id', $id);
        return view('pages.berita-acara.detail', get_defined_vars());
    }

    /**
     * Persetujuan Berita Acara
     */
    public function approve(Request $request, $id)
    {
        $approved = 1;
        $approve = BeritaAcara::firstWhere('id', $id);
        $approve->is_approved = $approved;
        $approve->approved_by = $request->approved_by;
        $approve->save();

        if ($approve) {
            toastr()->success('Berita Acara berhasil dibuat');
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
            toastr()->success('Berita Acara berhasil diapprove');
            return $pdf->download($filename);
        }
    }
}
