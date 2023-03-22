<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Type');
        if ($header != 'admin') {
            $arr = [
                'status'    => false,
                'message'   => 'Request Denied!'
            ];
            return response()->json($arr, 403);
        }
        else if(Auth::user()->is_admin == 1){
            $arr = [
                'status'    => false,
                'message'   => 'Request Denied!'
            ];
            return response()->json($arr, 403);
        }
        return $next($request);
    }
}
