<?php

namespace App\Http\Controllers\API;

use App\Models\Yanjin\ArsipModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function skApi(){
        $key = Hash::make('@r5iP*DPMPTSP');
        //dd($key);
        $arsip = ArsipModel::select('nama_pt', 'nama_pemilik', 'no_sk', 'tanggal', 'sk')->get();

        return $arsip;
    }
}
