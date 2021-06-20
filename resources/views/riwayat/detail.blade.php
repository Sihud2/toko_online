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
              <li class="breadcrumb-item"><a href="{{ url('riwayat') }}">Riwayat</a></li>
              <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
            </ol>
          </nav>
       </div>
       <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                   {{-- <h3><i class="fa fa-history"></i> Riwayat Pemesanan</h3>  --}}
                   <img src="{{ asset('img/logo_bri.png') }}" alt="" width="80">
                   <p style="margin-top: 10px; font-size: 18px; font-weight: bold;">Lakukan Transfer ke No.Rek 123-8123-123-12 Atas Nama : BRWK.INC</p>
                   <table class="table table-warning table-striped mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Ukuran</th>
                            <th>jumlah Barang</th>
                            <th>Jumlah Harga</th>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach ($pesanan_detail as $pesanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pesanan->barang->nama_barang }}</td>
                            <td>{{ $pesanan->ukuran }}</td>
                            <td>{{ $pesanan->jumlah }}</td>
                            <td>{{ $pesanan->jumlah_harga }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">
                                Total :
                            </td>
                            <td>
                                {{ $pesanan->jumlah_harga }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">
                                Biaya admin :
                            </td>
                            <td>
                                {{ $pesanan->pesanan->biaya_admin }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">
                                Total Bayar :
                            </td>
                            <td>
                                {{ $pesanan->jumlah_harga + $pesanan->pesanan->biaya_admin }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   </table>
                   <p class="font-weight-bold">Upload Bukti Transfer</p>
                   {{-- <form action="{{ url('/riwayat') }}/{{ $pesanan->id }}" method="post" enctype="multipart/form-data"> --}}
                   <form action="" method="post" enctype="multipart/form-data">
                    @csrf   
                    <input type="file" name="bukti_transaksi"><br>
                    <button type="submit" class="btn btn-primary mt-2">Upload</button>
                   </form>
                   {{-- @endforeach --}}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection