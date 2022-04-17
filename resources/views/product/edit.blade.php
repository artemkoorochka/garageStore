@extends("template")

@section("title")
    Edit {{$product->id}}
@endsection

@section("content")

    <div class="row">
        <div class="col-lg-3 mb-3">
            <div class="list-group">
                <a href="{{route('products.index')}}" class="list-group-item list-group-item-action">Products list</a>
                <a href="{{route('products.create')}}" class="list-group-item list-group-item-action">Add new product</a>
            </div>
        </div>
        <div class="col-lg-9 mb-3">
            <form class="row g-3" action="{{route('products.update', $product->id)}}" method="post">
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
                           class="form-control @error('price') is-invalid @enderror"
                           name="price"
                           value="{{old('price', $product->price)}}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Categories</label>
                    <ul>
                        @foreach($categories as $category)
                            <li>
                                <label><input type="checkbox"
                                              name="category[]"
                                              @if(is_array(old('category')) && in_array($category->id, old('category')))
                                                  checked
                                              @endif
                                              @isset($product->categories)
                                                  @foreach($product->categories as $productCategory)
                                                      @if($productCategory->id == $category->id)
                                                          checked
                                                      @endif
                                                  @endforeach
                                              @endisset
                                              value="{{$category->id}}"> {{ $category->title }}</label>
                                <ul>
                                    @if(count($category->childs))
                                        @include('product.cat_checkbox',['childs' => $category->childs, 'productCategories' => $product->categories])
                                    @endif
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>


                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection
