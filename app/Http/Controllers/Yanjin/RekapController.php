<?php

namespace App\Http\Controllers\Yanjin;

use App\Models\Yanjin\ArsipModel;
use App\Models\Yanjin\JenisIzinModel;
use App\Models\Yanjin\PinjamArsipModel;
use App\Models\Yanjin\SektorModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RekapController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function today(){
        $p = DB::select("SELECT COUNT(*) as jml FROM `pinjam` WHERE `tanggal_kembali` IS NULL");
        $peminjam = PinjamArsipModel::all()->sortByDesc('created_at');

        $day = Carbon::today();
        //dd($day);

        $today = ArsipModel::whereDate('created_at', $day)->get();
        //dd($today);

        foreach ($today as $t){
            //dd($t->lemari);
        }
        //dd($today);
        /*$today = ArsipModel::where();*/

        return view('yanjin.base.rekap.harian', compact('today', 'p', 'peminjam'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function izin(Request $request){

        $dropdown = JenisIzinModel::all(['nama_izin', 'id']);
        $value = $request->input('id');

        $p = DB::select("SELECT COUNT(*) as jml FROM `pinjam` WHERE `tanggal_kembali` IS NULL");


        $peminjam = PinjamArsipModel::all()->sortByDesc('created_at');



        /*$record2 = DB::select("SELECT * FROM `arsip` WHERE `jns_izin_id`='$value'");*/
        $record = ArsipModel::where('jns_izin_id', '=', $value)->paginate(10);

       /*foreach ($record as $r){
           dd($r->jenis->nama_izin);
       }*/


        return view('yanjin.base.rekap.izin', compact('dropdown', 'record', 'p', 'peminjam'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sektor(Request $request){

        $dropdown = SektorModel::all(['nama_sektor', 'id']);
        $value = $request->input('id');

        $p = DB::select("SELECT COUNT(*) as jml FROM `pinjam` WHERE `tanggal_kembali` IS NULL");
        $peminjam = PinjamArsipModel::all()->sortByDesc('created_at');

        /*$izin = $peminjam->izin()->nama_izin;
        dd($izin);*/
        /*$record2 = DB::select("SELECT * FROM `arsip` WHERE `sektor_id`='$value'");*/

        $record = ArsipModel::where('sektor_id', '=', $value)->paginate(10);

        return view('yanjin.base.rekap.sektor', compact('dropdown', 'record', 'p', 'peminjam'));
    }

    public function bulan(Request $request){

        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        $year = DB::select("SELECT YEAR(t.tanggal) as year FROM arsip t GROUP BY YEAR(t.tanggal) DESC;");
        $month = DB::select("SELECT MONTH(t.tanggal) as month FROM arsip t GROUP BY MONTH(t.tanggal) DESC;");

        $p = DB::select("SELECT COUNT(*) as jml FROM `pinjam` WHERE `tanggal_kembali` IS NULL");
        $peminjam = PinjamArsipModel::all()->sortByDesc('created_at');

        //dd($year);
        //dd($month);

        /*$record = DB::select("SELECT * FROM arsip
                 WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");*/

        $record = ArsipModel::whereMonth('tanggal', '=', $bulan)
            ->whereYear('tanggal', '=', $tahun)
            ->get();
        //dd($record);

        //dd($record2);

        //dd($record);

        return view('yanjin.base.rekap.bulan', compact('bulan', 'tahun', 'year', 'p', 'peminjam', 'month', 'record'));
    }

    public function tahun(Request $request){

        $tahun = $request->input('tahun');
        $year = DB::select("SELECT YEAR(t.tanggal) as year FROM arsip t GROUP BY YEAR(t.tanggal) DESC;");

        $p = DB::select("SELECT COUNT(*) as jml FROM `pinjam` WHERE `tanggal_kembali` IS NULL");
        $peminjam = PinjamArsipModel::all()->sortByDesc('created_at');

        $record = ArsipModel::whereYear('tanggal', '=', $tahun)->get();

        return view('yanjin.base.rekap.tahun', compact('tahun', 'peminjam','p','year', 'record' ));
    }

    /**
     *
     */
    public function all(){
        $record = ArsipModel::paginate(10);

        $p = DB::select("SELECT COUNT(*) as jml FROM `pinjam` WHERE `tanggal_kembali` IS NULL");

        $peminjam = PinjamArsipModel::all()->sortByDesc('created_at');


        return view('yanjin.base.rekap.all', compact('record', 'p', 'peminjam'));
    }
}
