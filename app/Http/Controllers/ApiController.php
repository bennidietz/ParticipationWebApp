<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController
{
    /*
    * @param $request
    */
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($validatedData)) {
            return User::where('email', '=', $validatedData['email'])->first();
        }

        abort(401);
    }

    /*
    * @param $request
    */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        return User::create($validatedData);
    }
}
