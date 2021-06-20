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
              <li class="breadcrumb-item"><a href="{{ url('riwayat') }}">Riwayat</a></li>
              <li class="breadcrumb-item active" aria-current="page">Proses</li>
            </ol>
          </nav>
       </div>
       <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                   {{-- <h3><i class="fa fa-history"></i> Status Proses </h3>  --}}
                   <h3> Status Proses </h3> 
                   <table class="table table-warning table-striped mt-3">
                    <thead class="text-center">
                        <tr>
                            <th>Barang</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Jumlah Harga</th>    
                        </tr>    
                    </thead>
                    <tbody class="text-center">
                    @foreach ($pesanan_detail as $proses)
                        <tr>
                            <td>{{ $proses->barang->nama_barang }}</td>  
                            <td>{{ $proses->pesanan->tanggal }}</td>
                            <td>
                                @if($proses->pesanan->status_pengiriman = " ")
                                    <p class="text-danger">Belum diProses</p>
                                @elseif($proses->pesanan->status_pengiriman = "1")
                                    <p class="text-success">Sedang diProses</p>
                                @else
                                    <p class="text-success">Sedang diKemas</p>
                                @endif
                            </td>
                            <td>Rp. {{ number_format($proses->pesanan->jumlah_harga + $proses->pesanan->biaya_admin) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                   </table>
               </div>
           </div>
        </div>
   </div>
</div>
@endsection
