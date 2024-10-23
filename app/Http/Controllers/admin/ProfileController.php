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
            $data['logo'] = $request->file('logo')->store('profile');
        }
        $profile=Profile::first();
        if (!$profile){
            Profile::insert($data);
            return response()->json([
                'success' => true,
            ], 200);
        }
        $profile->update($data);
        return response()->json([
            'success' => true,
        ], 200);
    }
}
