@extends('layouts.app')
<style>
    i:hover{
        cursor: pointer;
    }
</style>
@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-12 ml-1">
           <a href="{{ url('home') }}" class="btn btn-primary fw-bold"><i class="fa fa-arrow-left"></i> Kembali</a>
       </div>
       <div class="col-md-12 mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $barang->nama_barang }}</li>
            </ol>
          </nav>
       </div>
    <div class="col-md-12 mt-1">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ url('toko_online') }}/{{ $barang->gambar }}" class="rounded mx-auto d-block" width=100% alt="">
                    </div>
                    <div class="col-md-6 mt-5">
                        <h2 class="ml-1" style="font-family: Arial, Helvetica, sans-serif">{{ $barang->nama_barang }}</h2>
                        <table class="table">
                            <tr>
                                <td>Harga</td>
                                <td>:</td>
                                <td>Rp. {{ number_format($barang->harga) }}</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>:</td>
                                <td>{{ number_format($barang->stok) }}</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td>{{($barang->keterangan) }}</td>
                            </tr>
                            <tr>
                                <td>jumlah pesan</td>
                                <td>:</td>
                                <td>
                                    <form action="{{ url('home') }}/{{ $barang->id }}" method="post">
                                        @csrf
                                        <input type="text" name="jumlah_pesan" class="from-control">
                                        <button type="submit" class="mt-3 btn btn-primary"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>
@endsection