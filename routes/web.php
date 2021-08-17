<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomePageController;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Employee\EmployeeDashboardComponent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homeRoute',[HomePageController::class,'dashboard_route']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::middleware(['auth:sanctum', 'verified','admin'])->group(function () {
    
// Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin/dashboard',AdminDashboardComponent::class);

    Route::get('/emp-form-to-create',[EmployeeController::class,'user_to_employee']);
    Route::post('/create-emp',[EmployeeController::class,'create_employee']);

    Route::get('/show-product',[ProductController::class,'showProducts']);
    Route::post('assign',[ProductController::class,'selectedProducts']);
    Route::post('assign-emp',[ProductController::class,'assignToEmp']);

    
    //Admin can add a new product
    Route::get('/add-product', function () {
        return view('admin/add-product');
    });
    Route::post('add',[ProductController::class,'addProduct']);
    Route::get('show-product-to-update/{id}',[ProductController::class,'show_to_edit_product']);
    Route::post('/edit-product',[ProductController::class,'editProduct']);
    Route::get('delete-product/{id}',[ProductController::class,'deleteProduct']);


    
    //List all Employees
    Route::get('/show-emps',[EmployeeController::class,'show_all_emps']);

    //Employee Edit Delete operations
    Route::get('/show-emp-to-update/{id}',[EmployeeController::class,'show_emp_update']);
    Route::post('/edit-emp',[EmployeeController::class,'editEmp']);
    Route::get('delete-emp/{id}',[EmployeeController::class,'deleteEmp']);
    
    // });
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/employee/dashboard',EmployeeDashboardComponent::class)->name('employee.dashboard');

//Employee can view products assigned to him
Route::get('/list-products',[EmployeeController::class,'list_products_assigned']);

});


