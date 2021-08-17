<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        // if(Auth::check()){
            $roles = Auth::user()->roles;
            foreach($roles as $role){
                if($role->role_name == 'Admin')
                {
                    // return redirect()->route('/admin/dashboard');
                    return $next($request);
                }
                else
                {
                    // return redirect('/login');   
                    return redirect()->route('login');
                }
            }
            return $next($request);
            // Debugbar::info("Did not enter Admins Middleware");
            // return redirect('/add-product');
        // }
        // else{
        //     return redirect('/');
        // }
        //return $next($request);
    }
}
