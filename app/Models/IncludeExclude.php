<?php

namespace App\Models;

use App\Models\PaketWisata;
use Illuminate\Database\Eloquent\Model;

class IncludeExclude extends Model
{
    protected $fillable = ['paket_wisata_id', 'tipe', 'barang_bawaan'];

    public function paketWisata()
    {
        return $this->belongsTo(PaketWisata::class);
    }
}
