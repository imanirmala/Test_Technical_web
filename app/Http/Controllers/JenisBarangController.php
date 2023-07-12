<?php

namespace App\Http\Controllers;
use DB;
use App\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('jenis_barangs')->get();
        return view('jenis.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('jenis_barangs')->insert([
            'nama_jenis' => $request->nama_jenis
        ]);

        return redirect()->route('jenis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function show(JenisBarang $jenisBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editJenis = DB::table('jenis_barangs')->where('id_jenis',$id)->first();
        return view('jenis.edit', compact('editJenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('jenis_barangs')->where('id_jenis',$id)->update([
            'nama_jenis' => $request->nama_jenis
        ]);

        return redirect()->route('jenis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisBarang  $jenisBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('jenis_barangs')->where('id_jenis',$id)->delete();
        return redirect()->route('jenis.index');
    }
}
