<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;

class HomeController extends BaseController
{
    public function profile()
    {
        $success = User::get();

        return $this->sendResponse($success, 'Profile data successfully.');
    }
}
