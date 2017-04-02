<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use DB;
use \App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('welcome', ["products" => $products]);
    }


    public function update($id){
        $user=User::find($id);
        return view("editprof",compact('user'));
    } 



    public function donee($id ,Request $request){ 
        $user=User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;    
        $user->location = $request->location;     
        $user->save();

        return redirect("/myitem");
    }
}
