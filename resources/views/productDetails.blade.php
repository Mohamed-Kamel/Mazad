@extends("layouts.app")


	@section('content')
	@foreach($item_details as $item  )

	<div class="container col-xs-offset-2 col-xs-6">
	
		    <div class="row" >
				   <div class="col-xs-9">
					    <div class="row"><h1>{{$item->name}} </h1> </div>	 
					    
						<div class="row"> <h3>Product details : </h3> {{$item->details}}  </div>
						 
						<div class="row"> <h3>Online : </h3> {{$item->online}} </div>

						<div class="row"> <h3>Highest Price : </h3> <p>{{$item->highest_price}} </p> </div>
						
						
						<div class="row"> <h3>Number of bids : </h3> {{$item->no_of_bids}} </div><br><br>

							<div class="row">
								<form action="{{URL('/item')}}/{{$item->id}}" method="post">
							
									{{ csrf_field() }}
									<div class="row">
									<input type="text" name="newPrice" >
									<button type="submit" class="btn btn-md btn-primary" name="Bid">Bid</button>
									</div>	
							
							    </form>

							</div>
						
					</div>

					   <div class="col-xs-3" padding:10px>
							<img  width="500" height="500" class="img-rounded row" src="{{ URL('/') }}/{{$item->image}}" alt="image">	
					   </div>

				<a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
		   </div>
	</div>
	@endforeach
	@endsection