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
            <form action="{{ route('blog.search') }}" method="GET">
                @csrf
                <input type="text" class="blog-search" placeholder="Начните поиск по названию" name="query" value="{{ request()->input('query') }}">
            </form>
            <div class="blog-tags">
                @php
                //dd($tags);
                @endphp
                @foreach($tags as $tag)
                    @php
                        if(isset($currenttag) && $currenttag == json_decode($tag->name)->ru) {
                            $class = 'active';
                        } else {
                            $class = '';
                        }
                    @endphp
                    <a href="/blog/tag/{{ json_decode($tag->name)->ru }}" class="{{ $class }}">#{{ json_decode($tag->name)->ru }}</a>
                @endforeach
            </div>
            <div class="blog-content">

                    <div class="blog-top flex">
                        @php
                            //dd($posts);
                        @endphp
                        @foreach($posts as $post)
                            <div class="main-news" style="background-image: url(/storage/{{ $post->image }});">
                                <div class="main-news-shadow"></div>
                                <div class="main-news-caption">
                                    <span class="label">популярно</span>
                                    <h4><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                    <p>Какой то краткий текст о том почему нужно выбирать себе яхту для путешествия и какой то текст еще</p>
                                    <div class="left flex">
                                        <img src="img/comment2.png" alt=""><span class="comm">26</span>
                                        2 дня назад
                                    </div>
                                </div>
                            </div>
                            @break
                        @endforeach

                        <div class="right">
                            @php
                                unset($posts[0]);
                            @endphp

                            @foreach($posts as $post)
                                <div class="news-item">
                                    <span class="label">21 сентября, 2020</span>
                                    <div class="news-item-img"><img src="img/news.jpg" alt=""></div>
                                    <div class="news-item-caption">
                                        <h4><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        <p>Какой то краткий текст о том почему нужно выбирать себе яхту для путешествия</p>
                                    </div>
                                </div>
                                @break
                            @endforeach

                            @php
                                unset($posts[1]);
                            @endphp

                            @foreach($posts as $post)
                                <div class="news-item">
                                    <span class="label">21 сентября, 2020</span>
                                    <div class="news-item-img"><img src="img/news.jpg" alt=""></div>
                                    <div class="news-item-caption">
                                        <h4><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h4>
                                        <p>Какой то краткий текст о том почему нужно выбирать себе яхту для путешествия</p>
                                    </div>
                                </div>
                                @break
                            @endforeach

                            @php
                                unset($posts[2]);
                            @endphp
                        </div>
                    </div>

                <div class="blog-row">
                    @foreach($posts as $post)
                        <div class="col">
                            <div class="news-item">
                                <span class="label">21 сентября, 2020</span>
                                <div class="news-item-img"><img src="img/news.jpg" alt=""></div>
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