<!DOCTYPE html>
<html lang="en">
<head>

<style>
	.panel{
		margin: 70px;
    	border-color: #ddd;
	}
	.header{
		color: #333;
	    background-color: #f5f5f5;
	    border-color: #ddd;
	    padding: 10px 15px;
	    border-bottom: 1px solid transparent;
	    border-top-left-radius: 3px;
	    border-top-right-radius: 3px;
	}

	.body{
	    display: block;
    	text-align: center;
	}

	.footer{
		text-align: center;

    	display: block;
	}
</style>	


</head>
<body>
	


<div class="row">
	<div style="text-align: center;" >

		<div class="panel" style="margin: 70px;">
		<div style="text-align: center;" class="header"> <h2>Hi {{$product->user->name}}</h2> </div>
		  <div class="body">
		    <h4 style="text-align: center;"> Someone Raised the bid of your item {{$product->name}} to {{$product->highest_price}} $</h4>
		  </div>
		  <div class="footer" style="text-align: center;">Thanks for contacting!</div>
		</div>
	</div>
</div> 

</body>
</html>