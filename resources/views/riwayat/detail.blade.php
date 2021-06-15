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
              <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
            </ol>
          </nav>
       </div>
       <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                   <h3><i class="fa fa-history"></i> Riwayat Pemesanan</h3> 
                   <table class="table table-warning table-striped mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Jumlah Harga</th>
                            <th>Aksi</th>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach ($pesanan_detail as $pesanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pesanan->tanggal }}</td>  
                            <td>
                                @if($pesanan->status = 1)
                                    <p style="color: red;">Belum Bayar</p>
                                @elseif($pesanan->status = 2)
                                    <p style="color: #0275d8;">Sudah Bayar</p>
                                @endif
                            </td>
                            <td>Rp. {{ number_format($pesanan->jumlah_harga + $pesanan->biaya_admin) }}</td>
                            <td>
                                <a href="{{ urk('detail') }}/{{ $pesanan->id }}" class="btn btn-primary">Rincian</a>
                            </td>
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