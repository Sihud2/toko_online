<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function barang()
    {
        return $this->belongsTo("App\Models\Barang",'barang_id','id');
    }

    public function pesanan()
    {
        return $this->belongsTo("App\Models\Pesanan",'pesanan_id','id');
    }

    /*
    public function getCreatedAtAttribute($date)
    {
    return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
    return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
    */
}
