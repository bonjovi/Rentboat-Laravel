<ul class="menu">
    @foreach($items as $menu_item)
        <li><a href="{{ Config::get('app.locale') }}{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
    @endforeach
</ul>