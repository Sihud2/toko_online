<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Transaksi;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function kirim()
    {
        return view('penjual.kirimBarang');
    }

    public function pesanMasuk()
    {
        return view('penjual.pesanBarang');
    }

    public function laporan()
    {
        return view('penjual.laporan');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penjual.tambahBarang');
    }

    public function tambahBarang(Request $request)
    {
        // kode barang otomatais 
        $kode_barang = Barang::max('kode_barang');
        $nilai_auto = (int) substr($kode_barang, 2, 2);
        $nilai_auto++; 
        $kdbr = "BR".sprintf("%02s", $nilai_auto);
        // validasi file
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $gambar = $request->gambar;
        // tujuan folder
        $folder_simpan = 'toko_online';
        $gambar->move($folder_simpan, $gambar->getClientOriginalName());
        
        // tambah barang 
        $barang = new Barang();
        $barang->kode_barang = $kdbr;
        $barang->nama_barang = $request->nama_barang;
        $barang->gambar = $gambar->getClientOriginalName();
        $barang->harga = $request->harga;
        $barang->ukuran = $request->ukuran;
        $barang->stok = $request->jumlah;
        $barang->terjual = 0;
        $barang->keterangan = $request->keterangan;
        $barang->save();

        alert()->success('Tambah Barang', 'Berhasil!');
        return redirect('tambahBarang');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
