<?php

namespace App\Http\Controllers;

use App\Models\Indikator_program;
use Illuminate\Http\Request;

class IndikatorProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('indikator_program')){
            $indikator_program = Indikator_program::where('nama_program', 'LIKE', $request->indikator_program.'%')->paginate(2)->withQueryString();
        }else{
            $indikator_program = Indikator_program::paginate(2);
        }
        return view('indikator_program.indprogram', [
            'indikator_program' => $indikator_program
        ]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('indikator_program.create_indikator_program')
                    ->with('url_form', url('/indikator_program'));
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
            'nama_program' => 'required|string|max:20',
            'indikator' => 'required|string|max:20',
            'target' => 'required|string|max:20',
            'satuan' => 'required|string|max:20',
            'pagu' => 'required|string|max:20',
        ]);

        $data = Indikator_program::create($request->except(['_token']));
        return redirect('indikator_program')
                        ->with('success', 'Data Indikator Program Berhasil Ditambahkan');
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Indikator_program  $indikator_program
     * @return \Illuminate\Http\Response
     */
    public function show(Indikator_program $indikator_program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Indikator_program  $indikator_program
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indikator_program = Indikator_program::find($id);
        return view('indikator_program.create_indikator_program')
                    ->with('indikator_program', $indikator_program)
                    ->with('url_form', url('/indikator_program/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Indikator_program  $indikator_program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_rekening' => 'required|string|max:30',
            'nama_program' => 'required|string|max:20',
            'indikator' => 'required|string|max:20',
            'target' => 'required|string|max:20',
            'satuan' => 'required|string|max:20',
            'pagu' => 'required|string|max:20',
        ]);

        $data = Indikator_program::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('indikator_program')
                        ->with('success', 'Data Indikator Program Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Indikator_program $indikator_program
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Indikator_program::where('id', '=', $id)->delete();
        return redirect('indikator_program')
                        ->with('success', 'data Berhasil Dihapus');
    }

}
