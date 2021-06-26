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
              <li class="breadcrumb-item active" aria-current="page">Posisi Barang</li>
            </ol>
          </nav>
       </div>
       <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                   masih salah
               </div>
           </div>
       </div>
   </div>
</div>
@endsection