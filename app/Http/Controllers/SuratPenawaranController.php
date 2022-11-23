<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Bpo;
use App\Models\Pic;
use App\Models\Bank;
use App\Models\Peserta;
use App\Models\Pengajar;
use App\Models\Pembekalan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SuratPenawaran;
use App\Models\SuratPenegasan;
use App\Models\JenisPembekalan;
use App\Models\LevelPembekalan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\MateriPembekalan;
use App\Models\MetodePembekalan;
use Illuminate\Support\Facades\Storage;

class SuratPenawaranController extends Controller
{
    function numberToRoman($num)
    {
        // Be sure to convert the given parameter into an integer
        $n = intval($num);
        $result = '';

        // Declare a lookup array that we will use to traverse the number:
        $lookup = array(
            'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
            'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
            'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
        );

        foreach ($lookup as $roman => $value)
        {
            // Look for number of matches
            $matches = intval($n / $value);

            // Concatenate characters
            $result .= str_repeat($roman, $matches);

            // Substract that from the number
            $n = $n % $value;
        }

        return $result;
    }

    public function index(Request $request)
    {
        $kode_perusahaan = 'EKS';
        $jenis_surat = 'PNW';
        $jenis_penegasan = 'PNG';
        $bln = now()->month;
        $bulan = $this->numberToRoman($bln);

        $no_akhir = SuratPenawaran::max('id');
        $no_urut = sprintf("%03s", abs($no_akhir+1));

        $akhir_penegasan = SuratPenegasan::max('id');
        $no_penegasan = sprintf("%03s", abs($akhir_penegasan+1));

        $pengajar = Pengajar::all();
        $page_name = "Surat Penawaran";
        $jenis = JenisPembekalan::all();
        $materi = MateriPembekalan::all();
        $metode = MetodePembekalan::all();
        $bank = Bank::all();
        $pic = Pic::all();
        $bpo = Bpo::all();

        if($request->get('bank_id')){
            // Filter data by Nama Bank
            $surat_penawaran = SuratPenawaran::with([
                'pembekalan' => function($query){
                    return $query->with(['materi_pembekalan']);
            }, 'bank'])->where('bank_id', $request->get('bank_id'))->get();
        } elseif($request->get('materi_id')){
            // Filter data by Materi
            $surat_penawaran = SuratPenawaran::with([
                'pembekalan' => function($query){
                    return $query->with(['materi_pembekalan']);
            }, 'bank'])->where('materi_id', $request->get('materi_id'))->get();
        } else {
            $surat_penawaran = SuratPenawaran::with([
                'pembekalan' => function($query){
                    return $query->with(['materi_pembekalan']);
                }, 'bank'])->get();
        }

        return view('pages.surat-penawaran.index', get_defined_vars());
    }

    public function show($uuid)
    {
        $page_name = "Surat Penawaran";
        $penawaran_isExist = SuratPenawaran::where('pembekalan_uuid', $uuid)->count() > 0;
        $data_pembekalan = Pembekalan::with(['metode_pembekalan', 'level_pembekalan', 'materi_pembekalan'])->where('uuid', $uuid)->first();

        $surat_penawaran = SuratPenawaran::with(['materi_pembekalan', 'level_pembekalan', 'metode_pembekalan', 'bank'])->get();

        return view('pages.surat-penawaran.show', get_defined_vars());
    }

    public function store(Request $request)
    {
        $surat_penawaran = new SuratPenawaran;
        $surat_penawaran->no_surat = $request->no_surat;
        $surat_penawaran->tgl_surat = $request->tgl_surat;
        $surat_penawaran->bank_id = $request->bank_id;
        $surat_penawaran->pic_id = $request->pic_id;
        $surat_penawaran->materi_id = $request->materi_id;
        $surat_penawaran->metode_id = $request->metode_id;
        $surat_penawaran->perihal = $request->perihal;
        $surat_penawaran->body = $request->body;
        $surat_penawaran->save();

        if($surat_penawaran){
            return redirect()->route('surat-penawaran.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function view($id)
    {
        $surat_penawaran = SuratPenawaran::with('bank', 'bpo')->firstWhere('id', $id);
        $body = $surat_penawaran->body;
        $exp = explode("<br>", $body);

        return view('pages.surat-penawaran.detail', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
        $update_penawaran = SuratPenawaran::firstWhere('id', $id);
        $update_penawaran->no_surat = $request->no_surat;
        $update_penawaran->tgl_surat = $request->tgl_surat;
        $update_penawaran->bank_id = $request->bank_id;
        $update_penawaran->pic_id = $request->pic_id;
        $update_penawaran->materi_id = $request->materi_id;
        $update_penawaran->metode_id = $request->metode_id;
        $update_penawaran->perihal = $request->perihal;
        $update_penawaran->body = $request->edit_body;
        $update_penawaran->save();

        if($update_penawaran) {
            return redirect()->route('surat-penawaran.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function approve(Request $request, $id)
    {
        $approved = 1;
        $approve_penawaran = SuratPenawaran::firstWhere('id', $id);
        $approve_penawaran->is_approved = $approved;
        $approve_penawaran->approved_by = $request->approved_by;
        $approve_penawaran->save();

        if ($approve_penawaran) {
            return redirect()->route('surat-penawaran.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function generatePDF(Request $request, $id)
    {
        $surat_penawaran = SuratPenawaran::with('bank', 'bpo')->firstWhere('id', $id);
        $slug_bank = Str::slug($surat_penawaran->bank->nama);
        $filename = "{$surat_penawaran->tgl_surat->isoFormat('DDMMYYYY')}-{$slug_bank}.pdf";
        $surat_penawaran->dokumen = $filename;
        $surat_penawaran->save();

        $path = public_path('assets/surat-penawaran');
        $data = [
            'surat_penawaran' => $surat_penawaran
        ];
        $body = explode(" ", $surat_penawaran->body);
        $body = $surat_penawaran->body;
        $exp = explode("<br>", $body);
        $pdf = Pdf::loadView('pages.surat-penawaran.download', $data);
        $pdf->save($path . '/' . $filename);
        if($surat_penawaran) {
            return $pdf->download($filename);
        }


        // $pdf = Pdf::setPaper('a4', 'potrait');
        // $pdf = Pdf::loadHtml($surat_penawaran->body)->setPaper('a4', 'potrait')->setWarnings(false);
        // $pdf = Pdf::render();
        // return $pdf->stream();
        // ->save(public_path('assets/surat-penawaran/'.$surat_penawaran->tgl_surat->isoFormat('DDMMYYYY').$surat_penawaran->bank->nama));
    }

    public function destroy($id)
    {
        $delete_penawaran = SuratPenawaran::findOrFail($id);
        $delete_penawaran->delete();

        if($delete_penawaran) {
            return redirect()->route('surat-penawaran.index');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
