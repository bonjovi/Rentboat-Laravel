<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Главная</title>
	<link rel="preload" href="{{ asset('css/jquery.formstyler.css') }}" as="style" onload="this.rel='stylesheet'">
	<link rel="preload" href="{{ asset('css/swiper.css') }}" as="style" onload="this.rel='stylesheet'">
	<link rel="preload" href="{{ asset('css/magnific-popup.css') }}" as="style" onload="this.rel='stylesheet'">
	<link rel="preload" href="{{ asset('css/jquery.flipster.min.css') }}" as="style" onload="this.rel='stylesheet'">
	<link rel="preload" href="{{ asset('css/style.css') }}" as="style" onload="this.rel='stylesheet'">
	<link rel="preload" href="{{ asset('css/custom.css') }}" as="style" onload="this.rel='stylesheet'">
	<script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
	<script src="{{ asset('js/speakingurl.js') }}"></script>
	<script src="{{ asset('js/slugify.min.js') }}"></script>
	
</head>
<body>
	@if (Session::get('message') == 'Лодка была успешно добавлена')
		<script>$(function() {$.magnificPopup.open({items: {src: '#add-success-modal', type: 'inline'}});});</script>
	@endif
{{-- @if ($message = Session::get('success'))
    {{ $message }}
@endif--}}
<header class="main-header">
    <div class="top">
        <div class="mob-menu ">
            <div class="container">
                <!--<ul class="menu">
                    <li><a href="#">Каталог</a></li>
                    <li><a href="#">Карточка товара</a></li>
                    <li><a href="#">Пункт меню 3</a></li>
                </ul>-->
                {{ menu('topmenu', 'custom_topmenu') }}
                <ul>
                    <li><a href="/{{ Config::get('app.locale') }}/catalog/type/saleboat">Sailboat</a></li>
                    <li><a href="/{{ Config::get('app.locale') }}/catalog/type/motorboat">Motorboat</a></li>
                    <li><a href="/{{ Config::get('app.locale') }}/catalog/type/catamaran">Catamaran</a></li>
                </ul>
                <a href="#add-modal" class="add-boat">Добавить лодку</a>
                <a href="#arenda-modal" class="rent-boat btn">Арендовать лодку</a>
                <a href="tel:{{ setting('site.phone') }}" class="top-phone">{{ setting('site.phone') }}</a>
                <div class="top-language">
                    <a href="#" class="dropdown-toggle"><img class="lazyload" data-src="/img/russia.png" alt=""></a>
                    <ul class="dropdown">
                        <li><a href="#"><img class="lazyload" data-src="/img/russia.png" alt=""></a></li>
                        <li><a href="#"><img class="lazyload" data-src="/img/united-states-of-america.png" alt=""></a></li>
                        <li><a href="#"><img class="lazyload" data-src="/img/spain.png" alt=""></a></li>
                    </ul>
                </div>
                <div class="top-currency">
                    <a href="#" class="dropdown-toggle">{{ $currency }}</a>
                    <ul class="dropdown">
                        <li><a href="?currency=USD">USD</a></li>
                        <li><a href="?currency=EUR">EUR</a></li>
                        <li><a href="?currency=RUB">RUB</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container flex">
            <div class="logo">
                <a href="/{{ Config::get('app.locale') }}"><img class="lazyload" data-src="/img/logo.png" alt=""></a>
            </div>
            <div class="top-catalog">
                <a href="#" class="dropdown-toggle">каталог лодок</a>
                <ul class="dropdown">
                    <li><a href="/{{ Config::get('app.locale') }}/catalog/type/saleboat">Sailboat</a></li>
                    <li><a href="/{{ Config::get('app.locale') }}/catalog/type/motorboat">Motorboat</a></li>
                    <li><a href="/{{ Config::get('app.locale') }}/catalog/type/catamaran">Catamaran</a></li>
                </ul>
            </div>
            <a href="#add-modal" class="add-boat">Добавить лодку</a>
            <a href="#arenda-modal" class="rent-boat btn">Арендовать лодку</a>
            <a href="tel:{{ setting('site.phone') }}" class="top-phone">{{ setting('site.phone') }}</a>
            <div class="search">
                <a href="#"></a>
                <div class="search-group flex">
                    <form action="{{ route('boats.search', app()->getLocale()) }}" method="GET">
                        @csrf
                        <input type="text" placeholder="Начать поиск ..." name="query">
                        <button type="button">найти</button>
                    </form>
                </div>
            </div>
            @if(Auth::user())
                <a href="{{ route('account.edit', app()->getLocale()) }}" class="top-user auth-login-link"></a>
            @else
                <a href="#reg-modal" class="top-user"></a>
            @endif
            <div class="top-language">
                <a href="#" class="dropdown-toggle current-language"><img class="lazyload" data-src="/img/russia.png" alt=""></a>
                <ul class="dropdown">
                    <li><a href="#" data-locale="ru"><img class="lazyload" data-src="/img/russia.png" alt=""></a></li>
                    <li><a href="#" data-locale="en"><img class="lazyload" data-src="/img/united-states-of-america.png" alt=""></a></li>
                    <li><a href="#" data-locale="sp"><img class="lazyload" data-src="/img/spain.png" alt=""></a></li>
                </ul>
            </div>
            <script>
                $(function() {
                    var locale = window.location.pathname.substr(1, 2);
                    if(locale == 'ru') {
                        $('.top-language > a img').attr('data-src','/img/russia.png');
                    } else if(locale == 'en') {
                        $('.top-language > a img').attr('data-src','/img/united-states-of-america.png');
                    } else {
                        $('.top-language > a img').attr('data-src','/img/spain.png');
                    }

                    $('.top-language .dropdown a').on('click', function(e) {
                        e.preventDefault();
                        var currentPathname = window.location.pathname.substr(4, window.location.pathname.length);
                        window.location.href = window.location.origin + '/' + $(this).attr('data-locale') + '/' + currentPathname;
                    });
                });
            </script>
            <div class="top-currency">
                <a href="#" class="dropdown-toggle">{{ $currency }}</a>
                <ul class="dropdown">
                    <li><a href="?currency=USD">USD</a></li>
                    <li><a href="?currency=EUR">EUR</a></li>
                    <li><a href="?currency=RUB">RUB</a></li>
                </ul>
            </div>
            <!--<a href="#" class="top-wishlist">
                <span>2</span>
            </a>-->
            <a href="#" class="top-menu"></a>
        </div>
    </div>
    @if(isset($mainpage))
    <div class="container">
        <div class="header-caption">
            {!! setting('site.banner_titles') !!}
        </div>

        <div class="header-bottom flex">
            <div class="left">
                <h2>быстрый подбор Лодки</h2>
                <form action="{{ route('boats.index', app()->getLocale()) }}" method="GET">
                    <input type="text" class="city" placeholder="Местоположение" name="city" value="{{ request()->input('city') }}">
                    <input type="text" onfocus="(this.type='date')" class="date" placeholder="Дата начала" name="date_start" value="{{ request()->input('date_start') }}">
                    <select name="rental_period" id="srok">
                        <option value="Срок аренды" disabled selected>Срок аренды</option>
                        <option value="1 час" <?=(request()->input('rental_period') == '1 час') ? 'selected' : ''?>>1 час</option>
                        <option value="2 часа" <?=(request()->input('rental_period') == '2 часа') ? 'selected' : ''?>>2 часа</option>
                        <option value="6 часов" <?=(request()->input('rental_period') == '6 часов') ? 'selected' : ''?>>6 часов</option>
                        <option value="12 часов" <?=(request()->input('rental_period') == '12 часов') ? 'selected' : ''?>>12 часов</option>
                        <option value="1 день" <?=(request()->input('rental_period') == '1 день') ? 'selected' : ''?>>1 день</option>
                        <option value="2 дня" <?=(request()->input('rental_period') == '2 дня') ? 'selected' : ''?>>2 дня</option>
                        <option value="3 дня" <?=(request()->input('rental_period') == '3 дня') ? 'selected' : ''?>>3 дня</option>
                    </select>
                    <button class="btn">подобрать</button>
                </form>
            </div>
            <div class="right">
                <div class="flex">
                    <div class="header-bottom-item">
                        <div class="header-bottom-item-img"><img class="lazyload" data-src="/img/wallet.png" alt=""></div>
                        <h3>самые Низкие цены</h3>
                    </div>
                    <div class="header-bottom-item">
                        <div class="header-bottom-item-img"><img class="lazyload" data-src="/img/yacht.png" alt=""></div>
                        <h3>Большой выбор стран и лодок</h3>
                    </div>
                    <div class="header-bottom-item">
                        <div class="header-bottom-item-img"><img class="lazyload" data-src="/img/shield.png" alt=""></div>
                        <h3>Безопасные платежи и сделки</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</header>

