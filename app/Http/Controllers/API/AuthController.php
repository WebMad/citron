<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Services\UserService;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class AuthController
 * @package App\Http\Controllers\API
 */
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.verify', ['except' => ['login', 'register']]);
    }

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

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'access_token' => $token,
        ], 201);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
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
        auth()->logout();

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
