<?php

namespace App\Http\Controllers\Yanjin;

use App\Models\Yanjin\KabKotaModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KabKotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showForm()
    {
        $kabkota = KabKotaModel::all();
        $dropdown4 = KabKotaModel::all(['nama_kabkota', 'id']);
        //dd($kabkota);

        return view('yanjin.base.kabkota', compact('kabkota', 'dropdown4'));
    }

    public function submitFormKabKota(Request $request)
    {
        $this->validate($request, [
            'kabkota' => 'required',
        ]);

        $kabkota = new KabKotaModel;
        $kabkota->nama_kabkota = $request->input('kabkota');
        //dd($kabkota);
        $kabkota->save();
        //dd($pj);


        return redirect()->back()->with('success', 'Data Kab/Kota berhasil disimpan');
    }

}
