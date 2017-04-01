@extends('layouts.app')

@section('content')

<div class="col-md-6 col-md-offset-1">
 <h1> 
 {{Auth::user()->name}} 
 <a href="{{URL('editprof')}}/{{Auth::user()->id}}" class="btn btn-success btn-sm" style="margin:30px ;">Edit Profile</a><br>
</h1>
<h4>
 My List Of Products ...
<a href="#" class="btn btn-success btn-sm" style="margin:30px ;">Add One</a>
 </h4>
 </div>
  <br>
</br>
<div class="row ">
	<div class="col-md-6 col-md-offset-1">
<div class="container"> 
    <table class="table table-striped ">
        <thead>
            <tr>
                <th>Product name</th>
                <th>Price</th>
                <th>Online</th>
                <th>Highest Bid</th>
                <th>No.Of.Bids</th>
                <th>Delete/Update</th>
            </tr>
        </thead>
        <tbody>
         @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->online}}</td>
                <td>{{$product->highest_price}}</td>
                <td>{{$product->no_of_bids}}</td>        
                <td>
                	<p>
                    <form action="{{URL('delete')}}/{{$product->id}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <button  class="btn btn-primary" role="button">
                             <i class="glyphicon glyphicon-trash"> </i>
                        Delete
                        </button>
                   
                    </form>
		        	
		        	<a href="#" class="btn btn-default" role="button">
		        	<i class="glyphicon glyphicon-pencil"> </i>
		        		Edit
		        	</a>
		        	</p>
                </td>         
            </tr>
        @endforeach    
        </tbody>
    </table>
        </div>
	</div>
</div>


@endsection