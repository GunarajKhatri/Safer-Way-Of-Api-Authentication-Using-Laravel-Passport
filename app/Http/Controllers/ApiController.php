<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ApiController extends Controller
{
    public function RefreshToken(Request $request)
    {
        $refresh = $request->cookie('Rtoken');
        // make sure you have client credentials with id = 1 for 'admin' provider or modify ibelow find id as per table data

        $client = DB::table('oauth_clients')->select('id', 'secret')->find(1);
        $data = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh,
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'scope' => ''
        ];

        $request = Request::create('/oauth/token', 'POST', $data);

        Cookie::forget('Rtoken');
        app()->instance('request', $request);

        return Route::dispatch($request);
    }

    public function Logout()
    {
        Auth::guard('api-admins')->user()->tokens->each(function ($token, $key) {
            DB::table('oauth_refresh_tokens')
                ->where('access_token_id', $token->id)
                ->update([
                    'revoked' => true
                ]);
            $token->delete();
        });
        return response()->json([
            "message" => "Logged out successfully!"
        ]);
    }
}
