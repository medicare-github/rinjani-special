<?php

namespace App\Http\Controllers\api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VerificationCode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function sendVerificationCode(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password'=>'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
            ], 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'Email tidak terdaftar.'], 404);
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Email atau password salah.'], 401);
        }

        $verificationCode = rand(100000, 999999);



        VerificationCode::updateOrCreate([
            'email' => $request->email,
            'code' => $verificationCode,
        ]);

        Mail::send('emails.verification-code', ['code' => $verificationCode], function ($message) use ($request) {
            $message->to($request->email)
            ->subject('Kode Verifikasi');
        });

        return response()->json(['message' => 'Kode verifikasi telah dikirim ke email Anda.'], 200);
    }


    public function verifyCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'code' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ]);
        }

        $verification = VerificationCode::where('email', $request->email)
                        ->where('code', $request->code)
                        ->first();

        if (!$verification) {
            return response()->json(['message' => 'Kode verifikasi tidak ditemukan atau salah.'], 400);
        }


        $codeCreatedAt = Carbon::parse($verification->created_at);

        if ($codeCreatedAt->addMinutes(5)->isPast()) {
            $verification->delete();
            return response()->json(['message' => 'Kode verifikasi telah kadaluwarsa.'], 400);
        }

        $user = User::where('email', $request->email)->first();

        if($user->is_admin){
            $token = $user->createToken('auth_token')->plainTextToken;
        }
        else{
            $token = $user->createToken('auth_token', ['*'], now()->addDays(7))->plainTextToken;
        }

        $verification->delete();

        return response()->json([
            'token' => $token,
            'user' => $user
        ], 200);
    }

}
