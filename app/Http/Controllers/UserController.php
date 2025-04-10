<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(): JsonResponse
    {
        return response()->json([
            'user_name' => 'kalpana',
            'email' => 'kalpana@gmail.com',
            'user_role' => 'admin',
        ]);
    }
}
