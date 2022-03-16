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
            return 'hello';
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
    }
}
