<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Nette\Schema\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email'],
            'password' => ['required','string','min:8','confirmed']
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'code' => '422',
                'message' => 'Data tidak valid',
                'data' => $validator->errors()
            ],422);
        }

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'code' => 201,
            'message' => 'Berhasil registrasi',
            'data' => [
                'user' => $user,
                'token' => $token,
                'token_type' => 'Bearer'
            ]
        ],201);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['required','email'],
            'password' => ['required','string']
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'code' => 422,
                'message' => 'Data tidak valid',
                'data' => $validator->errors()
            ],422);
        }

        $user = User::where('email',$request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'status' => false,
                'code' => 401,
                'message' => 'Email atau password salah',
            ],401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'true',
            'code' => 200,
            'message' => 'Berhasil login',
            'data' => [
                'user' => $user,
                'token' => $token,
                'token_type' => 'Bearer'
            ]
        ]);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Berhasil logout'
        ],200);
    }
}
