@extends('penjual.navbar')
@section('content')
<center>
    <h2 class="mt-3">Data Barang</h2>
</center>
<div class="container">
      <div class="col-md-12 mt-5">
          <div class="card">
              <div class="card-body">
                  <table class="table table-warning table-striped mt-3">
                   <thead class="text-center">
                       <tr>
                           <th>No.</th>
                           <th>Kode Barang</th>
                           <th>Nama Barang</th>
                           <th>Gambar</th>
                           <th>Jumlah Stok</th>
                           <th>Harga</th>
                           <th>Keterangan</th>
                           <th>Aksi</th>
                       </tr>    
                   </thead>
                   <tbody class="text-center">
                     @foreach ( $dataBarang as $data_barang)
                     <tr>
                         <td>{{ $loop->iteration }}</td>
                         <td>{{ $data_barang->kode_barang }}</td>
                         <td>{{ $data_barang->nama_barang }}</td>
                         <td>
                             <img src="{{ url('toko_online') }}/{{ $data_barang->gambar }}" width="50" alt="">
                         </td>
                         <td>{{ $data_barang->stok }}</td>
                         <td>{{ $data_barang->harga }}</td>
                         <td>{{ $data_barang->keterangan }}</td>
                         <td>
                             <a href="/databarang/{{ $data_barang->id }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                             <a href="/editbarang/{{ $data_barang->id }}" class="btn btn-primary">Edit Data</a>
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