@yield('content')

<footer>
    <div class="container">
        <div class="footer-top flex">
            <div class="footer-contact">
                <h3>Контактная информация</h3>
                {!! setting('site.address') !!}
                <a href="tel:{{ setting('site.phone') }}">{{ setting('site.phone') }}</a>
            </div>
            <div class="footer-menu">
                <h3>нужна помощь?</h3>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Payment options</a></li>
                    <li><a href="#">Privacy policy</a></li>
                    <li><a href="#">Terms and conditions</a></li>
                </ul>
            </div>
            <div class="footer-tags">
                <h3>Тэги</h3>
                <ul class="flex">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/catalog">Аренда яхты</a></li>
                    <li><a href="/catalog?sorting=top_rated">Популярные предложения</a></li>
                    <li><a href="/faq">Помощь</a></li>
                    <li><a href="{{ route('blog.posts', app()->getLocale()) }}">Блог</a></li>
                    <li><a href="/reviews">Отзывы</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                </ul>
            </div>
            <div class="footer-btn">
                <a href="#arenda-modal" class="rent-btn btn">Арендовать лодку</a>
                <a href="#add-modal" class="add-boat">Добавить лодку</a>
                <div class="footer-ratings">
                    <h4>отзывы клиентов</h4>
                    @php
                        $reviews_sum = 0;
                        foreach($overall_reviews as $review) {
                            $reviews_sum = $reviews_sum + (int)$review->rating;
                        }
                        $reviews_sum = $reviews_sum / count($overall_reviews);
                        $reviews_sum = round($reviews_sum, 1);
                    @endphp
                    <div class="flex-stars">
                        @php
                            $reviews_sum_round = round($reviews_sum, 0);
                            for($i=0; $i < $reviews_sum_round; $i++) {
                                echo "<img class=\"lazyload\" data-src=\"/img/star.png\" alt=\"\">";
                            }
                        @endphp
                    </div>
                    <p>Рейтинг {{ $reviews_sum }} / 5 рассчитан среди {{ count($overall_reviews) }} отзывов</p>
                </div>
            </div>
        </div>

        <div class="footer-center flex">
            <div class="footer-language">
                <a href="#" class="dropdown-toggle"><img class="lazyload" data-src="/img/russia.png" alt="">Русский (RU)</a>
                <ul class="dropdown">
                    <li><a href="#" data-locale="ru"><img class="lazyload" data-src="/img/russia.png" alt="">Русский (RU)</a></li>
                    <li><a href="#" data-locale="en"><img class="lazyload" data-src="/img/united-states-of-america.png" alt="">English (US)</a></li>
                    <li><a href="#" data-locale="sp"><img class="lazyload" data-src="/img/spain.png" alt="">Spain (ESP)</a></li>
                </ul>
            </div>

            <script>
                $(function() {
                    var locale = window.location.pathname.substr(1, 2);
                    if(locale == 'ru') {
                        $('.footer-language > a').html('<img class="lazyload" data-src="/img/russia.png" alt="">Русский (RU)');
                    } else if(locale == 'en') {
                        $('.footer-language > a').html('<img class="lazyload" data-src="/img/united-states-of-america.png" alt="">English (US)');
                    } else {
                        $('.footer-language > a').html('<img class="lazyload" data-src="/img/spain.png" alt="">Spain (ESP)');
                    }

                    $('.footer-language .dropdown a').on('click', function(e) {
                        e.preventDefault();
                        var currentPathname = window.location.pathname.substr(4, window.location.pathname.length);
                        window.location.href = window.location.origin + '/' + $(this).attr('data-locale') + '/' + currentPathname;
                    });
                });
            </script>

            <a href="mailto:test@mail.ru" class="footer-mail">Написать нам</a>

            <div class="footer-social flex">
                {!! setting('site.social_networks') !!}
            </div>
        </div>

        <div class="footer-logo flex">
            <a href="#"><img class="lazyload" data-src="/img/footer-logo.png" alt=""></a>
        </div>

        <div class="footer-bottom">
            <p>© Copyright 2020 by Yawl. All rights reserved.</p>
        </div>
    </div>
