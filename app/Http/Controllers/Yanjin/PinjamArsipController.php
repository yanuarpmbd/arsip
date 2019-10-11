<?php

namespace App\Http\Controllers\Yanjin;

use App\Models\Yanjin\ArsipModel;
use App\Models\Yanjin\JenisIzinModel;
use App\Models\Yanjin\PinjamArsipModel;
use App\Models\Yanjin\PjIzinModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Yanjin\SektorModel;
use Illuminate\Support\Facades\DB;
use PDF;
use Dompdf\Dompdf;

class PinjamArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dropdown = ArsipModel::all(['nama_pt', 'no_sk' , 'unique_id' , 'id']);
        $dropdown2 = SektorModel::all(['nama_sektor', 'id']);
        $dropdown3 = PjIzinModel::all(['nama_pj', 'id']);

        //dd($dropdown);


        return view('yanjin.pinjam.base.get-pinjam', compact('dropdown3','dropdown2', 'dropdown'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function peminjaman()
    {

        $peminjam = PinjamArsipModel::all()->sortBy('created_at');

        return view('yanjin.pinjam.base.peminjaman', compact('peminjam'));
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'search' => 'required',
        ]);

        $keyword = $request->input('search');
        $today= date('Y-m-d');
        //dd($data);

        $post = new PinjamArsipModel();
        $post->nama = $request->input('nama');
        $post->kode_arsip = $keyword;
        $post->tanggal = $today;

        //dd($post);
        $post->save();

        return redirect()->back()->with('success', 'Pengajuan Pinjaman Anda berhasil disimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $today= date('Y-m-d');
        $edit = PinjamArsipModel::find($id);
        //dd($edit);

        return view('yanjin.pinjam.base.edit', compact('edit', 'today'));
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
        $update = PinjamArsipModel::find($id);

        $update->nama = $request->get('nama');
        $update->kode_arsip = $request->get('kode_arsip');
        $update->tanggal = $request->get('tanggal');
        $update->tanggal_kembali = $request->get('tanggal_kembali');

        $update->save();


        return redirect()->route('get.peminjam')->with('success', 'Data peminjaman berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = PinjamArsipModel::findOrFail($id);
        $hapus->delete();

        return redirect()->route('get.peminjam')->with('success', 'Data peminjaman berhasil dihapus');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('arsip')->select('id', 'nama_pt', 'jns_izin_id')->where('nama_pt', 'LIKE', '%$cari%')->get();
           // dd($data);
            return response()->json($data);
        }
    }

    public function printTT($id){
        $today= date('Y-m-d');
        $edit = PinjamArsipModel::find($id);
        $pdf = PDF::loadView('yanjin.pinjam.edit-pinjam', compact('edit', 'today'));
        return $pdf->download('invoice.pdf');

    }
}
