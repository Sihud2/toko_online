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
              <li class="breadcrumb-item active" aria-current="page">Tujuan</li>
            </ol>
          </nav>
       </div>
       <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                   <h3> Sampai Tujuan </h3> 
                   <table class="table table-warning table-striped mt-3">
                    <thead class="text-center">
                        <tr>
                            <th>Barang</th>
                            <th>Gambar</th>
                            <th>Ukuran</th>
                            <th>Jumlah</th>   
                        </tr>    
                    </thead>
                    <tbody class="text-center">
                    @foreach ($pesanan_detail as $proses)
                        <tr>
                            <td>{{ $proses->barang->nama_barang }}</td>  
                            <td>
                                <img src="{{ url('toko_online') }}/{{ $proses->barang->gambar }}" alt="" width="90">
                            </td>
                            <td>{{ $proses->ukuran }}</td>
                            <td>{{ $proses->jumlah }}</td>
                            <td>
                                <form action="" method="post" >
                                    @csrf
                                    <button class="btn btn-success">Sampai</button>
                                </form>
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
