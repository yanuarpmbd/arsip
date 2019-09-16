<?php

namespace App\Http\Controllers\Yanjin;

use App\Models\Yanjin\JenisIzinModel;
use App\Models\Yanjin\LemariModel;
use App\Models\Yanjin\SektorModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LemariController extends Controller
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
        $lemari = LemariModel::all();
        $dropdown = JenisIzinModel::all(['nama_izin', 'id']);
        /*dd($sektor);*/

        return view('yanjin.base.lemari', compact('lemari', 'dropdown'));
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
    public function submitFormLemari(Request $request)
    {
        $this->validate($request, [
            'lemari' => 'required',
        ]);

        $input = $request->input('jns_izin_id');
        $pj = new LemariModel;
        $pj->kode_lemari = $request->input('lemari');
        $pj->jns_izin_id = $input;

        $sektor = JenisIzinModel::find($input)->sektor->id;
        //dd($sektor);
        $pj->sektor_id = $sektor;

        $pj->save();
        //dd($pj);


        return redirect()->back()->with('success', 'Data Lemari berhasil disimpan');
    }

    public function editLemari($id)
    {
        $edit = LemariModel::find($id);
        //dd($edit->id);
        $dropdown2 = JenisIzinModel::all(['nama_izin', 'id']);

        return view('yanjin.base.lemari_edit', compact('edit', 'dropdown2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateLemari(Request $request, $id)
    {
        $this->validate($request, [
            'lemari' => 'required',
            'jns_izin_id' => 'required',
        ]);

        $pj = LemariModel::find($id);
        $pj->kode_lemari = $request->input('lemari');
        $pj->jns_izin_id = $request->input('jns_izin_id');
        $input = $request->input('jns_izin_id');
        $sektor = JenisIzinModel::find($input)->sektor->id;
        $pj->sektor_id = $sektor;
        //dd($pj);
        $pj->save();

        return redirect()->route('show.setting')->with('success', 'Data Lemari Berhasil Di Ubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $update = LemariModel::find($id);
        //dd($update);
        $update->delete();

        return redirect()->route('show.setting')->with('success', 'Lemari Berhasil Dihapus');
    }
}
