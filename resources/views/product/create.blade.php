@extends("template")

@section("title")
    New product
@endsection

@section("content")

    <div class="row">
        <div class="col-lg-3 mb-3">
            <div class="list-group">
                <a href="{{route('admin.index')}}" class="list-group-item list-group-item-action">Products list</a>
                <div class="list-group-item list-group-item-action bg-warning">Add new product</div>
            </div>
        </div>
        <div class="col-lg-9 mb-3">
            <form class="row g-3" action="{{route('admin.store')}}" method="post">
                @csrf
                @isset($product)
                    @method('PUT')
                @endisset
                <div class="col-md-8">
                    <label class="form-label">Name</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name"
                           value="{{old('name')}}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Price $</label>
                    <input type="text"
                           class="form-control @error('price') is-invalid @enderror"
                           value="{{old('price')}}"
                           name="price">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>

@endsection
