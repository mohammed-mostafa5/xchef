<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use  AuthenticatesUsers;


    public function register(Request $request)
    {
        $request->validate(['phone' => 'required|numeric']);

        $user = User::create(['phone' => request('phone')]);

        $user->update(['verify_code' => $this->randomCode(4)]);

        return response()->json(['msg' => 'A confirmation code has been sent, check your inbox', 'code' => $user->verify_code]);
    }

    public function verify_code(Request $request)
    {
        $inputs = $request->validate(['phone' => 'required|numeric', 'verify_code' => 'required|min:4|max:5']);

        $user = User::firstWhere($inputs);

        if (empty($user)) {
            return response()->json(['msg' => 'Verify code is not correct'], 403);
        }

        $token = auth('api')->tokenById($user->id);

        return response()->json(compact('user', 'token'));
    }

    public function completeRegister(Request $request)
    {
        $inputs = $request->validate([
            'first_name' => 'required|string|min:3|max:191',
            'last_name' => 'required|string|min:3|max:191',
            'email' => 'required|email|max:191|unique:users,email',
            'password' => 'required|string|min:3|max:191|confirmed',
        ]);

        $user = auth('api')->user();
        $user->update($inputs);

        return response()->json(compact('user'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate(['email' => 'required|email', 'password' => 'required|string|max:191']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['msg' => __('lang.wrongCredential')], 401);
        }
        $user = auth('api')->user();

        return response()->json(compact('user', 'token'));
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['msg' => 'success'], 200);
    }


    ///////////////////////////////////////// Helpeers  /////////////////////////////////////////

    public function randomCode($length = 8)
    {
        // 0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