</footer>


<div id="reg-modal" class="modal mfp-hide reg-modal">
    <h2>регистрация</h2>
    <p class="title-text">Добро пожаловать в RENTBOAT!</p>
    <a href="#" class="reg-fb"><img class="lazyload" data-src="/img/fb.png" alt="">Регистрация через Facebook</a>
    <a href="#" class="reg-gg"><img class="lazyload" data-src="/img/gg.png" alt="">Регистрация через Google</a>
    <p class="form-before">OR</p>

    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

    <form method="POST" action="{{ route('register', app()->getLocale()) }}" id="register_form">
        @csrf
        <input type="text" placeholder="Имя" id="register_name" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            <script>$(function() {$.magnificPopup.open({items: {src: '#reg-modal', type: 'inline'}});});</script>
        @enderror
        <input type="text" placeholder="Фамилия" id="register_last_name" class="@error('second_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>
        @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            <script>$(function() {$.magnificPopup.open({items: {src: '#reg-modal', type: 'inline'}});});</script>
        @enderror
        <input type="email" placeholder="E-mail" id="register_email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            <script>$(function() {$.magnificPopup.open({items: {src: '#reg-modal', type: 'inline'}});});</script>
        @enderror
        <input type="password" placeholder="Пароль" id="register_password" class="@error('password') is-invalid @enderror" name="password" autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            <script>$(function() {$.magnificPopup.open({items: {src: '#reg-modal', type: 'inline'}});});</script>
        @enderror
        <input type="password" placeholder="Повторите пароль" id="register_password_confirmation" name="password_confirmation" autocomplete="new-password">
        <label class="check">
            <input type="checkbox" id="agree">
            <span></span>
            Я согласен с <a href="#">политикой отмены бронирования</a> и <a href="#">условиями предоставления услуг</a>
        </label>
        <!-- <a href="#success-modal" class="success-btn btn">регистрация</a> -->
        <button class="register-button" style="width:100%;">Регистрация</button>
    </form>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".register-button").click(function(e){
                e.preventDefault();

                if ($('input#agree').is(':checked')) {
                    $('.invalid-feedback').remove();

                    var _token = $("input[name='_token']").val();
                    var name = $("input[name='name']").val();
                    var last_name = $("input[name='last_name']").val();
                    var email = $("input[name='email']").val();
                    var password = $("input[name='password']").val();
                    var password_confirmation = $("input[name='password_confirmation']").val();

                    $.ajax({
                        url: "/register",
                        type:'POST',
                        data: {_token:_token, name:name, last_name:last_name, email:email, password:password, password_confirmation:password_confirmation},
                        success: function(data) {
                            $('.invalid-feedback').remove();

                            if($.isEmptyObject(data.error)){
                                //alert(data.success);
                                //$.magnificPopup.close();
                                //$.magnificPopup.open({items: {src: '#success-modal', type: 'inline'}});
                                window.location.href = window.location.href + '?register=success';
                            }else{
                                printErrorMsg(data.error);
                                console.log(data.error);
                            }
                        },
                        error: function(data) {
                            $('.invalid-feedback').remove();

                            var errors = JSON.parse(data.responseText);

                            $(".print-error-msg").find(".alert ul").html('');
                            $(".print-error-msg").css('display','block');
                            $.each(errors.errors, function(key, value) {
                                $('<span class="invalid-feedback" role="alert"><strong>'+value+'</strong></span>').insertAfter($('input[name="'+key+'"]'));
                            });
                        }
                    });
                } else {
                    $('<span class="invalid-feedback" role="alert"><strong>Для регистрации на нашем сайте Вам необходимо согласиться с политикой отмены бронирования и условиями предоставления услуг</strong></span>').insertAfter($('input#agree').parent());
                }



            });

            function printErrorMsg (msg) {
                $(".print-error-msg").find(".alert ul").html('');
                $(".print-error-msg").css('display','block');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find(".alert ul").append('<li>'+value+'</li>');
                });
            }
        });

    </script>

    <p class="form-bottom">
        Уже есть аккаунт? - <a href="#login-modal" class="login-btn">Войти</a>
    </p>
