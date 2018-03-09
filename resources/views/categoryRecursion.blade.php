<option value="{{ $category['id'] }}">{{ $char  .$category['name'] }}</option>
    @if( count($category['childrenRecursion']) > 0 )        
        @foreach ($category['childrenRecursion'] as $category)
            @include('categoryRecursion', ['category' => $category, 'char' => $char.='-- '])
        @endforeach
    @endif    

