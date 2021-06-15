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
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Jumlah Harga</th>
                            <th>Aksi</th>
                        </tr>    
                    </thead>
                    <tbody class="text-center">
                        @foreach ($pesanan as $pesan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pesan->tanggal }}</td>  
                            <td>
                                @if($pesan->status = 1)
                                    <p style="color: red;">Belum diproses</p>
                                @elseif($pesan->status = 2)
                                    <p style="color: #0275d8;">Sedang diprosess</p>
                                @endif
                            </td>
                            <td>Rp. {{ number_format($pesan->jumlah_harga + $pesan->biaya_admin) }}</td>
                            <td>
                                <a href="{{ url('detail') }}/{{ $pesan->id }}" class="btn btn-primary" style="font-weight: bold; font-size: 14Zpx;" ><i class="fa fa-info"></i> Info Detail</a>
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
