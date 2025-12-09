<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class userController extends Controller
{
    //Start function register
    public function register(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $username = strip_tags($request->username);
        $email = strip_tags($request->email);
        $password = strip_tags($request->password);

        $sheckThisUser = User::where('email', $email)->first();
        if($sheckThisUser){
            return $data= 2;
        }

        else {
        $user = User::create([
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        if($user) {
            $token = $user->createToken('user_token')->plainTextToken;
            return response()->json([
                'message' => 'seccuessfuly Register',
                'user' => $user,
                'token' => $token
            ]);
        }
        return $data;
            
        }

        return $data;
    } //=== Start function register ===//

    //Start function Login
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if(!Auth::attempt($request->only('email', 'password')))
        return response()->json([
        'message' => 'Email Or Password Is Not Found',
        'data' => 0
        ]);

        $checkUser = Auth::User();
        
        $token=Auth::user()->createToken('user_token')->plainTextToken;

        return response()->json([
            'message'=> 'successfuly',
            'user' => $checkUser,
            'token' => $token
        ]);
    } //=== Start function Login  ===//

    public function logout(Request $request) {
        if(Auth::check()) {
            $typeLogout = $request->user()->currentAccessToken()->delete();
                return response()->json([
                'message' => 'seccess Action Logout',
                'data' => 1
            ]);
        } else {
            return response()->json([
            'message' => 'Sorey Semthing Are In Error To Do Logout',
            'data' => 0
        ]);
    }
}
}
