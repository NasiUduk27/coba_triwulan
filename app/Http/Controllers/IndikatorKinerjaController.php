<?php

namespace App\Http\Controllers;

use App\Models\Indikator_kinerja;
use App\Models\Master_subkegiatan;
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
        $data = Indikator_kinerja::all();

        return view('indikator_kinerja.indikator_kinerja')->with('data', $data);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master_subkegiatan = Master_subkegiatan::all();

        return view('indikator_kinerja.create_indikator_kinerja')
            ->with('url_form', url('/indikator_kinerja'))
            ->with('master_subkegiatan', $master_subkegiatan);
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nomor_rekening' => 'required|string|max:30',
        //     'sub_kegiatan' => 'required|string|max:20',
        //     'indikator' => 'required|string|max:20',
        //     'target' => 'required|string|max:20',
        //     'satuan' => 'required|string|max:20',
        //     'pagu' => 'required|string|max:20',
        // ]);

        // $data = Indikator_kinerja::create($request->except(['_token']));
        // return redirect('indikator_kinerja')
        //                 ->with('success', 'Data Indikator Kinerja Berhasil Ditambahkan');

        $request->validate([
            'sub_kegiatan' => 'required',
            'indikator' => 'required',
            'target' => 'required|numeric',
            'satuan' => 'required',
            'pagu' => 'required|numeric',
        ]);

        $cariKegiatan = Master_subkegiatan::where('id', $request->kegiatan)->first();

        $insert = Indikator_kinerja::create([
            'nomor_rekening' => $cariKegiatan->rekening_subkegiatan,
            'sub_kegiatan' => $cariKegiatan->nama_subkegiatan,
            'indikator' => $request->input('indikator'),
            'target' => $request->input('target'),
            'satuan' => $request->input('satuan'),
            'pagu' => $request->input('pagu'),
        ]);

        if ($insert) {
            return redirect('indikator_kinerja')
                ->with('success', 'Data Indikator Kinerja berhasil disimpan');
        } else {
            return back()->with('error', 'Data Gagal Disimpan');
        }
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
        // $indikator_kinerja = Indikator_kinerja::find($id);
        // return view('indikator_kinerja.create_indikator_kinerja')
        //             ->with('indikator_kinerja', $indikator_kinerja)
        //             ->with('url_form', url('/indikator_kinerja/'. $id));

        $master_subkegiatan = Master_subkegiatan::all();
        $indikator_kinerja = Indikator_kinerja::where('id', $id)->first();

        return view('indikator_kinerja.create_indikator_kinerja')
            ->with('url_form', url('/indikator_kinerja/' . $id))
            ->with('master_subkegiatan', $master_subkegiatan)
            ->with('indikator_kinerja', $indikator_kinerja);
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
        // $request->validate([
        //     'nomor_rekening' => 'required|string|max:30',
        //     'sub_kegiatan' => 'required|string|max:20',
        //     'indikator' => 'required|string|max:20',
        //     'target' => 'required|string|max:20',
        //     'satuan' => 'required|string|max:20',
        //     'pagu' => 'required|string|max:20',
        // ]);

        // $data = Indikator_kinerja::where('id', '=', $id)->update($request->except(['_token', '_method']));
        // return redirect('indikator_kinerja')
        //                 ->with('success', 'Data Indikator Kinerja Berhasil Diubah');

        $request->validate([
            'sub_kegiatan' => 'required',
            'indikator' => 'required',
            'target' => 'required|numeric',
            'satuan' => 'required',
            'pagu' => 'required|numeric',
        ]);

        $cariKegiatan = Master_subkegiatan::where('id', $request->kegiatan)->first();

        $update = Indikator_kinerja::where('id', $id)->update([
            'nomor_rekening' => $cariKegiatan->rekening_subkegiatan,
            'sub_kegiatan' => $cariKegiatan->nama_subkegiatan,
            'indikator' => $request->input('indikator'),
            'target' => $request->input('target'),
            'satuan' => $request->input('satuan'),
            'pagu' => $request->input('pagu'),
        ]);

        if ($update) {
            return redirect('indikator_kinerja')
                ->with('success', 'Data Indikator Kinerja berhasil disimpan');
        } else {
            return back()->with('error', 'Data Gagal Disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Indikator_kinerja $indikator_kinerja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Indikator_kinerja::where('id', '=', $id)->delete();
        // return redirect('indikator_kinerja')
        //                 ->with('success', 'data Berhasil Dihapus');

        $delete = Indikator_kinerja::where('id', $id)->delete();

        if ($delete) {
            return redirect('indikator_kinerja')
                ->with('success', 'Data Indikator Kinerja berhasil dihapus');
        } else {
            return back()->with('error', 'Data Gagal dihapus');
        }
    }
}
