@extends("template")

@section("title")
    Catalog Sections
@endsection

@section("content")

<div class="row">
    <div class="col-md-6">
        <h5 class="alert alert-warning">Add New Menu</h5>
        <form accept="{{ route('categories.update', $category['id'])}}" method="post">
            @csrf
            @method('patch')
            @if(count($errors) > 0)
                <div class="alert alert-danger  alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    @foreach($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text"
                               name="title"
                               value="{{old('title', $category['title'])}}"
                               class="form-control">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label>Parent</label>
                        <select class="form-control" name="parent_id">
                            <option selected disabled>Select Parent Menu</option>
                            @foreach($allMenus as $key => $value)
                                <option
                                        @if($key == $category['parent_id'])
                                            selected
                                        @endif
                                        value="{{ $key }}">{{ $value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Update">
        </form>
    </div>
    <div class="col-md-6">
        <h5 class="alert alert-warning">Menu List</h5>
        <ul id="tree1">
            @foreach($menus as $menu)
                <li>
                    <div class="d-flex mb-1">
                        <div class="mx-1">{{ $menu->title }}</div>
                        <div class="mx-1"><a class="btn btn-sm btn-outline-primary" href="{{route('categories.edit', $menu->id)}}">Edit</a></div>
                        <form method="post" action="{{route('categories.destroy', $menu->id)}}" class="mx-1">
                            @csrf
                            @method("DELETE")
                            <input type="submit" class="btn btn-sm btn-outline-danger" value="Delete">
                        </form>
                    </div>
                    @if(count($menu->childs))
                        @include('category.manageChild',['childs' => $menu->childs])
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection
