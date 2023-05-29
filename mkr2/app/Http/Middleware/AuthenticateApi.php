<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class AuthenticateApi extends Middleware
{
    protected function authenticate($request, array $guards)
    {
       $token = $request->query('api_token');
       if(empty($token)){
           $token = $request->input('api_token');
       }
       if(empty($token)){
           $token = $request->bearerToken();
       }
        if(empty($token)){
            $token = $request->user()['api_token'];
        }
       if(in_array($token, config('apitokens'))) return;
       $this->unauthenticated($request, $guards);
    }
}
