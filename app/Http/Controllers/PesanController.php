<?php
namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Barang $barang)
    {
        return view('pesan.index', compact('barang'));
    }

    public function pesan(Request $request, $id)
    {
        $barang = Barang::where('id', $id)->first();
        $tanggal = Carbon::now(); //fungsi manipulasi waktu atau hari
        
        // validasi pesan lebih stok
        $jumlahPesanan = $request->jumlah_pesan;
        if($jumlahPesanan > $barang->stok)
        {
            return redirect('home/'.$id);
        }

        // cek pesan jika sudah ada
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        // simpan ke tabel pesanan
        if(empty($cek_pesanan))
        {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->status_pengiriman = "";
            $pesanan->no_resi = "";
            $pesanan->biaya_admin = 1000;
            $pesanan->save();
        }

        // Pesanan sesuai data id user
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        // cek pesanan detail sudah ada 
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();       
        // cek pesanan detail jika belum ada
        if(empty($cek_pesanan_detail))
        {
            $pesanan_detail = new PesananDetail();
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->ukuran = $request->ukuran;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        }else{
            $pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;
           
            // harga sekarang
            $harga_pesanan_detail_baru = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }    
        
        // jumlah harga/total
        $pesanan =  Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $barang->harga * $request->jumlah_pesan;  
        $pesanan->update();
        
        alert()->success('Pesanan Masuk Keranjang', 'Berhasil!');
        return redirect('check_out');
    }

    public function check()
    {
        // $barang = Barang::where('id', $id);
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
        }else{
            alert()->success('Chcek Out', 'Berhasil!');
            return view('pesan.check_out', compact('pesanan'));
        }
        
    }

    public function hapus($id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();
        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga -= $pesanan_detail->jumlah_harga;
        $pesanan->update();
        alert()->success('Pesanan Masuk Keranjang', 'Berhasil!');
        $pesanan_detail->delete(); // di table detailpesanan
        $pesanan->delete(); // di table pesanan

        alert()->success('Berhasil!', 'Pesanan Dihapus');
        return redirect('check_out');
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if(empty($user->alamat) && empty($user->nohp))
        {
            alert()->error('Erorr!', 'Mohon Lengkapi Data Anda');
            return redirect('profil');
        }
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan->update();
        return redirect('check_out');
    }

    public function transaksi(Request $request, $id)
    {
        // $barang = Barang::where('id', $id)->first();
        $pesanan_detail = DB::table('pesanan_details')->select('barang_id', 'pesanan_id', 'jumlah', 'ukuran')->first();
        // $pesanan_detail = DB::table('pesanan_details')->select('pesanan_id')->first();
        $transaksi = new Transaksi();
        $pesanan_user = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->first();

        // berdasarkan form input
        $this->validate($request, [ 
			'bukti_transaksi' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);

        // upload file dari input
        $gambar = $request->bukti_transaksi;
        // nama folder tujuan
        $folder_simpan = 'bukti_transfer';
		$gambar->move($folder_simpan,$gambar->getClientOriginalName());
  
        $transaksi->user_id = Auth::user()->id;
        $transaksi->barang_id = $pesanan_detail->barang_id;
        $transaksi->pesanan_id = $pesanan_detail->pesanan_id;
        $transaksi->ukuran = $pesanan_detail->ukuran;
        $transaksi->jumlah_barang = $pesanan_detail->jumlah;
        $transaksi->bukti_transaksi = $gambar->getClientOriginalName();
        $transaksi->alamat = Auth::user()->alamat;
        $transaksi->status_pengiriman = "";
        $transaksi->no_resi = "";
        $transaksi->created_at = date('Y-m-d H:i:s');
        $transaksi->updated_at = date('Y-m-d H:i:s');
        $transaksi->save();

        // status jumlah stok barang ketika sudah dibeli
        $barang_stok = Barang::where('id', $pesanan_detail->barang_id)->first();
        $barang_stok->stok -= $pesanan_detail->jumlah; 
        $barang_stok->terjual += $pesanan_detail->jumlah;
        $barang_stok->update();   

        // status ketika sudah kirim bukti pembayaran
        $pesanan_status = Pesanan::where('user_id', Auth::user()->id)->where('status', 1)->first();
        $pesanan_status->status = 2; // status user membayar
        $pesanan_status->status_pengiriman = "";
        $pesanan_status->update();

        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_detail = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        
        alert()->success('Upload', 'Berhasil!');
        return view('riwayat.detail', compact('pesanan','pesanan_detail'));
    }

    public function statusperjalanan()
    {
        $transaksi = Transaksi::get();
        return view('riwayat.kirim_barang');
    }

}
