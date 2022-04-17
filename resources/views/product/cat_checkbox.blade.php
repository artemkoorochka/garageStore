@foreach($childs as $child)
    <li>
        <label><input type="checkbox"
                      name="category[]"
                      @if(is_array(old('category')) && in_array($child->id, old('category')))
                          checked
                      @endif
                      @isset($productCategories)
                          @foreach($productCategories as $productCategory)
                              @if($productCategory->id == $child->id)
                                  checked
                              @endif
                          @endforeach
                      @endisset
                      value="{{$child->id}}"> {{ $child->title }}</label>
        @if(!empty($child->childs))
            <ul>
                @include('product.cat_checkbox',['childs' => $child->childs])
            </ul>
        @endif
    </li>
@endforeach
