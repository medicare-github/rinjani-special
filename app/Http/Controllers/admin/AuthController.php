<?php

namespace App\Http\Controllers\Admin;

use Log;
use Exception;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function auth(){
        return view('admin.authentication.auth');
    }

    public function users(){
        $users = User::all();
        return view('admin.authentication.user', [
            'users' => $users,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'is_admin' => 'required',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make('Password@123'),
            'is_admin' => $request->input('is_admin'),
        ]);
        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        }
        return response()->json(['success' => false, 'message' => 'User not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->is_admin = $request->input('is_admin');
            $user->save();

            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'User not found'], 404);
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            'success' => 'User deleted successfully',
            'datda'=>$user
        ]);
    }

    public function authentication(Request $request){
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('mstr/dashboard');
        }

        return back()->with('loginError', 'Email atau Password yang anda masukan salah');
    }


    public function authLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/mstr')->with('logout', 'Succes Logout');
    }

    public function authChange(Request $request, $id){
        $rules = [
            'email' => 'required|email',
            'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ];

        $currentUser = Auth::user();
        $validatedData = $request->validate($rules);
        if (password_verify($request->input('oldPassword'), $currentUser->password)) {
            $validatedData['password'] = Hash::make($request->input('password'));
            User::where('id', $id)->update($validatedData);
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/mstr/auth')->with('changePassword', 'Email atau Password berhasil diperbarui');
        } else {
            return back()->with('incorrect', 'Password saat ini tidak benar');
        }
    }
}
