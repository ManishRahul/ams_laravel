<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function user_to_employee(){
        $user = User::latest()->first();
        foreach($user->roles as $role){
            $user_role = $role;
        }
        // $user_role = $user->roles;
        // return $user_role;
        return view('admin/create_employee',["user"=>$user, "userrole"=>$role]);
    }

    public function create_employee(Request $req){
        $emp = new Employee;
        $emp->user_id = $req['user_id'];
        $emp->name = $req['name'];
        $emp->role = $req['role'];
        $emp->email = $req['email'];
        $emp->phone = $req['phone'];

        $emp->save();

        return redirect('/admin/dashboard');
    }

    public function show_all_emps(){
        $emps = Employee::all();
        // foreach($emps as $emp){
        //     echo $emp->user->roles;
        // }
        return view('admin/view-emps',["emps"=>$emps]);
    }

    public function show_emp_update($emp_id){
        $emp = Employee::find($emp_id);
        return view('admin/edit-emp',['emp'=>$emp]);
    }

    public function editEmp(Request $req){
        $emp = Employee::find($req['emp_id']);
        
        $emp->name = $req['name'];
        $emp->email = $req['email'];
        $emp->phone = $req['phone'];
        // echo $req['emp_id'],$req['name'],$req['email'],$req['phone'];
        $emp->save();
        
        $emp->user->name = $req['name'];
        $emp->user->email = $req['email'];
        
        $emp->user->save();
        $roles = $req->roles;
        $emp->user->roles()->sync($roles);
        return redirect('/show-emps');
    }

    public function deleteEmp($emp_id){
        $emp = Employee::find($emp_id);
        $emp->user->delete();
        return redirect('/show-emps');
    }

    public function list_products_assigned(){
        $user = Auth::user();
        // foreach($user->employee->products as $product){
        // echo $product;
        // }   
        return view('employee/products-assigned',["user"=>$user]);
    }
}
