<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    protected $table = 'tujuan';
    protected $fillable = ['id','kota_tujuan', 'tempat_wisata', 'harga_tiket_masuk'];
}
