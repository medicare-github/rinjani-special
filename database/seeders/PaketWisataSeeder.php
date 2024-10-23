<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaketWisata;

class PaketWisataSeeder extends Seeder
{
    public function run()
    {
        $paket = PaketWisata::create([
            'nama' => 'Paket Liburan Bali',
            'slug'=>'paket-liburan-bali',
            'harga' => 1500000,
            'deskripsi' => 'Nikmati liburan ke Bali dengan berbagai destinasi menarik.',
        ]);

        $paket->itineraries()->createMany([
            ['hari_ke' => 1, 'kegiatan' => 'Kunjungan ke pantai Kuta','lokasi'=>'Pantai Kuta', 'deskripsi_kegiatan' => 'Kunjungan ke pantai Kuta'],
            ['hari_ke' => 2, 'kegiatan' => 'Tour ke Ubud dan Tegalalang','lokasi'=>'Ubud', 'deskripsi_kegiatan' => 'Tour ke Ubud dan Tegalalang'],
        ]);

        $paket->includesExcludes()->createMany([
            ['tipe' => 'include', 'barang_bawaan' => 'Penginapan',],
            ['tipe' => 'exclude', 'barang_bawaan' => 'Tiket pesawat'],
        ]);

        $paket->panoramas()->createMany([
            ['url' => 'url_to_panorama_1.jpg'],
            ['url' => 'url_to_panorama_2.png'],
        ]);
    }
}
