@extends('layouts.app')

@section('styles')
    <!-- <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        @import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);


    </style>

@endsection


@section('content')



    <!-- home start -->
    <section id="slider">

        {{--<div class="data col-md-6 col-md-offset-3">--}}
            {{--<h2> All you need in best price gnkjdjlcdbvk khfhkfjenrj kefhjefjkn eklfhejhfkdlkdjkf vkfhgjhnv kfhgjen lkgk--}}
                {{--kfnb iknkf !</h2>--}}
        {{--</div>--}}

    </section>
    <!-- home end -->

    <section id="items">
        <div class="container-fluid">
            <div class="row">
                <h2>Our Products</h2>

                <div class="col-md-4 col-md-offset-8">
                    <!-- <div class="form-group"> -->
                    <div class="col-md-7">
                        <input class="form-control" placeholder="Search by name" type="text" name="search"
                               class="search" id="key">
                    </div>

                    <button class="btn btn-default col-md-2" id="search" name="search">Search</button>
                    <!-- </div> -->
                </div>

                <div id="searchContainer">

                    @foreach ($products as $product)
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="col-item">
                                <div class="post-img-content">
                                    <a href="{{url('item')}}/{{$product->id}}"><img src="{{asset($product->image)}}" class="img-responsive"/></a>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="price col-md-12">
                                            <h3><a href="{{url('item')}}/{{$product->id}}">{{ $product->name }}</a></h3>
                                            <div>
                                                <h5>Owner</h5>
                                                <h5 class="owner-name"> {{ $product->user->name }} </h5>
                                            </div>
                                            <div>
                                                <h5>Location</h5>
                                                <h5 class="owner-name"> {{ $product->user->location }} </h5>
                                            </div>
                                            <div>
                                                <h5>Initial Price </h5>
                                                <h5 class="price-text-color"> {{ $product->price }}$ </h5>
                                            </div>
                                            <div>
                                                <h5>Highest Bid </h5>
                                                <h5 class="price-text-color"> {{ $product->highest_price }}$ </h5>
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
                                            <i class="fa fa-bullhorn"></i>
                                            <a href="{{url('item')}}/{{$product->id}}" type="button" name="bid">Bid</a>
                                        </p>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{$products->links()}}
    </section>


    <section id="contact">
        <div class="contact">
            <br>
            <h1>Contact Us</h1>
            <br>
            <br>
            <h4> All you need in best price gnkjdjlcdbvk khfhkfjenrj kefhjefjkn eklfhejhfkdlkdjkf vkfhgjhnv kfhgjen lkgk
                kfnb iknkf !</h4>
        </div>
    </section>


@endsection

@section('scripts')
    <script>
        var draw = function (data) {

            var online = $("<div></div>").append($("<h5></h5>").text("Online")).append($("<h5></h5>").addClass("price-text-color").text(data.online));
            console.log(online);
            var bids = $("<div></div>").append($("<h5></h5>").text("No of Bids")).append($("<h5></h5>").addClass("price-text-color").text(data.no_of_bids));
            var highest = $("<div></div>").append($("<h5></h5>").text("Highest Price")).append($("<h5></h5>").addClass("price-text-color").text(data.highest_price));
            var initial = $("<div></div>").append($("<h5></h5>").text("Initial Price")).append($("<h5></h5>").addClass("price-text-color").text(data.price));
            var location = $("<div></div>").append($("<h5></h5>").text("Location")).append($("<h5></h5>").addClass("owner-name").text(data.location));
            var owner = $("<div></div>").append($("<h5></h5>").text("Owner").append($("<h5></h5>").addClass("owner-name").text(data.owner)));
            var name = $("<h3></h3>").append($("<a></a>").attr("href", "#").text(data.name));
            var price = $("<div></div>").addClass("price col-md-12").append(name).append(owner).append(location).append(initial).append(highest).append(bids).append(online);
            var row = $("<div></div>").addClass("row").append(price);
            var info = $("<div></div>").addClass("info").append(row);
            var img = $("<img></img>").addClass("img-responsive").attr("src", data.image);
            var link = $("<a></a>").attr("href", "#").append(img);
            var wrapper = $("<div></div>").addClass("post-img-content").append(link);
            var item = $("<div></div>").addClass("col-item").append(wrapper).append(info);
            $("#searchContainer").append($("<div></div>").addClass("col-xs-12 col-sm-6 col-md-3").append(item));
        };

        var search = function (event) {
            event.preventDefault();

            $key = $("#key").val();

            $.ajax({
                url: "/search",
                method: 'GET',
                data: {'name': $key},
                success: function (response) {
                    console.log(response);
                    //foreach
                    $("#searchContainer").empty();
                    for (var i = 0; i < response.length; i++) {
                        draw(response[i]);
                    }
                },
                error: function (error) {
                    //show no item
                    var container = $("#searchContainer");
                    container.empty();
                    container.append($("<h1><h1>").text(error));
                    console.log(error);
                }
            });
        };

        $("#key").on("keyup", search);

        $("#search").on("click", search);

    </script>

    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <!-- <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script> -->
    <!-- <script>
        $('#bidModal').on('shown.bs.modal', function () {
              $('#bid').focus()
        });
    </script> -->
@endsection


