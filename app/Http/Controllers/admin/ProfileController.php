<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        $profile=Profile::first();
        $data =null;
        if ($profile){
            $data=$profile;
        }
        return view('admin.profile.index',[
            'data'=>$data
        ]);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required',
            'wa' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data=[
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'wa'=>$request->wa,
            'ig'=>$request->ig,
            'fb'=>$request->fb,
            'ta'=>$request->ta,
            'tentang'=>$request->tentang,
        ];
        if ($request->hasFile('logo')) {
            $filePath = $request->file('logo')->store('public/profile');
            $fileName = str_replace('public/', '', $filePath);
            $data['logo'] = $fileName;
        }
        $profile=Profile::first();
        if (!$profile){
            Profile::insert($data);
            return response()->json([
                'success' => true,
                'message' => 'Profile Berhasil di Tambah!',
            ], 200);
        }
        Profile::where('id', $profile->id)->update($data);
        return response()->json([
            'success' => true,
            'message' => 'Profile Berhasil di Update!',
        ], 200);
    }
}
