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
           <a href="{{ url('home') }}" class="btn btn-primary fw-bold "><i class="fa fa-arrow-left"></i> Kembali</a>
       </div>
       <div class="col-md-12 mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
            </ol>
          </nav>
       </div>
       <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                   <h3><i class="fa fa-history"></i> Riwayat Pemesanan</h3> 
                   <table class="table table-warning table-striped mt-3">
                    <thead class="text-center">
                        <tr>
                            {{-- <th>No</th> --}}
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Jumlah Harga</th>
                            <th>Aksi</th>
                        </tr>    
                    </thead>
                    <tbody class="text-center">
                    @foreach ($pesanan as $pesan)
                        <tr>
                            {{-- <td>{{ $loop->iteration }}</td> --}}
                            <td>{{ $pesan->tanggal }}</td>  
                            <td>
                                <p style="color: red;">Belum dibayar</p>
                            </td>
                            <td>Rp. {{ number_format($pesan->jumlah_harga + $pesan->biaya_admin) }}</td>
                            <td>
                                <a href="{{ url('/riwayat') }}/{{ $pesan->id }}" class="btn btn-primary" style="font-weight: bold; font-size: 14Zpx;" ><i class="fa fa-info"></i> Info Detail</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tbody class="text-center">
                        @foreach ($pesanan_2 as $pesan)
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ $pesan->tanggal }}</td>  
                                <td>
                                    <p style="color: blue;">Sudah dibayar</p>
                                </td>
                                <td>Rp. {{ number_format($pesan->jumlah_harga + $pesan->biaya_admin) }}</td>
                                <td>
                                    <a href="{{ url('/riwayat') }}/{{ $pesan->id }}" class="btn btn-primary" style="font-weight: bold; font-size: 14Zpx;" ><i class="fa fa-info"></i> Info Detail</a>
                                </td>
                            </tr>
                        @endforeach
                   </table>
               </div>
           </div>
        </div>
   </div>
</div>
<div class="container mt-3">
    <div class="row text-center">
        <div class="col">
            <h2>Status Pengiriman Paket</h2>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <center>
                        <img src="{{ asset('img/diproses.png') }}" alt="" width="50">
                    </center>
                  <a href="/proses" class="btn btn-primary mt-3">Diproses</a>
                </div>
              </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <center>
                        <img src="{{ asset('img/mobil2.png') }}" alt="" width="50">
                    </center>
                 <a href="/kirim_barang" class="btn btn-primary mt-3">Dikirim</a>
                </div>
              </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                <center>
                    <img src="{{ asset('img/titik_GPS.png') }}" alt="" width="50">
                </center>
                    <a href="/tiba_tujuan" class="btn btn-primary mt-3">Tiba di Tujuan</a>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
