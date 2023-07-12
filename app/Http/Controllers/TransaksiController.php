<?php

namespace App\Http\Controllers;
use DB;
use App\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('transaksis')
        ->select('transaksis.id_transaksi','transaksis.created_at','transaksis.jmlh_jual','table_barangs.nama_barang','table_barangs.stok','jenis_barangs.nama_jenis')
        ->join('table_barangs','table_barangs.id_barang','transaksis.id_barang')
        ->join('jenis_barangs','jenis_barangs.id_jenis','table_barangs.id_jenis')
        ->get();
        return view('transaksi.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataBarang = DB::table('table_barangs')->get();
        return view('transaksi.create',compact('dataBarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('transaksis')->insert([
            'id_barang'=> $request->id_barang,
            'jmlh_jual' => $request->jmlh_jual
        ]);
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataBarang = DB::table('table_barangs')->get();
        $dataTransaksi = DB::table('transaksis')->where('id_transaksi',$id)->first();
        return view('transaksi.edit',compact('dataBarang','dataTransaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('transaksis')->where('id_transaksi',$id)->update([
            'id_barang'=> $request->id_barang,
            'jmlh_jual' => $request->jmlh_jual
        ]);
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('transaksis')->where('id_transaksi',$id)->delete();
        return redirect()->route('transaksi.index');
    }
}
