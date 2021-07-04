@extends('penjual.navbar')
@section('content')
<center>
  <h1 class="mt-5">Halaman Laporan</h1>
</center>
<div class="container" style="margin-left: 33rem;">
  <div class="col-md-4 m-2">
    <div class="card bg-secondary text-white" style="padding-left: 5rem;">
        <div class="card-body">
          <label for="bulan">Pilih Bulan</label>
          <form action="/laporan/bulan" method="get">
            <select name="bulan" id="bulan" style="width:10rem">
              <option value="">-</option>
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="12">November</option>
              <option value="12">Desember</option>
              </select>
              <button class="btn btn-primary">Pilih Data</button>
          </form>
        </div>
    </div>
  </div>
</div>
<div class="container" style="width: 50rem;">
  <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Jumlah</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($data as $data_s)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $data_s->tanggal }}</td>
          <td>{{ $data_s->jumlah_harga }}</td>
        </tr>
      @endforeach
      <tr>
        <th colspan="2" align="center">Total Pendapatan</th>
        <th>{{ $total }}</th>
      </tr>
      </tbody>
    </table>

@endsection