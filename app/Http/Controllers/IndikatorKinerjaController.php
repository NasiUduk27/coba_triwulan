<?php

namespace App\Http\Controllers;

use App\Models\Indikator_kinerja;
use Illuminate\Http\Request;

class IndikatorKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('indikator_kinerja')){
            $indikator_kinerja = Indikator_kinerja::where('sub_kegiatan', 'LIKE', $request->indikator_kinerja.'%')->paginate(2)->withQueryString();
        }else{
            $indikator_kinerja = Indikator_kinerja::paginate(2);
        }
        return view('indikator_kinerja.indikator_kinerja', [
            'indikator_kinerja' => $indikator_kinerja
        ]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('indikator_kinerja.create_indikator_kinerja')
                    ->with('url_form', url('/indikator_kinerja'));
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
            'nomor_rekening' => 'required|string|max:30',
            'sub_kegiatan' => 'required|string|max:20',
            'indikator' => 'required|string|max:20',
            'target' => 'required|string|max:20',
            'satuan' => 'required|string|max:20',
            'pagu' => 'required|string|max:20',
        ]);

        $data = Indikator_kinerja::create($request->except(['_token']));
        return redirect('indikator_kinerja')
                        ->with('success', 'Data Indikator Kinerja Berhasil Ditambahkan');
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Indikator_kinerja  $indikator_kinerja
     * @return \Illuminate\Http\Response
     */
    public function show(Indikator_kinerja $indikator_kinerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Indikator_kinerja $indikator_program
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indikator_kinerja = Indikator_kinerja::find($id);
        return view('indikator_kinerja.create_indikator_kinerja')
                    ->with('indikator_kinerja', $indikator_kinerja)
                    ->with('url_form', url('/indikator_kinerja/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Indikator_kinerja  $indikator_kinerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_rekening' => 'required|string|max:30',
            'sub_kegiatan' => 'required|string|max:20',
            'indikator' => 'required|string|max:20',
            'target' => 'required|string|max:20',
            'satuan' => 'required|string|max:20',
            'pagu' => 'required|string|max:20',
        ]);

        $data = Indikator_kinerja::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('indikator_kinerja')
                        ->with('success', 'Data Indikator Kinerja Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Indikator_kinerja $indikator_kinerja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Indikator_kinerja::where('id', '=', $id)->delete();
        return redirect('indikator_kinerja')
                        ->with('success', 'data Berhasil Dihapus');
    }
}
