<div class="nav-scroller py-1 mb-2 ">
    <nav class="nav d-flex justify-content-between text-right" style="background-color:lightblue">

        <a class="p-2 text-muted" href="#">Home</a>
        <a class="p-2 text-muted" href="#">New Features</a>
        <a class="p-2 text-muted" href="#">Press</a>
        <a class="p-2 text-muted" href="#">new hires</a>
        <a class="p-2 text-muted" href="#">About</a>
        <a class="p-2 text-muted" href="#">Travel</a>

        @if(Auth::check())

        <a class="p-2 text-muted" href="#">{{ Auth::user()->name }}</a>

        @endif

    </nav>
</div>