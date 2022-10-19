<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\Users\UserResource;
use App\Http\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;

class Authorization extends Controller
{
    /**
     * User service
     * 
     * @var \App\Services\Interfaces\UserServiceInterface
     */
    protected $service;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->service = app(UserServiceInterface::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\Users\UserResource
     */
    public function login(Request $request)
    {
        return new UserResource($this->service->login($request));
    }
}
