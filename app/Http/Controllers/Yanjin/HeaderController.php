<?php

namespace App\Http\Controllers\Yanjin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeaderController extends Controller
{
    public function showHeader(){
        $p = DB::select("SELECT COUNT(*) as jml FROM `pinjam` WHERE `tanggal_kembali` IS NULL");
        dd($p->jml);

        $peminjam = PinjamArsipModel::all()->sortByDesc('created_at');
        //dd($peminjam);
        /*$peminjam = DB::select("SELECT * FROM `pinjam` WHERE `tanggal_kembali` IS NULL ORDER BY `created_at` DESC");*/

        return view('yanjin.layouts.header', compact('p', 'peminjam'));
    }
}
