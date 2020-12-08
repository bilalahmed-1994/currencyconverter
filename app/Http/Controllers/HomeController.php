<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    /**
     * Get the token for user
     */
    public function getToken(Request $request)
    {
        $token = Str::random(60);

        $token= $request->user()['api_token'];

        // var_dump($token);

        return view('token',['token' => $token]);
    }

    /**
     * Generate the token for user
     */
    public function generateToken(Request $request)
    {
        $token = Str::random(60);

        $request->user()->forceFill([
            'api_token' => $token,
            // 'api_token' => hash('sha256', $token),
        ])->save();

        return view('token',['token' => $token]);
    }

     public function currency(Request $request)
    {
        

        return view('currency');
    }
}
