<?php

namespace App\Http\Controllers\Yanjin;

use App\Models\Yanjin\JenisIzinModel;
use App\Models\Yanjin\PinjamArsipModel;
use App\Models\Yanjin\PjIzinModel;
use App\Models\Yanjin\LemariModel;
use App\Models\Yanjin\SektorModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
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
    public function index()
    {
        $lemari = LemariModel::all();
        $dropdown = JenisIzinModel::all(['nama_izin', 'id']);
        $pj = PjIzinModel::all();
        $sektors = SektorModel::all();
        $izin = JenisIzinModel::all();
        $dropdown2 = SektorModel::all(['nama_sektor', 'id']);

        $iki = PjIzinModel::find(17);

        //dd($pj);


        $p = DB::select("SELECT COUNT(*) as jml FROM `pinjam` WHERE `tanggal_kembali` IS NULL");
        $peminjam = PinjamArsipModel::all()->sortByDesc('created_at');

        $i = 1;

        return view('yanjin.base.settings', compact('lemari', 'p','peminjam', 'dropdown', 'pj', 'sektors', 'izin', 'dropdown2', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
