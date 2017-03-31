@extends('layouts.app')


@section('content')


<h1 style="text-align: center;">MAZAD</h1>

<div class="col-md-8 col-md-offset-2">
    <form action="/search">

        <div class="form-group">
            <div class="col-md-7">
                <input class="form-control" placeholder="Search by name" type="text" name="search" id="search">
            </div>
            
            <button class="btn btn-default col-md-2" name="search">Search</button>
        </div>


    </form>
<br>
<br>
    <table class="table table-striped">
        <tbody>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Highest Bid</th>
                    <th>No of Bid</th>
                    <th>Owner</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tr>
                <td>IPhone</td>
                <td>350$</td>
                <td>400$</td>
                <td>9</td>
                <td>Amr</td>
                <td>Here</td>
            </tr>
            <tr>
                <td>Car</td>
                <td>200$</td>
                <td>300$</td>
                <td>5</td>
                <td>omnea</td>
                <td>here</td>
            </tr>
            
        </tbody>
    </table>
</div>


@endsection


