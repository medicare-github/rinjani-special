<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Subcriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $apiKey ='2Nj7usxvj654FIwi4LjZRKL2y8kXjP0d6apd1JaRedDsBdcscSfAge65gEzz';
        $baseUrl ='http://localhost:8000';
        $apiPath = '/api/layanan'; 
        $url = $baseUrl . $apiPath;

        $response = Http::withHeaders([
            'api-key' => $apiKey, 
        ])->timeout(60)->get($url);

        $data = $response->json(); 
        dd($data);

        $title = "Rinjani Trekking Special - Guided Hiking Service on Mount Rinjani";
        $description = "Rinjani Trekking Special, we specialize in providing multi-day hiking experiences to Rinjani Mountain and the volcano, one of the most beautiful and challenging treks in Indonesia. Our team of skilled and over 10 years of experienced local guides and porters from Seranu village will ensure that your trip is safe and enjoyable. We cater to all levels of hikers, from beginner to intermediate trekkers, and have a range of packages to suit your needs. We pride ourselves on providing hi-end adventures, so get in touch to start planning your expedition!";
        $keywords = "Rinjani, Rinjani Special, hiking, guided tour, Mount Rinjani, trekking, Lombok";
        $image = asset('guest/images/logo.webp');
        $profile = Profile::first();
        return view('guest.pages.home', compact('title', 'description', 'keywords', 'image', 'profile'));
    }

    public function subscribe(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
           return back()->withErrors($validator)->withInput();
        }

        $data = [
            'email' => $request->email
        ];
        $save=Subcriber::create($data);
        if($save){  
           return back()->with('success', 'thanks for subscribing');
        }else{
            return back()->with('error', 'something went wrong');
        }
    }
}
