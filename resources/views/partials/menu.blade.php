<ul class="nav navbar-nav">
    @foreach ($arrElements as $route => $text) 
        <li role="presentation">
            <a href="{{ route($route) }}" @if(Route::is($route)) class="active" @endif>{{$text}}</a>
        </li>
    @endforeach
</ul>

