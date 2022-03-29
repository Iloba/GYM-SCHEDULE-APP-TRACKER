<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClientAuthController extends Controller
{
    public function login(Request $request)
    {

        //Validate Request
        $request->validate(
            [
                'email' => ['required', 'email', 'exists:clients,email'],
                'password' => ['required', 'min:8', 'max:30'],
                //Google Recaptcha Validation
                'g-recaptcha-response' => function ($attribute, $value, $fail) {
                    $secretKey = env('GOOGLE_RECAPTCHA_SECRET');
                    $response = $value;
                    $userIP = $_SERVER['REMOTE_ADDR'];
                    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response&remoteip=$userIP";
                    $response = \file_get_contents($url);
                    $response = json_decode($response);
                    //    dd($response);
                    if (!$response->success) {
                        Session::flash('error', 'Please Check Google Recaptcha');
                        $fail($attribute . 'Google Recaptcha Failed');
                    }
                }
            ],

            //Customize Error
            [
                'email.exists' => 'No record of such email found'
            ]
        );


        $credentials = $request->only('email', 'password');


        //Login Admin
        if (Auth::guard('client')->attempt($credentials)) {
            Session::flash('success', 'Login Successful');
            return redirect()->route('client.home');
        } else {

            Session::flash('error', 'Invalid Login Details');
            return redirect()->back();
        }
    }

    public function index()
    {
        return view('client');
    }

    public function logout()
    {
        Auth::guard('client')->logout();
        Session::flash('success', 'Logout Successful');
        return redirect()->route('client.login.view');
    }
}
