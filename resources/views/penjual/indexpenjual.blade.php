<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Halaman Admin</title>
  </head>
  <style>
    body{
      width: 100vh;
      background:   linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.7)),url('img/background.jpg');
      background-position: center;
      background-size: cover;
      /* height: 100vh; */
    }
  </style>
  <body>

    {{-- <div class="container" style="display: block; margin: 10% auto; margin-left: 20%;"> --}}
    <div class="container" style="display: block; margin-top: 30%; margin-bottom: 30%; margin-left: 40%;">
        <div class="col-md-8 mt-1" style="justify-content: space-between;">
            <div class="card" style="width: 200%;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('img/logo.jpeg') }}" alt="" width="210" class="rounded-circle mt-1" style="border: 3px #ccc; margin-left: 16px; box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        </div>
                        <div class="col-md-5 " style="margin-left: 15%;">
                            <table class="table">
                                <thead>
                                  <tr>
                                        <th><a href="/tambahBarang" style="text-decoration: none">Tambah Barang</a></th> 
                                  </tr>
                                </thead>
                                <thead style="text-align: right">
                                  <tr>
                                        <th><a href="kirimBarang" style="text-decoration: none">Pengiriman</a></th>
                                  </tr>
                                </thead>
                                <thead>
                                  <tr>
                                        <th><a href="/pesanBarang" style="text-decoration: none">Pesanan Barang</a></th>
                                  </tr>
                                </thead>
                                <thead style="text-align: right">
                                  <tr>
                                        <th><a href="/laporan" style="text-decoration: none">Laporan</a></th>
                                  </tr>
                                </thead>
                                <thead>
                                  <tr>
                                        <th><a href="{{ route('login') }}" style="text-decoration: none"  onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">Logout</a>
                                        </th>
                                  </tr>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                  </form>
                                </thead>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>