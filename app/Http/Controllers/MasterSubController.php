<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Master_kegiatan;
use App\Models\Master_program;
use App\Models\Master_subkegiatan;
use Illuminate\Http\Request;

class MasterSubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('master_subkegiatan')){
            $master_subkegiatan = Master_subkegiatan::where('nama_program', 'LIKE', $request->master_subkegiatan.'%')->paginate(2)->withQueryString();
        }else{
            $master_subkegiatan = Master_subkegiatan::paginate(2);
        }    
        return view('master_subkegiatan.master_subkegiatan', [
            'master_subkegiatan' => $master_subkegiatan
        ]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bidang = Bidang::all();
        $program = Master_program::all();
        $master_kegiatan = Master_kegiatan::all();
        return view('master_subkegiatan.create_master_subkegiatan')
                    ->with('url_form', url('/master_subkegiatan'))
                    ->with('bidang', $bidang)
                    ->with('master_kegiatan', $master_kegiatan)
                    ->with('program', $program);
    }

    
    public function getKegiatan(Request $request)
    {
        $program = $request->get('program');
        $master_kegiatan = Master_kegiatan::where('nama_program', $program)->get();
        return response()->json($master_kegiatan);
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
            'tahun' => 'required|string|max:4',
            'rekening_program' => 'required|string|max:30',
            'nama_program' => 'required|string|max:20',
            'rekening_kegiatan' => 'required|string|max:20',
            'nama_kegiatan' => 'required|string|max:20',
            'rekening_subkegiatan' => 'required|string|max:20',
            'nama_subkegiatan' => 'required|string|max:20',
        ]);

        // $data = Master_subkegiatan::create($request->except(['_token']));
        Master_subkegiatan::create([
            'tahun' => $request->post('tahun'),
            'rekening_program' => $request->post('rekening_program'),
            'nama_program' => $request->post('nama_program'),
            'rekening_kegiatan' => $request->post('rekening_kegiatan'),
            'nama_kegiatan' => $request->post('nama_kegiatan'),
            'rekening_subkegiatan' => $request->post('rekening_subkegiatan'),
            'nama_subkegiatan' => $request->post('nama_subkegiatan'),
            // 'nomor_rekening' => $request->post('no_rek'),
            // 'nama_program' => $request->post('master_program')
        ]);
        return redirect('master_subkegiatan')
                        ->with('success', 'Data SubKegiatan Berhasil Ditambahkan');
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master_subkegiatan  $master_subkegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Master_subkegiatan $master_subkegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master_subkegiatan  $master_subkegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master_subkegiatan = Master_subkegiatan::find($id);
        return view('master_subkegiatan.create_master_subkegiatan')
                    ->with('master_subkegiatan', $master_subkegiatan)
                    ->with('url_form', url('/master_subkegiatan/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master_subkegiatan  $master_subkegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rekening_program' => 'required|string|max:30',
            'nama_program' => 'required|string|max:20',
            'rekening_kegiatan' => 'required|string|max:20',
            'nama_kegiatan' => 'required|string|max:20',
            'rekening_subkegiatan' => 'required|string|max:20',
            'nama_subkegiatan' => 'required|string|max:20',
        ]);

        $data = Master_subkegiatan::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('master_subkegiatan')
                        ->with('success', 'Data SubKegiatan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master_subkegiatan  $master_subkegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Master_subkegiatan::where('id', '=', $id)->delete();
        return redirect('master_subkegiatan')
                        ->with('success', 'data Berhasil Dihapus');
    }

}
     