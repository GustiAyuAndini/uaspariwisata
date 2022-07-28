<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pariwisata extends Model
{
    protected $table = 'pariwisata';
    protected $fillable = ['id','nama_pengunjung', 'kota_tujuan', 
                           'perusahaan_transportasi', 'harga_tiket_transportasi' , 'pengunjung_id',
                           'tujuan_id', 'transportasi_id'];

    public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'pengunjung_id');
    }
    
    public function tujuan()
    {
        return $this->belongsTo(Tujuan::class, 'tujuan_id');
    }

    public function transportasi()
    {
        return $this->belongsTo(Transportasi::class, 'transportasi_id');
    }
}
