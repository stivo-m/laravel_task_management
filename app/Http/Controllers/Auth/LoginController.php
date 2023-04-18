<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $credentials = [
            'email_address' => $validated['email_address'],
            'password' => $validated['password'],
        ];

        if(!Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Either the email or password passed is invalid',
                'details' => $validated,
            ], 403);
        }

        /**
         * @var User $user
         */
        $user = Auth::user();

        $token = $user->createToken($validated['device_id'])->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => new UserResource($user),
        ], 200);
    }
}
