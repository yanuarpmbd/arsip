<?php

namespace App\Http\Controllers\Yanjin;

use App\Models\Yanjin\ArsipModel;
use App\Models\Yanjin\DusModel;
use App\Models\Yanjin\JenisIzinModel;
use App\Models\Yanjin\KabKotaModel;
use App\Models\Yanjin\LemariModel;
use App\Models\Yanjin\PinjamArsipModel;
use App\Models\Yanjin\PjIzinModel;
use App\Models\Yanjin\SektorModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArsipController extends Controller
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
        $arsip = ArsipModel::all();
        $dropdown = JenisIzinModel::all(['nama_izin', 'id']);
        $dropdown2 = LemariModel::all(['kode_lemari', 'id']);
        $dropdown3 = PjIzinModel::all(['nama_pj', 'id']);
        $dropdown4 = KabKotaModel::all(['nama_kabkota', 'id']);
        $p = DB::select("SELECT COUNT(*) as jml FROM `pinjam` WHERE `tanggal_kembali` IS NULL");
        //dd($p->jml);

        $peminjam = PinjamArsipModel::all()->sortByDesc('created_at');
        //dd($peminjam);
        /*$peminjam = DB::select("SELECT * FROM `pinjam` WHERE `tanggal_kembali` IS NULL ORDER BY `created_at` DESC");*/

        $today= date('Y-m-d');
        //dd($today);

        $blog = DB::select("SELECT YEAR(`tanggal`) year, MONTH(`tanggal`) month, MONTHNAME(`tanggal`) month_name, COUNT(*) post_count FROM arsip GROUP BY year, MONTH(`tanggal`) ORDER BY year DESC, month DESC");
        //dd($blog[1]->month_name);
        $tahun = DB::select("SELECT YEAR(t.tanggal) as year FROM arsip t GROUP BY YEAR(t.tanggal) DESC;");
        //dd($tahun);

        return view('yanjin.base.base', compact('arsip', 'p',  'dropdown', 'dropdown2', 'dropdown3', 'dropdown4', 'blog', 'today', 'tahun', 'peminjam'));

    }

    public function edit($id){
        $today = date('Y-m-d');
        $edit = ArsipModel::find($id);

        return view('all.base.edit-arsip', compact('edit', 'today'));
        //dd($edit);
    }

/*    public function updatearsip (Request $request,$id) {
        $arsips = ArsipModel::findOrFail($id);
        $nama_pt = $request->input('nama_pt');
        $no_sk = $request->input('no_sk');
        $tgl_sk = $request->input('tgl_sk');
        $pj_izin_id = $request->input('pj_izin_id');
        $jns_izin_id = $request->input('pj_izin_id');
        $sektor_id = $request->input('sektor_id');
        $lemari_id = $request->input('lemari_id');
        $dus_id = $request->input('saf_id');

    }*/


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateArsip(Request $request, $id)
    {
        $this->validate($request, array(
            'data_dukung' => 'required|mimes:pdf|max:10000',
        ));


        $arsip = ArsipModel::find($id);
        dd($arsip);
        if ($request->hasFile('data_dukung')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('data_dukung')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('data_dukung')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2 = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('data_dukung')->storeAs('storage/Data Dukung', $fileNameToStore2);
        } else {
            $fileNameToStore2 = 'noimage.jpg';
        }



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

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function submitFormArsip(Request $request)
    {
        $this->validate($request, array(
            'nama_pt' => 'required',
            'no_sk' => 'required',
            'file_sk' => 'required|mimes:pdf|max:10000',
            'tanggal' => 'required',
            'jns_izin_id' => 'required',
            'lemari' => 'required',
            'dus' => 'required',
            'saf' => 'required',
            'kabkota' => 'required',
        ));

        $te = $request->file('file_sk');
       // dd($te);

        if ($request->hasFile('file_sk')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('file_sk')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file_sk')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('file_sk')->storeAs('/', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        if ($request->hasFile('data_dukung')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('data_dukung')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('data_dukung')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2 = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('data_dukung')->storeAs('/', $fileNameToStore2);
        } else {
            $fileNameToStore2 = 'noimage.jpg';
        }


        //dd($nama_to_kode);
        //dd($fileNameToStore);
        $input_izin = $request->input('jns_izin_id');
        $input_lemari = $request->input('lemari');
        $input_pj = $request->input('nama_pj');
        $sektor = JenisIzinModel::find($input_izin)->sektor->id;
        //dd($input_izin);

        $arsipsaiki = ArsipModel::where('jns_izin_id', $input_izin)->get();
        $itung = count($arsipsaiki);
        //dd($itung);

        $nama_bu = $request->input('nama_pt');
        $sektor_to_kode = JenisIzinModel::find($input_izin)->sektor->kode_sektor;
        $nama_to_kode = strtoupper(substr($nama_bu, 0, 1));
        $saf = $request->input('saf');
        $dus = $request->input('dus');
        $kabkota = $request->input('kabkota');

        $arsip = new ArsipModel();
        $arsip->nama_pt = $nama_bu;
        $arsip->unique_id = $sektor_to_kode.'.'.$input_izin.'.'.$input_lemari.'.'.$saf.'.'.$dus.'.'.$nama_to_kode.'.'.($itung+1);
        $arsip->no_sk = $request->input('no_sk');

        $arsip->sk = $fileNameToStore;
        $arsip->data_dukung = $fileNameToStore2;

        $arsip->tanggal = $request->input('tanggal');
        $arsip->pj_izin_id = $input_pj;
        $arsip->jns_izin_id = $input_izin;
        $arsip->sektor_id = $sektor;
        $arsip->lemari_id = $input_lemari;
        $arsip->dus_id = $dus;
        $arsip->saf_id = $saf;
        $arsip->kabkota_id = $kabkota;


        //dd($arsip);
        $arsip->save();

        return redirect()->back()->with('success', 'Arsip berhasil disimpan');

    }

    public function search(Request $request)
    {
        $keywords = $request->input('search');
        $cari = ArsipModel::search($keywords)->get();
        //dd($cari->first()->lemari->kode_lemari);
        //dd(!isset($cari));
        if (!isset($cari) == true){

        }
        else{
            /*$sektor = $cari->first()->sektor->nama_sektor;

            $lemari = $cari->first()->lemari->kode_lemari;*/
        }

        /*$sektor = $cari->first()->sektor->nama_sektor;

        $lemari = $cari->first()->lemari->kode_lemari;*/

        //return view('master.master_lemari', compact('cari', 'lemari', 'sektor'));
        return view('yanjin.base.s_result', compact('cari', /*'lemari', 'sektor',*/ 'keywords'));
    }

}
