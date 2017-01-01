{{-- regular object attribute --}}
<td>
    <a href="{{ $entry->{$column['name']} }}" >
        {{ str_limit(strip_tags($entry->{$column['name']}), 80, "[...]") }}
    </a>
</td>
