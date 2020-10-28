@extends('master')
@section('content')
    <div class="breadcrumb-block">
        <div class="container">
            <ul class="breadcrumb flex">
                <li><a href="#">ГЛАВНАЯ</a></li>
                <li><span>BLOG</span></li>
            </ul>

            <h2 class="title">useful BLOG</h2>

            <ul class="breadcrumb-menu flex">
                <li class="active"><a href="#">All boats</a></li>
                <li><a href="#">Sailboat</a></li>
                <li><a href="#">Motorboat</a></li>
                <li><a href="#">Catamaran</a></li>
            </ul>
        </div>
    </div>

    <div class="blog">
        <div class="container">
            @php
            //dd($posts);
            @endphp
            <form action="{{ route('blog.search') }}" method="GET">
                @csrf
                <input type="text" class="blog-search" placeholder="Начните поиск по названию" name="query" value="{{ request()->input('query') }}">
            </form>

            <div class="blog-content">
                <h1>Результаты поиска по запросу "{{ request()->input('query') }}"</h1>
                <br><br>
                <div class="blog-row">
                    @if(count($posts) == 0)
                        <p style="padding-left:10px;">Ничего не найдено</p>
                    @endif
                    @foreach($posts as $post)
                        <div class="col">
                            <div class="news-item">
                                <span class="label">21 сентября, 2020</span>
                                <div class="news-item-img"><img src="/storage/{{ $post->image }}" alt=""></div>
                                <div class="news-item-caption">
                                    <h4><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                    <p>Какой то краткий текст о том почему нужно выбирать себе яхту для путешествия</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!--<ul class="pagination">
                    <li class="prev"><a href="#"></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="next"><a href="#"></a></li>
                </ul>-->
            </div>
        </div>
    </div>
@endsection