<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if the user is logged in show his products else show all products


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $id = Auth::id();
        $id = 1;
        return view("addProduct")->with(["id" => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        // @TODO : validate request

        //@TODO :Error with input

        $user_id = 1;

        if ($request->save === "save") {
            $product = new Product;
            $product->name = $request->name;
            $product->details = $request->details;
            $product->price = (int)$request->price;
            $product->highest_price = (int)$request->price;
            $product->no_of_bids = 0;
            $product->online = $request->online ? "yes" : "no";

            if ($request->hasFile("image")) {

//                $product->image = $request->file("image")->store("images");
                $image_name = $request->file('image')->getClientOriginalName();
                $image_ext = $request->file('image')->getClientOriginalExtension();
                $image_path = 'images/' . sha1($image_name).time().'.'.$image_ext;
                $product->image = $image_path;
                $request->file("image")->move(public_path('images'), $image_path);
            }
//            Auth::id()
            $product->user_id = $user_id;
            $product->save();
            return redirect("/products");
        } elseif ($request->cancel === "cancel") {
            return redirect("/products");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
