@extends("template")

@section("title")
    Catalog
@endsection

@section("content")
    <div class="row">
        <div class="col-lg-3 mb-3">
            <div class="list-group">
                <div class="list-group-item list-group-item-action bg-warning">Products list</div>
                <a href="{{route('products.create')}}" class="list-group-item list-group-item-action">Add new product</a>
            </div>
        </div>
        <div class="col-lg-9 mb-3">
            {{$products->links()}}
            <table class="table table-responsive-sm">
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
                            <div class="mb-2 h4"><a href="{{route('products.edit', $product->id)}}">{{$product->name}}</a></div>
                            <form method="post" action="{{route('products.destroy', $product->id)}}" class="pl-2">
                                @csrf
                                @method("DELETE")
                                <a href="{{route('products.edit', $product->id)}}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <input type="submit" class="btn btn-sm btn-outline-danger" value="Delete">
                            </form>
                        </td>
                        <td class="h2">{{$product->price}} {{$product->currency}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-3">{{$products->links()}}</div>
        </div>
    </div>
@endsection
