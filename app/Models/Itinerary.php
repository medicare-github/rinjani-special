<?php

namespace App\Models;

use App\Models\PaketWisata;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{

    protected $fillable = ['paket_wisata_id', 'hari_ke', 'kegiatan', 'lokasi', 'deskripsi_kegiatan'];

    public function paketWisata()
    {
        return $this->belongsTo(PaketWisata::class);
    }
}
