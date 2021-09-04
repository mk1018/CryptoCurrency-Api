<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Services\UserService;

class PublicAddressController extends Controller
{
    public function __construct()
    {
        $this->userService = new UserService;
    }

    public function index($user_code=null)
    {
        $user = $this->userService->codeFind($user_code);
        $param = [
            'name'      => ($user) ? $user->name : "",
            'addresses' => ($user) ? $user->getPublicAddressInfo : []
        ];
        return view('publicAddress', $param);
    }
}
