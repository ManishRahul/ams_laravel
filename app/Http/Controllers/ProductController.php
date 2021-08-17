<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Employee;
use App\Models\ProductEmployee;

class ProductController extends Controller
{
    public function showProducts(){
        $product = Product::all();
        return view("admin/view-products",['products'=>$product]);
    }

    public function addProduct(Request $req){
        $product = new Product;
        $product->pname = $req['pname'];
        $product->price = $req['price'];
        // $product->description = $req['desc'];
        $product->save();
        return redirect("/add-product");
    }

    public function selectedProducts(Request $req){
        $req->session()->put('products', $req->products);
        // $selectedProducts = $req->products;
        $employees = Employee::all();
        // $testvariable = $this->assignToEmp($selectedProducts);
        return view('admin/choose-emp',["employees"=>$employees]);
    }

    public function assignToEmp(Request $req){
        // $products = $this->selectedProducts;
        $emps = $req['emps'];
        foreach(session('products') as $pros){
            print_r($pros);
        };
        foreach($emps as $emp){
            foreach(session('products') as $selectedProduct){
                $emp_pro = new ProductEmployee;
                $emp_pro->emp_id = $emp;
                $emp_pro->pro_id = $selectedProduct;
                $emp_pro->save();
            }
        }
        return redirect('/admin/dashboard');
    }

    public function show_to_edit_product($pro_id){
        $product = Product::find($pro_id);
        return view('admin/edit-product',['product'=>$product]);
    }

    public function editProduct(Request $req){
        $product = Product::find($req['pro_id']);
        $product->pname = $req->pname;
        $product->price = $req->price;
        $product->save();
        return redirect("/show-product");
    }

    public function deleteProduct($pro_id){
        $product = Product::find($pro_id);
        $product->delete();
        return redirect("/show-product");
    }
}