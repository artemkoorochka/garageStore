@extends("template")

@section("title")
    New product
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
            <form class="row g-3" action="{{route('admin.store')}}" method="post">
                @csrf
                @isset($product)
                    @method('PUT')
                @endisset
                <div class="col-md-8">
                    <label class="form-label">Name</label>
                    <input type="text"
                           class="form-control"
                           name="name"
                           value="{{old('name')}}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Price $</label>
                    <input type="text"
                           class="form-control"
                           value="{{old('price')}}"
                           name="price">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>

@endsection
