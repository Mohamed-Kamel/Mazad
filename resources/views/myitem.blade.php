@extends('layouts.app')

@section('content')

<div class="col-md-6 col-md-offset-1">
 <h1> 
 {{Auth::user()->name}} 
 <a href="{{URL('editprof')}}/{{Auth::user()->id}}" class="btn btn-success btn-sm" style="margin:30px ;">Edit Profile</a><br>
</h1>
<h4>
 My List Of Products ...
<a href="{{url('products/create')}}" class="btn btn-success btn-sm" style="margin:30px ;">Add One</a>
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
                <th>Manage</th>
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
                	
                    <form action="{{URL('delete')}}/{{$product->id}}" method="POST">
                        <!-- Edit -->
                        <a href="#" class="btn btn-default" role="button">
                            <i class="glyphicon glyphicon-pencil"> </i>
                                
                        </a>
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">
                        <!-- Delete -->
                        <button  class="btn btn-danger" role="button">
                             <i class="glyphicon glyphicon-trash"> </i>
                        
                        </button>
                
                    </form>
                
                </td>         
            </tr>
        @endforeach    
        </tbody>
    </table>
        </div>
	</div>
</div>


@endsection