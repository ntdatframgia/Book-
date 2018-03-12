    <option value="0">Please Select Category </option>
    @if (count($categories) > 0)
        @foreach ($categories as $category)
            @include('categoryRecursion', ['category' => $category, 'char' => ''])
        @endforeach
    @endif