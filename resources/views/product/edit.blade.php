@extends("template")

@section("title")
    Edit {{$product->id}}
@endsection

@section("content")

    <div class="row">
        <div class="col-3">
            <div class="list-group">
                <a href="{{route('admin.index')}}" class="list-group-item list-group-item-action">Products list</a>
                <div class="list-group-item list-group-item-action bg-warning">Add new product</div>
            </div>
        </div>
        <div class="col-9">
            <form class="row g-3" action="{{route('admin.update', $product->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="col-md-8">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Price $</label>
                    <input type="text" class="form-control" name="price" value="{{$product->price}}">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection
