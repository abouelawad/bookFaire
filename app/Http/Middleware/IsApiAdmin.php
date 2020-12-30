<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class IsApiAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // dd($request->all( ));
        if($request->access_token)
        {
            $user = User::where('access_token', $request->access_token)->first();


            if ($user && $user->is_admin == 1)
            {
                return $next($request);
            }
        }
        return response()->json('not admin');
    }
}
