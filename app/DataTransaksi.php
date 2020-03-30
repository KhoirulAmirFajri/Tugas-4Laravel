<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataTransaksi extends Model
{

	protected $primaryKey = 'id_transaksi';

    protected $fillable=['judul_buku', 'jumlah_buku','total_harga'];
}
