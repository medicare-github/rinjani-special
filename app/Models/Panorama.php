<?php

namespace App\Models;

use App\Models\PaketWisata;
use Illuminate\Database\Eloquent\Model;

class Panorama extends Model
{
    protected $fillable = ['paket_wisata_id', 'url'];

    public function paketWisata()
    {
        return $this->belongsTo(PaketWisata::class);
    }
}
