<div class="p-3">
    <h4 class="font-italic">Archives</h4>
    <ol class="list-unstyled mb-0">
    @foreach($archives as $stats)
            <li><a href="/posts/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
                    {{ $stats['month'].' '. $stats['year'] }}</a>
            </li>
     @endforeach

    </ol>
</div>


<div class="p-3">
    <h4 class="font-italic">Tags</h4>
    <ol class="list-unstyled mb-0">
        @foreach($tags as $tag)
            <li><a href="/posts/tags/{{ $tag }}">{{ $tag }}</a>
            </li>
        @endforeach

    </ol>
</div>