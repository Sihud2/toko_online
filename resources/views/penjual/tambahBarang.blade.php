<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Tambah Barang</title>
  </head>
  <body>
    
    <nav class="navbar navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('img/BRWK.INC.jpg') }}" alt="" width="100">
        </a>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active btn btn-danger text-white p-1" aria-current="page" href="{{ route('home') }}"><i class="fa fa-arrow-left text-white"></i> Kembali </a>
          </li>
      </div>
    </nav>

    <h2 class="mt-5 mb-3 text-center" style="font-family: arial; ">Tambah Barang</h2>

    <div class="row">
      <div class="card" style="width: 80rem; margin: 0 auto;">
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
              <span class="input-group-text" id="inputGroup-sizing-default" style="width: 8rem;">Nama Barang</span>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nama_barang" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="inputGroup-sizing-default" style="width: 8rem;">Ukuran</span>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="ukuran"  required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="inputGroup-sizing-default" style="width: 8rem;">Jumlah</span>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jumlah"  required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="inputGroup-sizing-default" style="width: 8rem;">Harga Barang</span>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="harga"  required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="inputGroup-sizing-default" style="width: 8rem;">Keterangan</span>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="keterangan"  required>
            </div>
            <div class="input-group mb-3">
              {{-- <span class="input-group-text" id="inputGroup-sizing-default">File Gambar</span> --}}
              <input type="file" enctype="multipart/form-data"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="gambar">
            </div>
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-success p-2"  style="margin: 0 auto; width: 80rem; font-size: 18px; font-weight: bold;">Tambah Data</button>
            </div>
          </form>
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
    @include('sweetalert::alert')
  </body>
</html>