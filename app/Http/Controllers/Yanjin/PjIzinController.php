<?php

namespace App\Http\Controllers\Yanjin;

use App\Models\Yanjin\JenisIzinModel;
use App\Models\Yanjin\PivotPJ;
use App\Models\Yanjin\PjIzinModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function Sodium\increment;

class PjIzinController extends Controller
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
    public function showForm()
    {
        $pj = PjIzinModel::all();
        $dropdown = JenisIzinModel::all(['nama_izin', 'id']);

        /*foreach ($pj as $p){
            foreach ($p->pivot as $nama){
                $pivot = $nama;
                dd($p->namaizin);
            }
        }*/

        foreach ($pj as $p){
            foreach ($p->jenis as $r){
                //dd($r->nama_izin);
            }


        }
        $i = 1;

        /*dd($sektor);*/

        return view('yanjin.base.pj', compact('pj','pivot2', 'dropdown', 'i'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function submitFormPj(Request $request)
    {
        $this->validate($request, [
            'nama_pj' => 'required',
        ]);
        $pjarr = $request->input('jns_izin_id');


        $pj = new PjIzinModel;
        $nama = $pj->jns_izin_id;
        $pj->nama_pj = $request->input('nama_pj');
        $nama['jns_izin'] = $pjarr;
        $pj->jns_izin_id = $nama;
        //dd($pj);
        $pj->save();

        foreach ($pjarr as $p){
            $pivot = new PivotPJ();
            $pivot->pj_izin_id = $pj->id;
            $pivot->jns_izin_id = $p;
            //dd($pivot);
            $pivot->save();
        }
        
        return redirect()->route('show.setting')->with('success', 'Data Penanggungjawab berhasil disimpan');
    }

    public function editPj($id)
    {
        $edit = PjIzinModel::find($id);
        //dd($edit->id);
        $dropdown2 = JenisIzinModel::all(['nama_izin', 'id']);

        return view('yanjin.base.editpj', compact('edit', 'dropdown2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updatePj(Request $request, $id)
    {
        $this->validate($request, [
            'nama_pj' => 'required',
            'jns_izin_id' => 'required',
        ]);


        $pj = PjIzinModel::find($id);
        $pj->nama_pj = $request->input('nama_pj');
        $pj->jns_izin_id = serialize($pjarr);
        //dd($pj);
        $pj->save();

        return redirect()->route('show.setting')->with('success', 'Penanggungjawab Izin Berhasil Di Ubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $update = PjIzinModel::find($id);
        //dd($update);
        $update->delete();

        return redirect()->route('show.setting')->with('success', 'Jenis Izin Berhasil Dihapus');
    }
}
