<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use DB;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function update($id){
        $user=User::find($id);
        return view("/editprof",compact('user'));

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
