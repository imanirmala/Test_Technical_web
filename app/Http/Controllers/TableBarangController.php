<?php

namespace App\Http\Controllers;
use DB;
use App\TableBarang;
use Illuminate\Http\Request;

class TableBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('table_barangs')
        ->select('table_barangs.id_barang','table_barangs.nama_barang','table_barangs.stok','jenis_barangs.nama_jenis')
        ->join('jenis_barangs','jenis_barangs.id_jenis','table_barangs.id_jenis')
        ->get();
        return view('barang.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
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
        DB::table('table_barangs')->insert([
            'id_jenis'=> $request->id_jenis,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok
        ]);
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TableBarang  $tableBarang
     * @return \Illuminate\Http\Response
     */
    public function show(TableBarang $tableBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TableBarang  $tableBarang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataJenis = DB::table('jenis_barangs')->get();
        $dataBarang = DB::table('table_barangs')->where('id_barang',$id)->first();
        return view('barang.edit',compact('dataJenis','dataBarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TableBarang  $tableBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('table_barangs')->where('id_barang',$id)->update([
            'id_jenis'=> $request->id_jenis,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok
        ]);
        return redirect()->route('barang.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TableBarang  $tableBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('table_barangs')->where('id_barang',$id)->delete();
        return redirect()->route('barang.index');
    }
}
