<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function dashboard_route(){
        $roles = Auth::user()->roles;
            foreach($roles as $role){
                if($role->role_name == 'Admin')
                {
                    // return redirect()->route('/admin/dashboard');
                    return redirect("/admin/dashboard");
                }
                // else
                // {
                //     // return redirect('/login');   
                //     return redirect("/employee/dashboard");
                // }
            }
            return redirect("/employee/dashboard");
    }
}
