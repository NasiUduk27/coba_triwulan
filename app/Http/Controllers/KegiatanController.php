<?php

namespace App\Http\Controllers;

use App\Models\Master_kegiatan;
use App\Models\Master_program;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('master_kegiatan')) {
            $master_kegiatan = Master_kegiatan::where('nama_program', 'LIKE', $request->master_kegiatan . '%')->paginate(2)->withQueryString();
        } else {
            $master_kegiatan = Master_kegiatan::paginate(2);
        }
        return view('master_kegiatan.kegiatan', [
            'master_kegiatan' => $master_kegiatan
        ]);
    }

    public function getKegiatan(Request $request)
    {
        $program = $request->get('program');
        $master_kegiatan = Master_kegiatan::where('nama_program', $program)->get();
        return response()->json($master_kegiatan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program = Master_program::all();
        return view('master_kegiatan.create_kegiatan')
            ->with('url_form', url('/master_kegiatan'))
            ->with('program', $program);
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
            'program' => 'required',
            'rekening_kegiatan' => 'required|string|max:20',
            'nama_kegiatan' => 'required|string|max:20',
        ]);

        $cariProgram = Master_program::where('id', $request->program)->first();

        $insert = new Master_kegiatan();
        $insert->rekening_program = $cariProgram->nomor_rekening;
        $insert->nama_program = $cariProgram->nama_program;
        $insert->rekening_kegiatan = $request->rekening_kegiatan;
        $insert->nama_kegiatan = $request->nama_kegiatan;
        $insert->save();

        if ($insert) {
            return redirect('master_kegiatan')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return back()->with('error', 'Data Gagal Ditambahkan');
        }
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
    public function edit($id)
    {
        $program = Master_program::all();
        $master_kegiatan = Master_kegiatan::where('id', $id)->first();

        return view('master_kegiatan.create_kegiatan')
            ->with('url_form', url('/master_kegiatan/' . $id))
            ->with('master_kegiatan', $master_kegiatan)
            ->with('program', $program);
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
        $request->validate([
            'program' => 'required',
            'rekening_kegiatan' => 'required|string|max:20',
            'nama_kegiatan' => 'required|string|max:20',
        ]);

        $cariProgram = Master_program::where('id', $request->program)->first();

        $update = Master_kegiatan::where('id', $id)->update([
            'rekening_program' => $cariProgram->nomor_rekening,
            'nama_program' => $cariProgram->nama_program,
            'rekening_kegiatan' => $request->rekening_kegiatan,
            'nama_kegiatan' => $request->nama_kegiatan
        ]);

        if ($update) {
            return redirect('master_kegiatan')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return back()->with('error', 'Data Gagal Ditambahkan');
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
        Master_kegiatan::where('id', '=', $id)->delete();
        return redirect('master_kegiatan')
            ->with('success', 'data Berhasil Dihapus');
    }
}
