<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use DB;
use File;
use Mail;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if the user is logged in show his products else show all products
        $products = Product::paginate(5);
        return view('welcome', ["products" => $products]);
    }

    /**
     * Search for product.
     * @return like products.
     */
    public function search(Request $request)
    {

        $name = $request->name;
        $products = Product::where("name", 'LIKE', '%' . $name . '%')->paginate(5);

        for ($i = 0; $i < count($products); $i++) {
            $products[$i]->owner = $products[$i]->user->name;
            $products[$i]->location = $products[$i]->user->location;
        }

        if (count($products) > 0) {
            return response()->json($products, 200);
        } else {
            return response()->json("No product found with this name", 401);
        }
    }


    public function showDetails($id)
    {
        $item_details = Product::where('id', $id)->get();
        return view('productDetails', compact('item_details'));
    }

    public function updateBid($id, Request $request)
    {
        $item = Product::find($id);
        if ($item->highest_price < $request->newPrice) {
            $item->highest_price = $request->newPrice;
            $item->no_of_bids = ($item->no_of_bids) + 1;
            $item->save();
            // $this->send($item->name, $item->highest_price, $item->user->email);
            $this->send($item, $item->user->email);
        }
        return back();
    }

    public function display()
    {
        $product = DB::table('products')->where('user_id', Auth::id())->get();

        return view('myitem')->with('products', $product);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $image = $product->image;
        File::delete(public_path() . '/' . $image);
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
        if ($request->save === "save") {
            $product = new Product;
            $product->name = $request->name;
            $product->details = $request->details;
            $product->price = (float)$request->price;
            $product->highest_price = (float)$request->price;
            $product->no_of_bids = 0;
            $product->online = $request->online ? "yes" : "no";

            if ($request->hasFile("image")) {
                $image_name = $request->file('image')->getClientOriginalName();
                $image_ext = $request->file('image')->getClientOriginalExtension();
                $image_path = 'images/' . sha1($image_name) . time() . '.' . $image_ext;
                $product->image = $image_path;
                $request->file("image")->move(public_path('images'), $image_path);
            }
            $product->user_id = Auth::id();
            $product->save();
            return redirect("/myitem");
        } elseif ($request->cancel === "cancel") {
            return redirect("/myitem");
        }
    }

    private function send($product, $email)
    {

        Mail::send(['html' => 'Email'], ['product' => $product], function ($message) use ($product, $email) {

            $message->from('mazadcompany@gmail.com', 'Mazad Company');
            $message->to($email)->subject('Updated Bid in Your ' . $product->name);
        });
        return response()->json(['message' => 'Request completed']);
    }

    public function showEdit($id)
    {
        $product = Product::find($id);
        return view('editProduct')->with('product', $product);
    }


    public function editProduct(UpdateProduct $request, $id)
    {
        if ($request->save === "save") {
            $product = Product::find($id);
            $product->name = $request->name;
            $product->details = $request->details;
            $product->price = (float)$request->price;
            $product->online = $request->online ? "yes" : "no";
            if ($request->hasFile("image")) {
                File::delete(public_path().'/'.$product->image);
                $image_name = $request->file('image')->getClientOriginalName();
                $image_ext = $request->file('image')->getClientOriginalExtension();
                $image_path = 'images/' . sha1($image_name) . time() . '.' . $image_ext;
                $product->image = $image_path;
                $request->file("image")->move(public_path('images'), $image_path);
            }
            $product->user_id = Auth::id();
            $product->save();
            return redirect("/myitem");
        } elseif ($request->cancel === "cancel") {
            return redirect("/myitem");
        }
    }

}