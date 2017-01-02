{{-- regular object attribute --}}
@if(is_array($entry->{$column['name']}))

@include('crud::columns.array')

@else

<td>{{ str_limit(strip_tags($entry->{$column['name']}), 80, "[...]") }}</td>

@endif
