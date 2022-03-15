<?php

namespace App\Http\Controller;

class UserController extends Controller
{
    public Request $request;
    protected UserService $userService;

    public function __construct(Request $request, UserService $userService)
    {
        $this->request     = $request;
        $this->userService = $userService;
    }

    public function register()
    {
        //... validation
        return $this->userService->register($this->request->all());
    }
}

