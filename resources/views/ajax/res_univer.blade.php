<ul class="todo-list">
    @foreach ($results as $res)
        <li>
            <span class="handle">
                <img src="/img/book.png" alt="">
            </span>
        <a href="{{$res->result }}"><span class="text">{{ $res->{'title_'.\App::getLocale()} }}</span></a>
            <small >
            <img class="ext" src="/img/word.jpg" alt="">
            </small>
            
        </li>
    @endforeach
</ul>