</div>

<div id="login-modal" class="modal mfp-hide login-modal">
    <h2>вход</h2>
    <p class="title-text">С возвращением в RENTBOAT!</p>
    <a href="#" class="reg-fb"><img class="lazyload" data-src="/img/fb.png" alt="">Регистрация через Facebook</a>
    <a href="#" class="reg-gg"><img class="lazyload" data-src="/img/gg.png" alt="">Регистрация через Google</a>
    <p class="form-before">OR</p>
    <form method="POST" action="{{ route('login', app()->getLocale()) }}">
        @csrf
        <input type="email" placeholder="E-mail" class="modal-input-email @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="password" placeholder="Password" class="modal-input-pass @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label class="check">
            <input type="checkbox" id="agree">
            <span></span>
            Запомнить меня <a href="#">Забыли пароль?</a>
        </label>
        <!-- <a href="#" class="btn">Войти в аккаунт</a> -->
        <button class="btn" style="width:100%;">Войти в аккаунт</button>
    </form>
    <p class="form-bottom">
        Еще нет аккаунта? -<a href="#reg-modal" class="reg-btn">Зарегистрируйстесь</a>
    </p>
</div>

@if(request()->input('register') && request()->input('register') == 'success')
    <script>$(function() {$.magnificPopup.open({items: {src: '#success-modal', type: 'inline'}});});</script>
@endif
<div id="success-modal" class="modal mfp-hide success-modal">
    <div class="modal-img"><img class="lazyload" data-src="/img/logo.png" alt=""></div>
    <h2>СПАСИБО! Ваш аккаунт успешно <br> зарегистрирован!</h2>
    <p class="title-text">Для того, чтобы начать пользоваться аккаунтом, перейдите по ссылке, которую мы отправили на Ваш E-mail <b><a href="mailto:alexander.makedonski@gmail.com">alexander.makedonski@gmail.com</a></b></p>
</div>

<div id="add-success-modal" class="modal mfp-hide success-modal">
    <div class="modal-img"><img class="lazyload" data-src="/img/logo.png" alt=""></div>
    <h2>СПАСИБО! Ваша заявка на добавление <br> лодки принята!</h2>
    <p class="title-text">Ваша заявка находится в обработке. Наш менеджер перезвонит Вам в течении дня с предварительной оценкой возможной стоимости аренды вашей лодки и коммерческим предложением.</p>
</div>

	<div id="add-success-modal2" class="modal mfp-hide success-modal">
		<div class="modal-img"><img class="lazyload" data-src="/img/logo.png" alt=""></div>
		<h2>СПАСИБО! Ваш комментарий <br>отправлен на модерацию!</h2>
	</div>

