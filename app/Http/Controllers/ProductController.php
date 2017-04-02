<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use DB;


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

    public function display(){
		$product = DB::table('products')->where('user_id', Auth::id())->get();

        // $user = User::find(Auth::id());

        // $product = $user->products->toArray();
        // dd($product);
    	return view('myitem')->with('products', $product);
    } 



    public function delete($id){
       	$product=Product::find($id); 	
    	$product->delete();
		return redirect("/myitem");	
    }      



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $id = Auth::id();
        // $id = 
        return view("addProduct");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        

        //@TODO : Error with input in validation

        $user_id = Auth::id();

        if ($request->save === "save") {
            $product = new Product;
            $product->name = $request->name;
            $product->details = $request->details;
            $product->price = (float)$request->price;
            $product->highest_price = (float)$request->price;
            $product->no_of_bids = 0;
            $product->online = $request->online ? "yes" : "no";

            if ($request->hasFile("image")) {

//                $product->image = $request->file("image")->store("images");
                $image_name = $request->file('image')->getClientOriginalName();
                $image_ext = $request->file('image')->getClientOriginalExtension();
                $image_path = 'images/' . bcrypt($image_name).time().'.'.$image_ext;
                $product->image = $image_path;
                $request->file("image")->move(public_path('images'), $image_path);
            }
//            Auth::id()
            $product->user_id = $user_id;
            $product->save();
            return redirect("/myitem");
        } elseif ($request->cancel === "cancel") {
            return redirect("/myitem");
        }
    }

}
