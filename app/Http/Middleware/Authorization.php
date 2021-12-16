<?php

namespace App\Http\Middleware;

use App\Models\Customers;
use Closure;
use Illuminate\Http\Request;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('token');
        $customer = Customers::where('token', $token)->first();

        if ($customer == null || $token == '') {
            return response()->json([
                'status' => 'Invalid',
                'data'   => null,
                'error'  => ['Token Invalid, unauthorized!']
            ], 401);
        }

        $request->setUserResolver(function () use ($customer) {
            return $customer;
        });





        return $next($request);
    }
}