<div id="arenda-modal" class="modal mfp-hide arenda-modal">
    <h2>быстрый подбор Лодки</h2>
    <form action="{{ route('boats.index', app()->getLocale()) }}" method="GET">
        <input type="text" class="city" placeholder="Местоположение" name="city" value="{{ request()->input('city') }}">
        <input type="text" onfocus="(this.type='date')" class="date" placeholder="Дата начала" name="date_start" value="{{ request()->input('date_start') }}">
        <select name="rental_period" id="srok">
            <option value="Срок аренды" disabled selected>Срок аренды</option>
            <option value="1 час" <?=(request()->input('rental_period') == '1 час') ? 'selected' : ''?>>1 час</option>
            <option value="2 часа" <?=(request()->input('rental_period') == '2 часа') ? 'selected' : ''?>>2 часа</option>
            <option value="6 часов" <?=(request()->input('rental_period') == '6 часов') ? 'selected' : ''?>>6 часов</option>
            <option value="12 часов" <?=(request()->input('rental_period') == '12 часов') ? 'selected' : ''?>>12 часов</option>
            <option value="1 день" <?=(request()->input('rental_period') == '1 день') ? 'selected' : ''?>>1 день</option>
            <option value="2 дня" <?=(request()->input('rental_period') == '2 дня') ? 'selected' : ''?>>2 дня</option>
            <option value="3 дня" <?=(request()->input('rental_period') == '3 дня') ? 'selected' : ''?>>3 дня</option>
        </select>
        <button class="btn">подобрать</button>
    </form>
</div>

