<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataBuku;

class DataBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databukus = DataBuku::latest()->get();
        return view('index', compact('databukus'));
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
        $databuku = DataBuku::create([
            'nama_buku' => $request->input('nama_buku'),
            'nama_pengarang' => $request->input('nama_pengarang'),
            'nama_penerbit' => $request->input('nama_penerbit')
           
        ]);
        return redirect(route('databukus.index'));
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
    public function edit(DataBuku $databuku)
    // ada $id
    {
        return view('edit', compact('databuku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataBuku $databuku)
    // ada $id
    {
        $dataobat = DataBuku::whereid_buku($databuku->id_buku)->update([
            'nama_buku' => $request->input('nama_buku'),
            'nama_pengarang' => $request->input('nama_pengarang'),
            'nama_penerbit' => $request->input('nama_penerbit')
            
        ]);

        return redirect(route('databukus.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_buku)
    {
        $databuku = DataBuku::find($id_buku);
        $databuku->delete();

        return redirect(route('databukus.index'));
    }
}