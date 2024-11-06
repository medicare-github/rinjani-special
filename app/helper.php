<?php

use App\Models\PaketWisata;
use Illuminate\Support\Str;

function limitDescription($text, $length)
{
    return Str::limit($text, $length, '...');
}

function toRupiah($price){
    return 'Rp '.number_format($price);
}

function paket_wisatas(){
    return PaketWisata::select('nama','slug')->get();
}