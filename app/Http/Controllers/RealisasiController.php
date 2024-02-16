<?php

namespace App\Http\Controllers;

use App\Models\Realisasi;
use Illuminate\Http\Request;

class RealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('realisasi')){
            $realisasi = Realisasi::where('nama_program', 'LIKE', $request->realisasi.'%')->paginate(2)->withQueryString();
        }else{
            $realisasi = Realisasi::paginate(2);
        }
        return view('realisasi.realisasi_anggaran', [
            'realisasi' => $realisasi
        ]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('realisasi.create_realisasi')
        //             ->with('url_form', url('/realisasi'));
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'program' => 'required|string|max:20',
            'sub_kegiatan' => 'required|string|max:20',
            'target' => 'required|string|max:20',
            'pagu' => 'required|string|max:20',
        ]);

        $data = Realisasi::create($request->except(['_token']));
        return redirect('realisasi')
                        ->with('success', 'Data Realisasi Program Berhasil Ditambahkan');
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Realisasi $realisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $realisasi = Realisasi::find($id);
        return view('realisasi.create_realisasi')
                    ->with('realisasi', $realisasi)
                    ->with('url_form', url('/realisasi/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Realisasi $realisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'program' => 'required|string|max:20',
            'sub_kegiatan' => 'required|string|max:20',
            'target' => 'required|string|max:20',
            'pagu' => 'required|string|max:20',
        ]);

        $data = Realisasi::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('realisasi')
                        ->with('success', 'Data Realisasi Program Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Realisasi $realisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        realisasi::where('id', '=', $id)->delete();
        return redirect('realisasi')
                        ->with('success', 'data Berhasil Dihapus');
    }

}
