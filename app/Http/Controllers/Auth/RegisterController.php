<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $user = User::create(array_merge(
            $request->only('name', 'email', 'phone'),
            ['password' => bcrypt($request->password)],
        ));

        return response()->json([
            'message' => 'Registered',
            'user' => $user,
        ]);
    }
}
