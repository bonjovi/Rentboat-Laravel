@extends('master')
@section('content')
    <div class="breadcrumb-block post-breadcrumb">
        <div class="container">
            <ul class="breadcrumb flex">
                <li><a href="#">ГЛАВНАЯ</a></li>
                <li><a href="#">BLOG</a></li>
                <li><span>SINGLE POST</span></li>
            </ul>

            <h1>{{ $post->title }}</h1>

            @php

            @endphp
            <div class="blog-tags">
                @foreach($tags as $tag)
                    <a href="/blog/tag/{{ json_decode($tag->name)->ru }}">#{{ json_decode($tag->name)->ru }}</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="post">
        <div class="container">
            <div class="post-info flex">
                <div class="post-info-date"><span>Опубликовано:</span> {{ Date::parse($post->created_at)->format('j F Y г.') }}</div>
                <div class="post-info-user">{{ $post->user_name }}</div>
                <div class="post-info-comment">26</div>
                <a href="#share-modal" class="post-info-share">Поделиться статьей</a>
            </div>
        </div>

        <div class="post-content">
            <div class="container">
                <div class="left-text">
                    {!!  $post->body !!}

                    <div class="left-text-img">
                        <img src="img/post-bg.jpg" alt="">
                    </div>
                </div>

                <!--<div class="img-block flex">
                    <div class="left">
                        <img src="img/post-photo.jpg" alt="">
                    </div>
                    <div class="right">
                        <h2 class="block-title">заголовок (h2)</h2>
                        <p>
                            Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.
                        </p>
                    </div>
                </div>

                <h2 class="block-title">заголовок (h2)</h2>

                <p>
                    Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.
                </p>
                <p>
                    Поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.
                </p>-->

                <div class="post-content-gallery flex">
                    <img src="img/Photo.jpg" alt="">
                    <img src="img/Photo-1.jpg" alt="">
                    <img src="img/Photo-2.jpg" alt="">
                </div>

                <div class="blog-tags">
                    @foreach($tags as $tag)
                        <a href="/blog/tag/{{ json_decode($tag->name)->ru }}">#{{ json_decode($tag->name)->ru }}</a>
                    @endforeach
                </div>

                <div class="post-bottom">
                    <div class="post-info flex">
                        <div class="post-info-date"><span>Опубликовано:</span> {{ Date::parse($post->created_at)->format('j F Y г.') }}</div>
                        <div class="post-info-user">{{ $post->user_name }}</div>
                        <div class="post-info-comment">26</div>
                        <a href="#share-modal" class="post-info-share">Поделиться статьей</a>
                    </div>
                </div>

                <div class="comments">
                    <h2 class="block-title">Комментарии поста <span>(26)</span></h2>
                    <div class="comment-form">
                        <div class="rating-flex">
                            <span>Ваша общая оценка:</span>
                            <div class="rating-area">
                                <input type="radio" id="star-5" name="rating" value="5">
                                <label for="star-5" title="Оценка «5»"></label>
                                <input type="radio" id="star-4" name="rating" value="4">
                                <label for="star-4" title="Оценка «4»"></label>
                                <input type="radio" id="star-3" name="rating" value="3">
                                <label for="star-3" title="Оценка «3»"></label>
                                <input type="radio" id="star-2" name="rating" value="2">
                                <label for="star-2" title="Оценка «2»"></label>
                                <input type="radio" id="star-1" name="rating" value="1">
                                <label for="star-1" title="Оценка «1»"></label>
                            </div>
                        </div>
                        <textarea placeholder="Напишите Ваш комментарий"></textarea>
                        <a href="#add-success-modal2" class="btn">комментировать</a>
                    </div>

                    <div class="comments-block">
                        <div class="comment-item flex">
                            <div class="comment-item-img">
                                <img src="img/review-author.png" alt="">
                            </div>
                            <div class="comment-item-info">
                                <h4>Александра Костылева <span>21 сентября, 2019</span></h4>
                                <p>Провели с друзьями незабываемый отдых на яхте. Спасибо сервису Rent Boat за предоставленную возможность легко и просто арендовать яхту на свой вкус и возможный бюджет. Особенно понравился капитан данной яхты. Очень добрый и приятный парень! Возил аккуратно, шампанское не разлили :))) Так же удобно забронировать яхту будучи в другом городе. Спасибо еще раз, было шикарно!</p>
                            </div>
                        </div>
                        <div class="comment-item flex">
                            <div class="comment-item-img">
                                <img src="img/review-author.png" alt="">
                            </div>
                            <div class="comment-item-info">
                                <h4>Александра Костылева <span>21 сентября, 2019</span></h4>
                                <p>Провели с друзьями незабываемый отдых на яхте. Спасибо сервису Rent Boat за предоставленную возможность легко и просто арендовать яхту на свой вкус и возможный бюджет. Особенно понравился капитан данной яхты. Очень добрый и приятный парень! Возил аккуратно, шампанское не разлили :))) Так же удобно забронировать яхту будучи в другом городе. Спасибо еще раз, было шикарно!</p>
                            </div>
                        </div>
                        <div class="comment-item flex">
                            <div class="comment-item-img">
                                <img src="img/review-author.png" alt="">
                            </div>
                            <div class="comment-item-info">
                                <h4>Александра Костылева <span>21 сентября, 2019</span></h4>
                                <p>Провели с друзьями незабываемый отдых на яхте. Спасибо сервису Rent Boat за предоставленную возможность легко и просто арендовать яхту на свой вкус и возможный бюджет. Особенно понравился капитан данной яхты. Очень добрый и приятный парень! Возил аккуратно, шампанское не разлили :))) Так же удобно забронировать яхту будучи в другом городе. Спасибо еще раз, было шикарно!</p>
                            </div>
                        </div>
                        <div class="comment-item flex">
                            <div class="comment-item-img">
                                <img src="img/review-author.png" alt="">
                            </div>
                            <div class="comment-item-info">
                                <h4>Александра Костылева <span>21 сентября, 2019</span></h4>
                                <p>Провели с друзьями незабываемый отдых на яхте. Спасибо сервису Rent Boat за предоставленную возможность легко и просто арендовать яхту на свой вкус и возможный бюджет. Особенно понравился капитан данной яхты. Очень добрый и приятный парень! Возил аккуратно, шампанское не разлили :))) Так же удобно забронировать яхту будучи в другом городе. Спасибо еще раз, было шикарно!</p>
                            </div>
                        </div>
                        <div class="comment-item flex">
                            <div class="comment-item-img">
                                <img src="img/review-author.png" alt="">
                            </div>
                            <div class="comment-item-info">
                                <h4>Александра Костылева <span>21 сентября, 2019</span></h4>
                                <p>Провели с друзьями незабываемый отдых на яхте. Спасибо сервису Rent Boat за предоставленную возможность легко и просто арендовать яхту на свой вкус и возможный бюджет. Особенно понравился капитан данной яхты. Очень добрый и приятный парень! Возил аккуратно, шампанское не разлили :))) Так же удобно забронировать яхту будучи в другом городе. Спасибо еще раз, было шикарно!</p>
                            </div>
                        </div>
                        <div class="comment-item flex">
                            <div class="comment-item-img">
                                <img src="img/review-author.png" alt="">
                            </div>
                            <div class="comment-item-info">
                                <h4>Александра Костылева <span>21 сентября, 2019</span></h4>
                                <p>Провели с друзьями незабываемый отдых на яхте. Спасибо сервису Rent Boat за предоставленную возможность легко и просто арендовать яхту на свой вкус и возможный бюджет. Особенно понравился капитан данной яхты. Очень добрый и приятный парень! Возил аккуратно, шампанское не разлили :))) Так же удобно забронировать яхту будучи в другом городе. Спасибо еще раз, было шикарно!</p>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="comments-more">
                        <span>Показать еще комментарии</span>
                    </a>
                </div>

            </div>
        </div>


    </div>
@endsection