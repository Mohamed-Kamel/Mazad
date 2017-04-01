@extends("layouts.app")


@section("content")

    <h1 style="text-align: center;">Add Item</h1>

    <div class="col-md-8 col-md-offset-2">
        <form name="addForm" action="{{url('/products')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name" class="control-label col-md-1">Name</label>

                <div class="col-md-11">
                    <input placeholder="Product name" class="form-control" type="text" name="name" id="name">
                </div>
            </div>

            <br>
            <br>
            <div class="form-group">
                <label for="price" class="control-label col-md-1">Price</label>

                <div class="col-md-11">
                    <input placeholder="Product price" class="form-control" type="text" name="price" id="price">
                </div>
            </div>

            <br>

            {{-- Check box --}}
            <label class="col-md-offset-1">
                &nbsp; &nbsp; <input type="checkbox" name="online" value="yes"> Online
            </label>

            {{-- Text Area --}}
            <div class="form-group">
                <label for="details" class="control-label col-md-1">Details</label>
                <div class="col-md-11">
                    <textarea placeholder="Product details" class="form-control" name="details" id="details" cols="30" rows="10" ></textarea>
                </div>
            </div>

            <div class="form-group">
            <input type="file" name="image" id="image">
            &nbsp; &nbsp;<label class="col-md-offset-1" for="image">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                    <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                </svg>
                <span>Choose an image…</span>
            </label>
            </div>

            <div class="form-group">
                &nbsp; &nbsp;<button class="col-md-offset-1 btn btn-primary" name="save" value="save">
                    Save
                    <i class="glyphicon glyphicon-ok-circle"></i>
                </button>
                <button class="	btn btn-danger" name="cancel" value="cancel">
                    Cancel
                    <i class="glyphicon glyphicon-remove-sign"></i>
                </button>
            </div>
        </form>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection