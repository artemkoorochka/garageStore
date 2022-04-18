<ul>
    @foreach($childs as $child)
        <li>
            <div class="d-flex mb-1">
                <div class="mx-1">{{ $child->title }}</div>
                <div class="mx-1"><a class="btn btn-sm btn-outline-primary" href="{{route('categories.edit', $child->id)}}">Edit</a></div>
                <form method="post" action="{{route('categories.destroy', $child->id)}}" class="mx-1">
                    @csrf
                    @method("DELETE")
                    <input type="submit" class="btn btn-sm btn-outline-danger" value="Delete">
                </form>
            </div>

            @if(count($child->childs))
                @include('category.manageChild',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
