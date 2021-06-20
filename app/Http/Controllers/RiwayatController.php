<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->get();
        $pesanan_2 = Pesanan::where('user_id', Auth::user()->id)->where('status', 2)->get();
        $pesanan_3 = Pesanan::where('user_id', Auth::user()->id)->where('status', 3)->get();
        return view('riwayat.riwayat', compact('pesanan', 'pesanan_2', 'pesanan_3'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_detail = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        return view('riwayat.detail', compact('pesanan', 'pesanan_detail'));
    }

    public function proses()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 2)->first();
        $pesanan_detail = PesananDetail::where('pesanan_id', $pesanan->id)->get(); 
        return view('riwayat.proses', compact('pesanan', 'pesanan_detail'));
    } 

    public function tujuanUser()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 2)->first();
        $pesanan_detail = PesananDetail::where('pesanan_id', $pesanan->id)->get(); 
        return view('riwayat.tiba_tujuan', compact('pesanan', 'pesanan_detail'));
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
