@extends("template")

@section("title")
    Edit {{$product->id}}
@endsection

@section("content")
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-3">
            <div class="list-group">
                <a href="{{route('admin.index')}}" class="list-group-item list-group-item-action">Products list</a>
                <a href="{{route('admin.create')}}" class="list-group-item list-group-item-action">Add new product</a>
            </div>
        </div>
        <div class="col-9">
            <form class="row g-3" action="{{route('admin.update', $product->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="col-md-8">
                    <label class="form-label">Name</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name"
                           value="{{old('name', $product->name)}}">

                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="col-md-4">
                    <label class="form-label">Price $</label>
                    <input type="text"
                           class="form-control"
                           name="price"
                           value="{{old('price', $product->price)}}">
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection
