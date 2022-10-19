<?php

namespace App\Http\Services;

use App\Http\Services\Interfaces\UserServiceInterface;
use App\Models\UserAuthStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService implements UserServiceInterface
{
    /**
     * Login user
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Model\User
     */
    public function login(Request $request)
    {
        if (!$user = Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            abort(400);

        $user = Auth::user();
        $token = $user->createToken('rest-api');

        UserAuthStory::create([
            'user_id' => $user->id,
            'token_id' => $token->accessToken->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $user->token = $token->plainTextToken;

        return $user;
    }
}
