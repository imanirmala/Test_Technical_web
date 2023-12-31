<?php

namespace App\Http\Controllers;
use DB;
use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('barangs')
        ->select('barangs.id_barang','barangs.nama_barang','jenis_barangs.nama_jenis')
        ->join('jenis_barangs','jenis_barangs.id_jenis','barangs.id_jenis')
        ->get();
        return view('barang.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *p
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataJenis = DB::table('jenis_barangs')->get();
        return view('barang.create',compact('dataJenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('barangs')->insert([
            'id_jenis'=> $request->id_jenis,
            'nama_barang' => $request->nama_barang
        ]);
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataJenis = DB::table('jenis_barangs')->get();
        $dataBarang = DB::table('barangs')->where('id_barang',$id)->first();
        return view('barang.edit',compact('dataJenis','dataBarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('barangs')->where('id_barang',$id)->update([
            'id_jenis'=> $request->id_jenis,
            'nama_barang' => $request->nama_barang
        ]);
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('barangs')->where('id_barang',$id)->delete();
        return redirect()->route('barang.index');
    }
}
