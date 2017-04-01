@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<style>
	@import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
	.col-item {
	    border: 1px solid #E1E1E1;
	    border-radius: 10px;
	    background: #FFF;
	    margin: 10px;
	}
	.col-item:hover { 
	  box-shadow: 0px 2px 5px -1px #000;
	  -moz-box-shadow: 0px 2px 5px -1px #000;
	  -webkit-box-shadow: 0px 2px 5px -1px #000;
	  -webkit-border-radius: 0px;
	  -moz-border-radius: 0px;
	  border-radius: 10px;   
	  -webkit-transition: all 0.3s ease-in-out;
	  -moz-transition: all 0.3s ease-in-out;
	  -o-transition: all 0.3s ease-in-out;
	  -ms-transition: all 0.3s ease-in-out;
	  transition: all 0.3s ease-in-out;   
	  border-bottom:1px solid #52A1D5;        
	}
	.col-item .photo img {
	    margin: 0 auto;
	    width: 100%;
	    padding: 1px;
	    border-radius: 10px 10px 0 0 ;
	}

	.col-item .info {
	    padding: 10px;
	    border-radius: 0 0 5px 5px;
	    margin-top: 1px;
	}

	.col-item .price {
	    /*width: 50%;*/
	    float: left;
	    margin-top: 5px;
	}

	.col-item .price h5 {
	    line-height: 20px;
	    margin: 0;
	    display: inline;
	}
	.price-text-color {
	    color: #219FD1;
	    font-size: 20px;
	    float: right;
	}
	.col-item .separator {
	    border-top: 1px solid #E1E1E1;
	}
	.col-item .separator p {
	    line-height: 20px;
	    margin-bottom: 0;
	    margin-top: 10px;
	    text-align: center;
	}
	.col-item .separator p i{
	    margin-right: 5px;
	}
	.col-item .btn-add {
	    width: 50%;
	    float: left;
	}
	.controls {
	    margin-top: 20px;
	}
	[data-slide="prev"] {
	    margin-right: 10px;
	}
	/*
	Hover the image
	*/
	.post-img-content {
	    height: 196px;
	    /*width: 290px;*/
	    position: relative;
	    overflow: hidden;
	}
	.post-img-content img {
	    position: absolute;
	    padding: 1px;
	    border-radius: 10px 10px 0 0 ;
	    max-width: 100%;
		max-height: 100%;
	}
	.round-tag {
	    width: 60px;
	    height: 60px;
	    border-radius: 50% 50% 50% 0;
	    border: 4px solid #FFF;
	    background: #37A12B;
	    position: absolute;
	    bottom: 0px;
	    padding: 15px 6px;
	    font-size: 17px;
	    color: #FFF;
	    font-weight: bold;
	}
	#slider {
		min-height:630px;
		background-image:url(images/macbook.jpg);
		background-size:100% 100%;
		margin-left: 50px;
		margin-right: 50px;
	}

	.data {
		background-color: rgba(200,200,200,0.7);
		color: #000;
		width: auto;
		position: absolute; 
		bottom: 0; 
		right: 50px;		
	}
	#items {
		margin-left: 50px;
		margin-right: 50px;
		background-color: rgba(200,200,200,0.2);
		border-radius: 5px;
		padding: 20px;
	}
	#contact {
		background-image:url(images/contact.jpg);
		min-height:630px;
		/*min-width:630px;*/
		background-size:100% 100%;
		margin-left: 50px;
		margin-right: 50px;
		color: #a9c9f9;
		border-radius: 5px;
		text-align: center;
	}
	.contact {
		background-color: rgba(0,0,0,0.9);
		min-height: 641px;
		min-width: inherit;
		border-radius: 5px;
	}
	h2 {
		text-align: center;
	}
	tbody {
		border: 0;
	}


</style>

@endsection


@section('content')



<!-- home start -->
<section id="slider">

	<div class="data col-md-6 col-md-offset-3">
		<h2> All you need in best price gnkjdjlcdbvk khfhkfjenrj kefhjefjkn eklfhejhfkdlkdjkf vkfhgjhnv kfhgjen lkgk kfnb iknkf !</h2>
	</div>

</section>
<!-- home end -->




<section id="items">
<div class="container-fluid">
	<div class="row">
	<h2>Our Products</h2>

	<form action="/search" class="col-md-4 col-md-offset-8">
	        <div class="form-group">
	            <div class="col-md-7">
	                <input class="form-control" placeholder="Search by name" type="text" name="search" class="search">
	            </div>
	            
	            <button class="btn btn-default col-md-2" name="search">Search</button>
	        </div>
	    </form>
	

	@foreach ($products as $product)
	<div class="col-xs-12 col-sm-6 col-md-3">
		<div class="col-item">
			<div class="post-img-content">
			    <a href="#"><img src="http://placehold.it/350x260" class="img-responsive"/></a>
			</div>
			<div class="info">
			    <div class="row">
			        <div class="price col-md-12">
			            <h3><a href="#">{{ $product->name }}</a></h3>
			            <div>
				            <h5>Initial Price </h5>
				            <h5 class="price-text-color"> {{ $product->price }} </h5>
			            </div>
			            <div>
				        	<h5>Highest Bid </h5>
				        	<h5 class="price-text-color"> {{ $product->highest_price }} </h5>
			            </div>
			            <div>
				            <h5>No of Bids </h5>
				            <h5 class="price-text-color"> {{ $product->no_of_bids }}</h5>
			            </div>
			            <div>
				            <h5>Online Statue </h5>
				            <h5 class="price-text-color"> {{ $product->online }}</h5>
			            </div>
			            <br>
			        </div>
			    </div>
			    <div class="separator clear-left">
				    <p class="btn-add">
				    <i class="fa fa-bullhorn"></i><a type="button" name="bid">Bid</a></p>
			    </div>
			    <div class="clearfix">
			    </div>
			</div>
		</div>
	</div>
	@endforeach

</section>


<section id="contact">
	<div class="contact">
		<br>
		<h2>Contact Us</h2>
		<h4> All you need in best price gnkjdjlcdbvk khfhkfjenrj kefhjefjkn eklfhejhfkdlkdjkf vkfhgjhnv kfhgjen lkgk kfnb iknkf !</h4>
	</div>

	
</section>


@endsection

@section('scripts')
	<!-- <script src="{{ asset('js/app.js') }}"></script> -->
	<!-- <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script> -->
	<!-- <script>
		$('#bidModal').on('shown.bs.modal', function () {
  			$('#bid').focus()
		});
	</script> -->
@endsection


