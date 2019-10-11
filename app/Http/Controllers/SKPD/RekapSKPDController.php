<?php

namespace App\Http\Controllers\SKPD;

use App\Models\Yanjin\ArsipModel;
/*use App\Models\Yanjin\JenisIzinModel;*/
use App\Models\Yanjin\PinjamArsipModel;
use App\Models\Yanjin\SektorModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RekapSKPDController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sektor(Request $request){
        $user = Auth::user()->name;
        $user_sektor = Auth::user()->sektor;
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        $year = DB::select("SELECT YEAR(t.tanggal) as year FROM arsip t GROUP BY YEAR(t.tanggal) DESC;");
        $month = DB::select("SELECT MONTH(t.tanggal) as month FROM arsip t GROUP BY MONTH(t.tanggal) DESC;");

        $p = DB::select("SELECT COUNT(*) as jml FROM `pinjam` WHERE `tanggal_kembali` IS NULL");
        $peminjam = PinjamArsipModel::all()->sortByDesc('created_at');

        /*$izin = $peminjam->izin()->nama_izin;
        dd($izin);*/
        /*$record2 = DB::select("SELECT * FROM `arsip` WHERE `sektor_id`='$value'");*/

        if (Auth::user()->name == 'Satuan Polisi Pamong Praja') {
        $record = ArsipModel::whereMonth('tanggal', '=', $bulan)
                ->whereYear('tanggal', '=', $tahun)
                ->Paginate(100);
        }
        elseif (Auth::user()->name == 'BPPD'){
            $record = ArsipModel::where('jns_izin_id', '=', '105')
                ->Paginate(100);
        }
        else{
        $record = ArsipModel::where('sektor_id', '=', $user_sektor)
                ->whereMonth('tanggal', '=', $bulan)
                ->whereYear('tanggal', '=', $tahun)
                ->Paginate(100);/*->where($sektor->nama_sektor, '=', $user)->sortByDesc('created_at')*/;
        }
       //dd($record);
        return view('skpd.base.rekapskpd', compact( 'record', 'p', 'peminjam', 'user', 'bulan', 'tahun', 'month', 'year'));
    }

    /**
     * @param $id
     */
    public function pdfview($id)
    {
        $sk = ArsipModel::find($id);
        $download = $sk->sk;
        //dd($download);
        
        return Storage::download($download);
    }

    public function search(Request $request)
    {
        $user = Auth::user()->name;
        $user_sektor = Auth::user()->sektor;
        $katakunci= $request->input('search');
        $cari = ArsipModel::search($katakunci)->get();
        //dd($cari->first()->lemari->kode_lemari);
        dd($cari);
        if (!isset($cari) == true){

        }
        else{

        }


        /*$sektor = $cari->first()->sektor->nama_sektor;

        $lemari = $cari->first()->lemari->kode_lemari;*/

        //return view('master.master_lemari', compact('cari', 'lemari', 'sektor'));
        return view('skpd.base.s_result', compact('cari', 'keywords'));
    }

    /**
     *
     */
 /*   public function all(){
        $record = ArsipModel::paginate(10);

        $p = DB::select("SELECT COUNT(*) as jml FROM `pinjam` WHERE `tanggal_kembali` IS NULL");

        $peminjam = PinjamArsipModel::all()->sortByDesc('created_at');


        return view('yanjin.base.rekap.all', compact('record', 'p', 'peminjam'));
    }*/
}

