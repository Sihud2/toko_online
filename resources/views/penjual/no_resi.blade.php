    @extends('penjual.navbar')

    @section('content')
    <h2 class="mt-5 mb-3 text-center" style="font-family: arial; ">Masukkan No Resi</h2>

    <div class="row">
      <div class="card" style="width: 80rem; margin: 0 auto;">
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            @csrf
            @foreach ( $transaksi as $muncul)
            <div class="input-group mb-3">
                {{-- <span class="input-group-text" id="inputGroup-sizing-default" style="width: 8rem;">Nomor Resi</span> --}}
                <input type="hidden" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="" required value="{{ $muncul->id }}">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="inputGroup-sizing-default" style="width: 8rem;">Nama</span>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nama" required value="{{ $muncul->user->name }}">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="inputGroup-sizing-default" style="width: 8rem;">Alamat</span>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="alamat" required value="{{ $muncul->alamat }}">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="inputGroup-sizing-default" style="width: 8rem;">Nomor Resi</span>
              <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="resi" required value="">
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-success p-2"  style="margin: 0 auto; width: 80rem; font-size: 18px; font-weight: bold;">Tambah Data</button>
            </div>
            @endforeach
          </form>
        </div>
      </div>
    </div>
@endsection