<div id="add-modal" class="modal mfp-hide add-modal">
    <form action="{{ route('boats.store', app()->getLocale()) }}" method="POST" id="boat-adding-form" enctype="multipart/form-data">
        @csrf
        <div class="modal-flex flex">
            <div class="modal-left">
                <h2>добавление лодки</h2>

                    <div class="add-form">
                        <div class="add-form-errors">
                            @error('addboat_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_country')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_size')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_quests_qty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_bedrooms_qty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_sleepers_qty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_showers_qty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_description_qty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_mainpic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_owner_avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_owner_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_owner_last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_owner_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror

                            @error('addboat_owner_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <script>$(function() {$.magnificPopup.open({items: {src: '#add-modal', type: 'inline'}});});</script>
                            @enderror
                        </div>
                        <div class="add-form-main flex">
                            <h4>Общая информация</h4>
                            <input type="text" placeholder="Заголовок" name="addboat_name" value="{{ old('addboat_name') }}">
                            <input type="hidden" placeholder="Заголовок" name="addboat_slug" value="{{ old('addboat_slug') }}">

                            <input type="text" placeholder="Страна" class="half" name="addboat_country" value="{{ old('addboat_country') }}">
                            <input type="text" placeholder="Город" class="half" name="addboat_city" value="{{ old('addboat_city') }}">
                            <input type="hidden" placeholder="Заголовок" name="addboat_city_slug" value="{{ old('addboat_city_slug') }}">
                        </div>
                        <div class="add-form-info flex">
                            <h4>Информация о лодке</h4>
                            <select class="half" name="addboat_type">
                                <option value="" disabled selected>Тип лодки</option>
                                <option value="1" @if(old('addboat_type') == '1') selected @endif>Saleboat</option>
                                <option value="2" @if(old('addboat_type') == '2') selected @endif>Motorboat</option>
                                <option value="3" @if(old('addboat_type') == '3') selected @endif>Catamaran</option>
                            </select>
                            <select class="half" name="addboat_year">
                                <option value="" disabled selected>Год выпуска лодки</option>
                                <option value="2008" @if(old('addboat_year') == '2008') selected @endif>2008</option>
                                <option value="2009" @if(old('addboat_year') == '2009') selected @endif>2009</option>
                                <option value="2010" @if(old('addboat_year') == '2010') selected @endif>2010</option>
                            </select>
                            <input type="text" placeholder="Размер яхты в футах" class="half" name="addboat_size" value="{{ old('addboat_size') }}">
                            <select class="half" name="addboat_guests_qty">
                                <option value="Общее Кол-во гостей" disabled selected>Общее Кол-во гостей</option>
                                <option value="10" @if(old('addboat_guests_qty') == '10') selected @endif>10</option>
                                <option value="20" @if(old('addboat_guests_qty') == '20') selected @endif>20</option>
                                <option value="30" @if(old('addboat_guests_qty') == '30') selected @endif>30</option>
                            </select>
                            <select class="third" name="addboat_bedrooms_qty">
                                <option value="" disabled selected>Кол-во спален</option>
                                <option value="1" @if(old('addboat_bedrooms_qty') == '1') selected @endif>1</option>
                                <option value="2" @if(old('addboat_bedrooms_qty') == '2') selected @endif>2</option>
                                <option value="3" @if(old('addboat_bedrooms_qty') == '3') selected @endif>3</option>
                            </select>
                            <select class="third" name="addboat_sleepers_qty">
                                <option disabled selected>Спальные места</option>
                                <option value="1" @if(old('addboat_sleepers_qty') == '1') selected @endif>1</option>
                                <option value="2" @if(old('addboat_sleepers_qty') == '2') selected @endif>2</option>
                                <option value="3" @if(old('addboat_sleepers_qty') == '3') selected @endif>3</option>
                            </select>
                            <select class="third" name="addboat_showers_qty">
                                <option disabled selected>Кол-во душевых</option>
                                <option value="1" @if(old('addboat_showers_qty') == '1') selected @endif>1</option>
                                <option value="2" @if(old('addboat_showers_qty') == '2') selected @endif>2</option>
                                <option value="3" @if(old('addboat_showers_qty') == '3') selected @endif>3</option>
                            </select>
                            <label>
                                <input type="checkbox" name="addboat_with_capitan" @if(old('addboat_with_capitan') == 'on') checked @endif>
                                <span></span>With captain
                            </label>
                            <label>
                                <input type="checkbox" name="addboat_instant_confirmation" @if(old('addboat_instant_confirmation') == 'on') checked @endif>
                                <span></span>Instant Confirmation
                            </label>
                            <label>
                                <input type="checkbox" name="addboat_fuel_included" @if(old('addboat_fuel_included') == 'on') checked @endif>
                                <span></span>Топливо включено
                            </label>
                        </div>

                        <div class="add-form-bottom flex">
                            <h4>Текстовое описание</h4>
                            <textarea placeholder="Опишите свою лодку в свободной форме" name="addboat_description">{{ old('addboat_description') }}</textarea>
                        </div>

                        <div class="add-form-tags">
                            <h4>Дополнительно входит в аренду</h4>
                            <div class="flex">
                               <!--<p>Autopilot <a href="#"></a></p>
                                <p>Radar <a href="#"></a></p>
                                <p>Sonar <a href="#"></a></p>
                                <p>Tender/Dinghy <a href="#"></a></p>
                                <p>Depth finder <a href="#"></a></p>
                                <p>Fish finder <a href="#"></a></p>
                                <p>Autopilot <a href="#"></a></p>
                                <p>Radar <a href="#"></a></p>
                                <p>Sona <a href="#"></a></p>-->
                            </div>
                            <div class="add-items">
                                <input list="add-option-tags" class="data-input">
                                <datalist id="add-option-tags">
                                    <option value="Autopilot"></option>
                                    <option value="Radar"></option>
                                    <option value="Sonar"></option>
                                    <option value="Fish finder"></option>
                                    <option value="Depth finder"></option>
                                </datalist>
                                <button type="button">OK</button>
                            </div>
                            <a href="#" class="add-form-item">Добавить элемент</a>
                        </div>
                        <div class="add-form-labels">
                            <label class="check">
                                <input type="checkbox" id="boat-adding-agree">
                                <span></span>
                                I agree to the <a href="#">Cancellation Policy</a> and <a href="#">Terms of Service</a>
                            </label>
                            <label class="check">
                                <input type="checkbox" id="boat-adding-agree-age">
                                <span></span>
                                I am at least 18 years of age
                            </label>
                        </div>

                    </div>

            </div>
            <div class="modal-right">
                <div class="main-upload-image">
                    <div class="image-preview" id="image-preview">
                        <label for="image-upload" class="image-label" id="image-label"></label>
                        <input type="file" name="addboat_mainpic" class="image-upload mainpic" id="image-upload" />
                    </div>


                </div>

                <div class="upload-images flex">
                    <div class="image-preview" id="image-preview2">
                        <label for="image-upload2" class="image-label" id="image-label2"></label>
                        <input type="file" name="image" class="image-upload" id="image-upload2" />
                    </div>



                    <div class="image-preview" id="image-preview3">
                        <label for="image-upload3" class="image-label" id="image-label3"></label>
                        <input type="file" name="image" class="image-upload" id="image-upload3" />
                    </div>



                    <div class="image-preview" id="image-preview4">
                        <label for="image-upload4" class="image-label" id="image-label4"></label>
                        <input type="file" name="image" class="image-upload" id="image-upload4" />
                    </div>


                </div>

                <div class="upload-docs">
                    <h4>Подтверждение документов</h4>
                    <p>Прикрепите сканы документов на яхту. Наш модератор проверит их и присвоит вашей яхте статус “Проверено”, что значительно увеличит спрос на Вашу лодку</p>
                    <div class="main-upload-image">
                        <div class="image-preview" id="image-preview5">
                            <label for="image-upload5" class="image-label" id="image-label5"></label>
                            <input type="file" name="image" class="image-upload" id="image-upload5" />
                        </div>


                    </div>
                </div>

                <div class="owner-docs">
                    <h4>Владелец лодки</h4>
                    <div class="flex">
                        <div class="image-preview" id="image-preview6">
                            <label for="image-upload6" class="image-label" id="image-label6"></label>
                            <input type="file" name="addboat_owner_avatar" class="image-upload" id="image-upload6" />
                        </div>



                        <p>загрузить фото</p>
                    </div>
                    <input type="text" placeholder="Имя" name="addboat_owner_name">
                    <input type="text" placeholder="Фамилия" name="addboat_owner_last_name">
                    <input type="text" placeholder="E-mail" name="addboat_owner_email">
                    <input type="tel" placeholder="Номер телефона" name="addboat_owner_phone">
                </div>

            </div>
        </div>
        <!--<a href="#add-success-modal" class="btn add-success-btn">подать заявку на добавление</a>-->
        <button class="boat-adding-button">подать заявку на добавление</button>
    </form>
</div>







	<div id="pay-modal" class="modal mfp-hide pay-modal bron-modal add-modal">
		<form>
			<div class="modal-flex flex">
				<div class="modal-left">
					<h2>Оплата бронирования</h2>
					<p>Оплатите заказ банковским переводом, выбрав валюту и указав наши реквизиты</p>
					<div class="pay-modal-currency tabs">
						<ul class="tabs__caption label-flex flex">
							<li class="active">RUB</li>
							<li>USD</li>
							<li>EUR</li>
							<li>GBP</li>
						</ul>
						<div class="tabs__content active">
							<div class="item">
								<span>Получатель</span>
								<p>ООО “Аренда Лодок RENTBOAT”</p>
							</div>
							<div class="item">
								<span>Банк получателя</span>
								<p>Сбербанк</p>
							</div>
							<div class="item">
								<span>Адрес банка</span>
								<p>ул. Новейшая, 35А</p>
							</div>
							<div class="item">
								<span>Swift/Bic</span>
								<p>312431241231</p>
							</div>
							<div class="item">
								<span>Iban</span>
								<p>312431241231</p>
							</div>
							<div class="item">
								<span>Назначение перевода</span>
								<p>Payment for the order #GX5175891</p>
							</div>
						</div>

						<div class="tabs__content">
							<div class="item">
								<span>Получатель0</span>
								<p>ООО “Аренда Лодок RENTBOAT”</p>
							</div>
							<div class="item">
								<span>Банк получателя0</span>
								<p>Сбербанк</p>
							</div>
							<div class="item">
								<span>Адрес банка0</span>
								<p>ул. Новейшая, 35А</p>
							</div>
							<div class="item">
								<span>Swift/Bic</span>
								<p>312431241231</p>
							</div>
							<div class="item">
								<span>Iban</span>
								<p>312431241231</p>
							</div>
							<div class="item">
								<span>Назначение перевода</span>
								<p>Payment for the order #GX5175891</p>
							</div>
						</div>

						<div class="tabs__content">
							<div class="item">
								<span>Получатель8</span>
								<p>ООО “Аренда Лодок RENTBOAT”</p>
							</div>
							<div class="item">
								<span>Банк получателя8</span>
								<p>Сбербанк</p>
							</div>
							<div class="item">
								<span>Адрес банка5</span>
								<p>ул. Новейшая, 35А</p>
							</div>
							<div class="item">
								<span>Swift/Bic</span>
								<p>312431241231</p>
							</div>
							<div class="item">
								<span>Iban</span>
								<p>312431241231</p>
							</div>
							<div class="item">
								<span>Назначение перевода</span>
								<p>Payment for the order #GX5175891</p>
							</div>
						</div>

						<div class="tabs__content">
							<div class="item">
								<span>Получатель7</span>
								<p>ООО “Аренда Лодок RENTBOAT”</p>
							</div>
							<div class="item">
								<span>Банк получателя8</span>
								<p>Сбербанк</p>
							</div>
							<div class="item">
								<span>Адрес банка6</span>
								<p>ул. Новейшая, 35А</p>
							</div>
							<div class="item">
								<span>Swift/Bic</span>
								<p>312431241231</p>
							</div>
							<div class="item">
								<span>Iban</span>
								<p>312431241231</p>
							</div>
							<div class="item">
								<span>Назначение перевода</span>
								<p>Payment for the order #GX5175891</p>
							</div>
						</div>

					</div>
					<div class="bron-full-price">
						<div class="flex">
							<h5>Итоговая сумма перевода:</h5>
							<span>33 899 ₽</span>
						</div>
						<p class="bron-full-text">Выполните банковский перевод на наши реквизиты, после чего нажмите кнопку “Бронирование оплачено”. Наш менеджер проверит выполнение платежа, после чего перезвонит Вам с сообщением о бронировании.</p>
					</div>
				</div>
				<div class="modal-right">
					<div class="product-item-img">
						<img src="img/item.jpg" alt="">
					</div>
					<div class="product-item-caption">
						<span class="product-item-cat">Моторная яхта</span>
						<h4><a href="#">All Inclusive 80ft Luxury Motor <br> Yacht</a></h4>
						<div class="product-item-city">MILAN <span>/ ITALY</span></div>
						<div class="product-owner">
							<div class="product-owner-img"><img src="img/owner.png" alt=""></div>
							<div class="product-owner-info">
								<h4>Alexander Manchadov</h4>
								<p>Владелец лодки</p>
							</div>
						</div>
						<div class="bron">
							<div class="bron-date">
								<span>Вы бронируете</span>
								<h5>21 сентября - 21 ноября</h5>
							</div>
							<div class="product-item-info flex">
								<div>
									<img src="img/people.png" alt=""> <span>Гостей: </span> 6
								</div>
							</div>
							<div class="bron-price">
								<span>Стоимость брони</span>
								<h5>29 899 ₽</h5>
							</div>
							<div class="bron-depo">
								<span>Страховой депозит</span>
								<h5>2 899 ₽</h5>
							</div>
							<div class="bron-items">
								<label>
									<h5>Капитан</h5>
									<span>Да</span>
								</label>
								<label>
									<h5>Топливо</h5>
									<span>Да</span>
								</label>
							</div>
						</div>
						<div class="bron-warning"><span>* Все налоги и сборы включены</span></div>

					</div>
				</div>
			</div>
			<div class="bron-modal-bottom flex">
				<a href="#add-success-modal" class="btn add-success-btn">бронирование оплачено</a>
				<a href="#">Нужна страховка?</a>
			</div>
		</form>
	</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#boat-adding-form input[name='addboat_name']").on('blur', function() {
            $("#boat-adding-form input[name='addboat_slug']").val($.slugify($("#boat-adding-form input[name='addboat_name']").val()));
        });

        $("#boat-adding-form input[name='addboat_city']").on('blur', function() {
            $("#boat-adding-form input[name='addboat_city_slug']").val($.slugify($("#boat-adding-form input[name='addboat_city']").val()));
        });



        $(".boat-adding-button").click(function(e){
            if ($('input#boat-adding-agree').is(':checked') && $('input#boat-adding-agree-age').is(':checked')) {
				$('.invalid-feedback').remove();
            } else {
                e.preventDefault();
				$('.invalid-feedback').remove();
				$('<span class="invalid-feedback" role="alert"><strong>Для регистрации на нашем сайте Вам необходимо согласиться с политикой отмены бронирования и условиями предоставления услуг</strong></span>').insertAfter($('input#boat-adding-agree-age').parent().parent());
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".boat-adding-button1").click(function(e){
            e.preventDefault();

            if ($('input#boat-adding-agree').is(':checked') && $('input#boat-adding-agree-age').is(':checked')) {
                $('.invalid-feedback').remove();

                var fd = new FormData();
                var files = $('.mainpic')[0].files;
                fd.append('file', files[0]);

                var _token = $("#boat-adding-form input[name='_token']").val();
                var name = $("#boat-adding-form input[name='name']").val();
                var slug = $.slugify($("#boat-adding-form input[name='name']").val());
                var description = $("#boat-adding-form textarea[name='description']").val();
                //var mainpic = $("#boat-adding-form input[name='mainpic']").val();
                var mainpic = fd;
                var country = $("#boat-adding-form input[name='country']").val();
                var city = $("#boat-adding-form input[name='city']").val();
                var type = $("#boat-adding-form select[name='type']").val();
                var year = $("#boat-adding-form input[name='year']").val();
                var size = $("#boat-adding-form input[name='size']").val();
                var quests_qty = $("#boat-adding-form select[name='quests_qty']").val();
                var bedrooms_qty = $("#boat-adding-form select[name='bedrooms_qty']").val();
                var sleepers_qty = $("#boat-adding-form select[name='sleepers_qty']").val();
                var showers_qty = $("#boat-adding-form select[name='showers_qty']").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "/catalog/store",
                    type:'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name:name,
                        slug:slug,
                        description:description,
                        mainpic:mainpic,
                        country:country,
                        city:city,
                        type:type,
                        year:year,
                        size:size,
                        quests_qty:quests_qty,
                        bedrooms_qty: bedrooms_qty,
                        sleepers_qty:sleepers_qty,
                        showers_qty:showers_qty
                    },
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(data) {
                        $('.invalid-feedback').remove();

                        if($.isEmptyObject(data.error)){
                            //alert(data.success);
                            //$.magnificPopup.close();
                            //$.magnificPopup.open({items: {src: '#success-modal', type: 'inline'}});
                            //window.location.href = window.location.href + '?register=success';
                        }else{
                            printErrorMsg(data.error);
                            console.log(data.error);
                        }
                    },
                    error: function(data) {
                        $('.invalid-feedback').remove();

                        var errors = JSON.parse(data.responseText);

                        $(".print-error-msg").find(".alert ul").html('');
                        $(".print-error-msg").css('display','block');
                        $.each(errors.errors, function(key, value) {
                            $('<span class="invalid-feedback" role="alert"><strong>'+value+'</strong></span>').appendTo($('.add-form-errors'));
                        });
                    }
                });
            } else {
                $('<span class="invalid-feedback" role="alert"><strong>Для регистрации на нашем сайте Вам необходимо согласиться с политикой отмены бронирования и условиями предоставления услуг</strong></span>').insertAfter($('input#boat-adding-agree-age').parent().parent());
            }



        });

        function printErrorMsg (msg) {
            $(".print-error-msg").find(".alert ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find(".alert ul").append('<li>'+value+'</li>');
            });
        }
    });

</script>

<script>
    $(function() {
        $('#success-modal .mfp-close').on('click', function() {
            var urlparts = window.location.href.split('?');
            window.location.href = urlparts[0];
        });

        $('.auth-login-link').on('click', function() {
            var href = $(this).attr('href');
            window.location.href = href;
        });

    });
</script>

<script src="{{ asset('js/swiper.min.js') }}"></script>
<script src="{{ asset('js/lazysizes.min.js') }}"></script>
<script src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/jquery.uploadPreview.min.js') }}"></script>
<script src="{{ asset('js/jquery.formstyler.min.js') }}"></script>
<script src="{{ asset('js/jquery.flipster.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script>
$(function(){
        $(".flipster").flipster({
            scrollwheel: false
        });
    });
</script>





</body>
</html>

