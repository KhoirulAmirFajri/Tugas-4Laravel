<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataBuku extends Model
{

	protected $primaryKey = 'id_buku';

    protected $fillable=['nama_buku', 'nama_pengarang','nama_penerbit'];
}
