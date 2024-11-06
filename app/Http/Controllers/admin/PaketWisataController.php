<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\IncludeExclude;
use App\Models\Itinerary;
use App\Models\PaketWisata;
use App\Models\Panorama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PaketWisataController extends Controller
{
    public function index()
    {
        $data = PaketWisata::with('itineraries', 'includesExcludes', 'panoramas')->get();
        return view('admin.paketWisata.index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('admin.paketWisata.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'difficulty_level' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'panorama' => 'required|array',
            'panorama.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        try {
            $thumbnailPath = $request->file('thumbnail')->store('public/thumbnails');
            $thumbnailUrl = Storage::url($thumbnailPath);
            $data = [
                'nama' => $request->nama,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'difficulty_level' => $request->difficulty_level,
                'trekking_experience' => $request->trekking_experience,
                'thumbnail' => $thumbnailUrl,
            ];
            $paketWisata = PaketWisata::create($data);
            if ($request->hasFile('panorama')) {
                foreach ($request->file('panorama') as $file) {
                    $panoramaPath = $file->store('public/panorama');
                    $panoramaUrl = Storage::url($panoramaPath);
                    Panorama::create([
                        'paket_wisata_id' => $paketWisata->id,
                        'url' => $panoramaUrl
                    ]);
                }
            }
            return response()->json([
                'success' => true,
                'message' => 'Paket Wisata dan Panorama berhasil ditambahkan!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }
    public function show(Request $request, $slug) {}


    public function itineraries($id){
        return view('admin.paketWisata.itineraries',[
            'id' => $id,
            'data' => PaketWisata::with('itineraries')->find($id)
        ]);
    }

    public function itinerariesStore(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'hari_ke' => 'required|numeric',
            'kegiatan' => 'required',
            'lokasi' => 'required',
            'deskripsi_kegiatan' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([ 
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        $data = [
            'paket_wisata_id' => $id,
            'hari_ke' => $request->hari_ke,
            'kegiatan' => $request->kegiatan,
            'lokasi' => $request->lokasi,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan
        ];
        $paketWisata = PaketWisata::find($id);
        $paketWisata->itineraries()->create($data);
        return response()->json([
            'success' => true,
            'message' => 'Itinerary ditambahkan!'
        ]);
    }
    public function editItinerary($id)
    {
        $itinerary = Itinerary::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $itinerary
        ]);
    }

    public function updateItinerary(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'hari_ke' => 'required|integer',
            'kegiatan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi_kegiatan' => 'required|string'
        ]);

        // Jika validasi gagal, kembalikan pesan kesalahan
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        $itinerary = Itinerary::findOrFail($id);
        $itinerary->hari_ke = $request->hari_ke;
        $itinerary->kegiatan = $request->kegiatan;
        $itinerary->lokasi = $request->lokasi;
        $itinerary->deskripsi_kegiatan = $request->deskripsi_kegiatan;
        $itinerary->save();
        return response()->json([
            'success' => true,
            'message' => 'Data itinerary berhasil diperbarui.'
        ]);
    }

    public function itinerariesDestroy($id){
       $itinerary = Itinerary::find($id);
       if ($itinerary) {
           $itinerary->delete();
           return response()->json([
               'success' => true,
               'message' => 'Itinerary deleted successfully',
           ]);
       }
       return response()->json([
           'success' => false,
           'message' => 'Itinerary not found',
       ]);
    }

    //Includes Excludes
    public function includesOrExcludes($id){
        return view('admin.paketWisata.in_ex',[
            'id'=>$id,
            'data' => PaketWisata::with('includesExcludes')->find($id)
        ]);
    }
    public function storeIncludesOrExcludes(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'tipe' => 'required',
            'barang_bawaan'=> 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([ 
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        $data = [
            'paket_wisata_id' => $id,
            'barang_bawaan' => $request->barang_bawaan,
            'tipe' => $request->tipe,
        ];
        IncludeExclude::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Includes and Excludes ditambahkan!'        
        ]);
    }
    public function includesOrExcludesDestroy($id){
        $includeExclude = IncludeExclude::find($id);
        if ($includeExclude) {
            $includeExclude->delete();
            return response()->json([
                'success' => true,
                'message' => 'Includes and Excludes deleted successfully',
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Includes and Excludes not found',
        ]);
    }
    public function editIncludesOrExcludes($id){
        $data = IncludeExclude::findOrFail($id);
        return response()->json($data);
    }
    public function updateIncludesOrExcludes(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tipe' => 'required',
            'barang_bawaan'=> 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([ 
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        $data = IncludeExclude::findOrFail($id);
        $data->update([
            'barang_bawaan' => $request->barang_bawaan,
            'tipe' => $request->tipe,
        ]);
        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }
    public function destroy($id)
    {
        $paketWisata = PaketWisata::findOrFail($id);
        if ($paketWisata) {
            PaketWisata::destroy($id);
            return response()->json([
                'success' => true,
                'message' => 'Paket wisata deleted successfully',
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Paket wisata not found',
        ]);
    }
}
