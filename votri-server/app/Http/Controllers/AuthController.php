<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $accessToken = $request->validated('access_token');
        $expires = $request->validated('expires');

        if (Carbon::parse($expires)->isPast()) {
            return response()->json([
                'message' => 'Token expired',
            ], 401);
        }

        try {
            $googleUser = Socialite::driver('google')->userFromToken($accessToken);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Invalid token',
            ], 401);
        }

        $user = User::firstOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'name' => $googleUser->getName(),
            'password' => bcrypt($googleUser->getId()),
        ]);

        Auth::login($user);

        return response()->json([
            'message' => 'Login successful',
        ]);
    }

    public function user(): JsonResponse
    {
        $user = Auth::user();

        return response()->json($user);
    }
}
