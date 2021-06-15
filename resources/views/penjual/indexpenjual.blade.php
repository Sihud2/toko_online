@extends('navbar.navbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5 d-flex justify-content-center">
            <img src="{{ url('img/logo.jpeg') }}" alt="" width="200" class="rounded-circle" style="box-shadow: 5px 10px 18px rgb(136, 136, 136, .8); margin-top: 70px;">
        </div>
    </div>
</div>
    <div class="footer-1">
        <footer class="bg-dark p-3" style="margin-bottom: -30px">
            {{-- <p class="text-center text-white p-2"><i class="bi bi-bag-fill text-light"></i> <a href="" class="fw-bold" style="color: white;">BRWK.INC </a> 2021<p> --}}
                <p class="text-center text-white p-2"><img src="{{ url('img/copyright.png') }}" alt="" width="18px"> 2021 <a href="" class="fw-bold" style="color: white;">BRWK.INC</a><p>
            </footer>
    </div>

{{-- @include('sweetalert::alert') --}}
@endsection
