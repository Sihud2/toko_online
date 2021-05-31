<?php
namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\User;
use Carbon\Carbon;
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
            $pesanan->biaya_admin = mt_rand(1000, 9999);
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
        $pesanan_detail->delete();

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
}
