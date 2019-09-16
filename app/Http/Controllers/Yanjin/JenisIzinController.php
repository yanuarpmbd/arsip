<?php

namespace App\Http\Controllers\Yanjin;

use App\Models\Yanjin\JenisIzinModel;
use App\Models\Yanjin\SektorModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JenisIzinController extends Controller
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
        $izin = JenisIzinModel::all();

        $dropdown2 = SektorModel::all(['nama_sektor', 'id']);
        /*dd($sektor);*/

        return view('yanjin.base.izin', compact('izin', 'dropdown2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function submitFormIzin(Request $request)
    {
        $this->validate($request, [
            'nama_izin' => 'required',
        ]);

        $izin = new JenisIzinModel;
        $izin->nama_izin = $request->input('nama_izin');
        $izin->sektor_id = $request->input('sektor');
        $izin->save();
        //dd($izin);


        return redirect()->back()->with('success', 'Data Jenis Izin berhasil disimpan');
    }

    public function editIzin($id)
    {
        $edit = JenisIzinModel::find($id);
        $dropdown2 = SektorModel::all(['nama_sektor', 'id']);

        return view('yanjin.base.edit_izin', compact('edit', 'dropdown2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateIzin(Request $request, $id)
    {
        $this->validate($request, [
            'nama_izin' => 'required',
            'sektor' => 'required',
        ]);

        $update_nama = $request->input('izin');
        $update_kode = $request->input('sektor');

        $update = JenisIzinModel::find($id);
        $update->nama_izin = $update_nama;
        $update->sektor_id = $update_kode;
        //dd($update);


        $update->save();

        return redirect()->route('show.setting')->with('success', 'Jenis Izin Berhasil Di Ubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $update = JenisIzinModel::find($id);
        //dd($update);
        $update->delete();

        return redirect()->route('show.setting')->with('success', 'Jenis Izin Berhasil Dihapus');
    }
}
