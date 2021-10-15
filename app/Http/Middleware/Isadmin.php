<?php

namespace App\Http\Middleware;

use App\Models\role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Isadmin
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

        $admin_role=role::where('name','student')->first();
        if(Auth::user()->role_id!==$admin_role->id){
            return redirect(url('/'));
        }
        return $next($request);
    }
}
