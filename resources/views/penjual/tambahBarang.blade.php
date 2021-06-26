    @extends('penjual.navbar')

    @section('content')
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
@endsection