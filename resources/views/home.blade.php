@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5 d-flex justify-content-center">
            <img src="{{ url('img/logo.jpeg') }}" alt="" width="200" class="rounded-circle" style="box-shadow: 5px 10px 18px rgb(136, 136, 136, .8) ;">
        </div>
        @foreach ($barangs as $barang )
            <div class="col-md-4   mb-3">
                <div class="card">
                    <img src="{{ url('toko_online') }}/{{ $barang->gambar }}" class="card-img-top" alt="..." width="200">
                    <div class="card-body">
                      <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                      <p class="card-text">
                          <strong>Harga :</strong> Rp.{{ number_format($barang->harga) }} <br>
                          <strong>Stok :</strong> {{ $barang->stok }} <br>
                          <hr>
                          <strong>Terjual : </strong> {{ $barang->terjual }}
                          {{-- @php
                            //   $kode = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                            //   echo substr(str_shuffle($kode),0,8);
                            $random = mt_rand(1000, 9999);
                            echo $random;
                          @endphp --}}
                      </p>
                      <a href="/home/{{ $barang->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Pesan</a>
                    </div>
                  </div>
            </div>
        @endforeach
    </div>
</div>

<div class="footer-1">
    <footer class="bg-dark p-1" style="margin-bottom: -30px">
        {{-- <p class="text-center text-white"><i class="bi bi-bag-fill text-light"></i> <a href="" class="fw-bold" style="color: white;">BRWK.INC </a> 2021<p> --}}
            <p class="text-center text-white p-2" style="margin-top: 6px;"><img src="{{ url('img/copyright.png') }}" alt="" width="18px"> 2021 <a href="" class="fw-bold" style="color: white;;">BRWK.INC</a><p>
        </footer>
</div>

{{-- @include('sweetalert::alert') --}}
@endsection