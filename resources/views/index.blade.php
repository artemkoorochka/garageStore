@extends("template")

@section("title")
    Catalog
@endsection

@section("content")
    <div class="row">
        <div class="col-3">
            <div class="list-group">
                <div class="list-group-item list-group-item-action bg-warning">Products list</div>
                <a href="{{route('admin.create')}}" class="list-group-item list-group-item-action">Add new product</a>
            </div>
        </div>
        <div class="col-9">
            <table class="table">
                <thead class="bg-warning">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>
                            <div class="mb-2 h4">{{$product->name}}</div>
                            <div>
                                <a href="{{route('admin.edit', $product)}}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                            </div>
                        </td>
                        <td class="h2">{{$product->price}} {{$product->currency}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
