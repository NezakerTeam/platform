<td>
    @if( isset($entry->{$column['name']}) )
    <iframe width="266" height="150" 
            src="https://www.youtube.com/embed/{{ $entry->{$column['name']} }}" 
            frameborder="0" allowfullscreen></iframe>
    @endif
</td>
