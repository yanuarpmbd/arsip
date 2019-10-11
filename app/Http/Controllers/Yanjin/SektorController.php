<?php

namespace App\Http\Controllers\Yanjin;

use App\Http\Controllers\Controller;
use App\Models\Yanjin\SektorModel;
use Illuminate\Http\Request;

class SektorController extends Controller
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
        $sektors = SektorModel::all();
        /*dd($sektor);*/

        return view('yanjin.base.sektor', compact('sektors'));
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
    public function submitFormSektor(Request $request)
    {
        $this->validate($request, [
           'sektor' => 'required',
        ]);

        $sektor = new SektorModel;
        $sektor->nama_sektor = $request->input('sektor');
        $sektor->kode_sektor = $request->input('kode_sektor');
        //dd($sektor);
        $sektor->save();

        $sektors = SektorModel::all();

        return redirect()->back()->with('success', 'Data Sektor berhasil disimpan');
    }

    public function showSektor()
    {
        $sektors = SektorModel::all();
        /*dd($sektor);*/

        return view('yanjin.base.sektor', compact('sektors'));
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
    public function editSektor($id)
    {
        $edit = SektorModel::find($id);

        return view('yanjin.base.edit_sektor', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateSektor(Request $request, $id)
    {
        $this->validate($request, [
            'nama_sektor' => 'required',
            'kode_sektor' => 'required',
        ]);

        $update_nama = $request->input('sektor');
        $update_kode = $request->input('kode_sektor');

        $update = SektorModel::find($id);
        $update->nama_sektor = $update_nama;
        $update->kode_sektor = $update_kode;
        //dd($update);


        $update->save();

        return redirect()->back()->with('success', 'Sektor Berhasil Di Ubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $update = SektorModel::find($id);
        //dd($update);
        $update->delete();

        return redirect()->back()->with('success', 'Sektor Berhasil Dihapus');
    }
}
