<?php

namespace App\Http\Middleware;

use App\Models\role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSuperadmin
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

        $superadmin_role=role::where('name','super_admin')->first();
        if(Auth::user()->role_id!==$superadmin_role->id){
            return redirect(url('/'));
        }
        return $next($request);
    }
}
