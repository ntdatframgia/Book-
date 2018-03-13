@foreach ($categories as $category)
    @if( $category['parent_id'] == $parent_id)  
        <tr>
            <td>
                {{ $stt++ }}
            </td>
            <td>
                @if($char == "")           
                <strong>{{ $char . $category->name }}</strong>    
                @else
                {{ $char . $category->name }}
                @endif    
            </td>
            <td>
                {{ $category->created_at->diffForHumans() }}
            </td>
            <td>
                {{ $category->updated_at->diffForHumans() }}
            </td>
            <td>
                    <a class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn  btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>
            </td>
        </tr>
        
        @include('gridCategory', ['categories' => $category['childrenRecursion'], 'char' => $char . '-- ', 'stt' => $stt, 'parent_id' => $category['id']])
    @endif
@endforeach