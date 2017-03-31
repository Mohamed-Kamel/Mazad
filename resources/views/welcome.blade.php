@extends('layouts.app')


@section('content')


<h1 style="text-align: center;">MAZAD</h1>

<form action="/search" class="col-md-8 col-md-offset-2">

    <div class="form-group">
        <div class="col-md-7">
            <input class="form-control" placeholder="Search by name" type="text" name="search" id="search">
        </div>
        
        <button class="btn btn-default col-md-2" name="search">Search</button>
    </div>

</form>


@endsection