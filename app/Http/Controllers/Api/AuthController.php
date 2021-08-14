<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController
{
    /*
    * @param $request
    */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);

        $credentials = \request(['email', 'password']);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 422);
        }

        if (Auth::attempt($credentials)) {
            return new UserResource(User::where('email', '=', $validator->valid()['email'])->first());
        } else {
            return response("Invalid Credentials", 401);
        }
    }

    /*
    * @param $request
    */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'nullable|in:guest,user,admin',
        ]);

        if ($validator->fails()) {
           return response()->json($validator->errors(), 422);
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if (isset($request->role)) {
            $user->role = $request->role;
        } else {
            $user->role = 'guest';
        }

        $user->save();

        return new UserResource($user);
    }
}
