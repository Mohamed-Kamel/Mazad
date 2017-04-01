<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
	public function __construct(){
    	$this->middleware('auth');
	}

    public function display(){
		$product = DB::table('products')->where('user_id', Auth::id())->get();

    	return view('myitem')->with('products', $product);
    } 

    public function delete($id){
       	$product=Product::find($id); 	
    	$product->delete();
		return redirect("/myitem");	
    }      

}
