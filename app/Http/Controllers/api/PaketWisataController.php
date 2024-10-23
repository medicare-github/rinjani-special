<?php
namespace App\Http\Controllers\api;

use App\Models\PaketWisata;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PaketWisataController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $search = $request->input('search');
        $paketWisataQuery = PaketWisata::with(['itineraries', 'includesExcludes', 'panoramas']);
        if ($search) {
            $paketWisataQuery->where(function ($query) use ($search) {
                $query->where('nama', 'like', "%{$search}%")
                      ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }
        $paketWisata = $paketWisataQuery->paginate(10);
        return response()->json($paketWisata, 200);
    }

    public function show($slug)
    {
        $paketWisata = PaketWisata::with(['itineraries', 'includesExcludes', 'panoramas'])
            ->where('slug', $slug)
            ->firstOrFail();
        return response()->json($paketWisata, 200);
    }

    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'nama'=>'required|max:255',
            'harga'=>'required',
            'deskripsi'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors(),
            ], 400);
        }
        $slug = Str::slug($request->input('nama'));
        $originalSlug = $slug;
        $count = 1;
        while (PaketWisata::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;

        }

        $data = [
            'slug' => $slug,
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $paketWisata = PaketWisata::insert($data);

        return response()->json([
            'message' => 'Paket wisata berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, $slug){

        $paketWisata = PaketWisata::where('slug', $slug)->first();
        if (!$paketWisata) {
            return response()->json(['message' => 'Paket wisata tidak ditemukan.'], 404);
        }

        $validator=Validator::make($request->all(),[
            'nama'=>'required|max:255',
            'harga'=>'required',
            'deskripsi'=>'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors(),
            ], 400);
        }

        $data = [
            'slug' => $slug,
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
            'updated_at' => now(),
        ];
        $paketWisata = PaketWisata::where('slug', $slug)->update($data);
        return response()->json([
            'message' => 'Paket wisata berhasil diupdate',
            'data' => $data
        ], 201);
    }

}
