@foreach($childs as $child)
    <li><a href="#">{{ $child->title }}</a>
        @if(count($child->childs))
            <ul>
                @include('category.menusub',['childs' => $child->childs])
            </ul>
        @endif
    </li>
@endforeach
