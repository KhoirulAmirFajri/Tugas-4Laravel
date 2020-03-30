<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTransaksi;

class DataTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatransaksis = DataTransaksi::latest()->get();
        return view('index', compact('datatransaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datatransaksi = DataTransaksi::create([
            'judul_buku' => $request->input('judul_buku'),
            'jumlah_buku' => $request->input('jumlah_buku'),
            'total_harga' => $request->input('total_harga')
           
        ]);
        return redirect(route('datatransaksis.index'));
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
    public function edit(DataTransaksi $datatransaksi)
    // ada $id
    {
        return view('edit', compact('datatransaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataTransaksi $datatransaksi)
    // ada $id
    {
        $datatransaksi = DataTransaksi::whereid_transaksi($datatransaksi->id_transaksi)->update([
            'judul_buku' => $request->input('judul_buku'),
            'jumlah_buku' => $request->input('jumlah_buku'),
            'total_harga' => $request->input('total_harga')
            
        ]);

        return redirect(route('datatransaksis.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_transaksi)
    {
        $datatransaksi = DataTransaksi::find($id_transaksi);
        $datatransaksi->delete();

        return redirect(route('datatransaksis.index'));
    }
}