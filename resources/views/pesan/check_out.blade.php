@extends('layouts.app')
<style>
    i:hover{
        cursor: pointer;
    }
</style>
@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-12">
           <a href="{{ url('home') }}" class="btn btn-primary fw-bold mb-1"><i class="fa fa-arrow-left"></i> Kembali</a>
       </div>
       <div class="col-md-12 mt-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Check Out</li>
            </ol>
          </nav>
       </div>
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                   <h3><i class="fa fa-shopping-cart"></i>Check Out</h3>
                </div>
                <div class="card-body">
                   @if(!empty($pesanan))
                   <table class="table table-warning table-striped">
                       <thead class="">
                           <tr>
                               <th>NO</th>
                               <th>Nama Barang</th>
                               <th>Jumlah</th>
                               <th>Harga</th>
                               <th>Total Harga</th>
                               <th>Aksi</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($pesanan_details as $pesanan_detail)                               
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                <td>{{ $pesanan_detail->jumlah }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                <td>
                                    <form action="{{ url('check_out') }}/{{ $pesanan_detail->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick=" return confirm('Yakin Ingin Dihapus?');"><i class="fa fa-trash"></i></button>
                                    </form>    
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" align="right"><strong>Total Harga : </strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('konfirmasi') }}" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Check Out</a>
                                </td>
                            </tr>
                       </tbody>
                   </table>
                   @endif 
               </div>
               
           </div>
       </div>
   </div>
</div>
@endsection