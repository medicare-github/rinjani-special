<?php

namespace App\Models;

use App\Models\Panorama;
use App\Models\Itinerary;
use Illuminate\Support\Str;
use App\Models\IncludeExclude;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    protected $fillable = ['nama', 'harga', 'deskripsi', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($paket) {
            $paket->slug = Str::slug($paket->nama);
        });

    }
    public function itineraries()
    {
        return $this->hasMany(Itinerary::class);
    }

    public function includesExcludes()
    {
        return $this->hasMany(IncludeExclude::class);
    }

    public function panoramas()
    {
        return $this->hasMany(Panorama::class);
    }
}
