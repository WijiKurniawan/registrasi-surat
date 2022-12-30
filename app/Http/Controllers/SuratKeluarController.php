<?php

namespace App\Http\Controllers;
use App\Models\SuratKeluar;

use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suratkeluar = SuratKeluar::all();
        $data = compact('suratkeluar');
        return view('suratkeluar.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('suratkeluar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        $validasi = $request->validate([
            'nomor_surat' => 'required',
            'penerima' => 'required',
            'agenda' => 'required',
            'perihal' => 'required',
            'tgl_surat' => 'required',
            'dokumen' => 'required|mimes:pdf,jpg,png|max:10000'
        ]);
        // dd($data);
        $ext = $request->dokumen->getClientOriginalExtension();
        $file = "surat_keluar-".time().".".$ext;
        $request->dokumen->storeAs('public/dokumen', $file);

        $simpan = new SuratKeluar();
        $simpan -> nomor_surat = $validasi['nomor_surat'];
        $simpan -> penerima = $validasi['penerima'];
        $simpan -> agenda = $validasi['agenda'];
        $simpan -> perihal = $validasi['perihal'];
        $simpan -> tgl_surat = $validasi['tgl_surat'];
        $simpan -> dokumen = $file;
        $simpan -> save();
        return redirect('suratkeluar');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SuratKeluar $suratkeluar)
    {
        return view('suratkeluar.show')->with('suratkeluar', $suratkeluar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratKeluar $suratkeluar)
    {
        // dd($suratkeluar);
        return view('suratkeluar.edit')->with('suratkeluar', $suratkeluar);

        // $data = compact('suratkeluar');
        // return view('suratkeluar.edit', $data);
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
        //
        // dd($id);
        $data = $request->all();
        $suratKeluar = SuratKeluar::find($id);
        // dd($data);
        $data = $request->validate([
            'nomor_surat' => 'required',
            'penerima' => 'required',
            'agenda' => 'required',
            'perihal' => 'required',
            'tgl_surat' => 'required',
            'dokumen' => 'mimes:pdf,jpg,png|max:10000'
        ]);


        // dd($simpan);
        // dd($data);
        if ($request->has('dokumen')){
            $ext = $request->dokumen->getClientOriginalExtension();
            $editFile = "surat_keluar-".time().".".$ext;
            $request->dokumen->storeAs('public/dokumen', $editFile);

            $suratKeluar->update([
                'nomor_surat' => $data['nomor_surat'],
                'penerima' => $data['penerima'],
                'agenda' => $data['agenda'],
                'perihal' => $data['perihal'],
                'tgl_surat' => $data['tgl_surat'],
                'dokumen' => $editFile
            ]);
        } else {
            $suratKeluar->update([
                'nomor_surat' => $data['nomor_surat'],
                'penerima' => $data['penerima'],
                'agenda' => $data['agenda'],
                'perihal' => $data['perihal'],
                'tgl_surat' => $data['tgl_surat'],
            ]);
        }
        // SuratKeluar::where('id', $id)->update($data);
        $request->session()->flash('info', 'Data Surat Keluar berhasil di ubah');
        return redirect()->route('suratkeluar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratKeluar $suratkeluar)
    {
        // $this->authorize('delete', SuratKeluar::class);
        $suratkeluar->delete();
        return redirect()->route('suratkeluar.index');
    }

    public function download(Request $request, $file){
        return response()->download(public_path('storage/dokumen/'.$file));
    }
}
