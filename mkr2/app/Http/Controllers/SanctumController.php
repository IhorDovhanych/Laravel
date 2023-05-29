<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SanctumController extends Controller
{
    public function create(Request $request)
    { $token =
        $request->user()->createToken($request->token_name,
            ['server:update', 'sever:create']);
        return ['token' => $token->plainTextToken];
    }
}
