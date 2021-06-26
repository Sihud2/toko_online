@extends('penjual.navbar')
@section('content')
<center>
    <h2 class="mt-3">Pesanan Masuk</h2>
</center>
<div class="container">
      <div class="col-md-12 mt-5">
          <div class="card">
              <div class="card-body">
                  <table class="table table-warning table-striped mt-3">
                   <thead class="text-center">
                       <tr>
                           <th>Pelanggan</th>
                           <th>Pesan Barang</th>
                           <th>Ukuran</th>
                           <th>Jumlah Barang</th>
                           <th>Alamat</th>
                       </tr>    
                   </thead>
                   <tbody class="text-center">
                     @foreach ( $transaksi as $pesan_masuk)
                     <tr>
                       <td>{{ $pesan_masuk->user['name']}}</td>
                       <td>{{ $pesan_masuk->barang['nama_barang'] }}</td>
                       <td>{{ $pesan_masuk->ukuran}}</td>
                       <td>{{ $pesan_masuk->jumlah_barang }}</td>
                       <td>{{ $pesan_masuk->user['alamat'] }}</td>
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