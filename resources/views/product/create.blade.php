@extends("template")

@section("title")
    New product
@endsection

@section("content")

    <div class="row">
        <div class="col-lg-3 mb-3">
            <div class="list-group">
                <a href="{{route('products.index')}}" class="list-group-item list-group-item-action">Products list</a>
                <div class="list-group-item list-group-item-action bg-warning">Add new product</div>
            </div>
        </div>
        <div class="col-lg-9 mb-3">
            <form class="row g-3" action="{{route('products.store')}}" method="post">
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
                    <label class="form-label">Categories</label>
                    <ul>
                        @foreach($categories as $category)
                            <li>

                                {{old('category[' . $category->id . ']')}}

                                <label><input type="checkbox"
                                              name="category[]"
                                              @if(is_array(old('category')) && in_array($category->id, old('category')))
                                                  checked
                                              @endif
                                              value="{{$category->id}}"> {{ $category->title }}</label>
                                <ul>
                                    @if(count($category->childs))
                                        @include('product.cat_checkbox',['childs' => $category->childs])
                                    @endif
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>

@endsection
