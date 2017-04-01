<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function showDetails($id)
    {
      
      
      $item_details = Product::where('id',$id)->get();
      // return view('viewTasks')->with('tasks',$tasks);
      return view('productDetails',compact('item_details'));
      	
    }
    
    public function updateBid($id,Request $request)
    {
    	$item = Product::find($id);

    	if($item->highest_price < $request->newPrice)
    	{
    		$item->highest_price = $request->newPrice;
    		$item->save();
    	}
    	
    	return back();

    }


    // public function FunctionName($value='')
    // {
    // 	$path = $request->file("photo")->store('images/items');

    // 	<img src="{{ $item->item_image }}">

    // }
}
