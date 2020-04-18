<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Services\UserService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthController
 * @package App\Http\Controllers\API
 */
class AuthController extends Controller
{

    /**
     * Register user
     *
     * @param CreateUserRequest $request
     *
     * @param UserService $userService
     * @return JsonResponse
     */
    public function register(CreateUserRequest $request, UserService $userService)
    {
        $params = $request->all();
        $params['role_id'] = User::USER;

        $user = $userService->create($params);
        
        $token = $user->createToken('Personal access token');

        $token->token->expires_at = request('remember_me') ? Carbon::now()->addMonth() : Carbon::now()->addDay();

        $token->token->save();

        return response()->json([
            'access_token' => $token->accessToken,
            'token_type' => 'bearer',
            'expires_at' => Carbon::parse($token->token->expires_at)->toDateTimeString()
        ]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('Personal access token');

        $token->token->expires_at = request('remember_me') ? Carbon::now()->addMonth() : Carbon::now()->addDay();

        $token->token->save();

        return response()->json([
            'access_token' => $token->accessToken,
            'token_type' => 'bearer',
            'expires_at' => Carbon::parse($token->token->expires_at)->toDateTimeString()
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return UserResource
     */
    public function me()
    {
        return new UserResource(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout()
    {
        request()->user()->token()->revoke();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
