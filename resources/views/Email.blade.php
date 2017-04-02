<!DOCTYPE html>
<html lang="en">
<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
	


<div class="row">
	<div class="container" style="text-align: center;" >

		<div class="panel panel-default" style="margin: 70px;">
		<div style="text-align: center;" class="panel-heading"> <h2>Hi {!! $product->user->name !!}</h2> </div>
		  <div class="panel-body">
		    <h4 style="text-align: center;"> Someone Raised the bid of your item {!! $product->name !!} to {!! $product->highest_price !!} </h4>
{{-- 
				<div style="text-align: center;" padding:10px>
					<img width="300px" class="img-rounded row" src="{!! asset($product->image)!!}" alt="image">
				</div> --}}
		  </div>
		  <div class="panel-footer" style="text-align: center;">Thanks for contacting!</div>
		</div>
	</div>
</div> 

</body>
</html>