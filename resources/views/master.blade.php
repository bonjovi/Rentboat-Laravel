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
	@if ($message = Session::get('success'))
		{{ $message }}
    @endif
	<header class="main-header">
		<div class="top">
			<div class="mob-menu ">
				<div class="container">
					<ul class="menu">
						<li><a href="#">Каталог</a></li>
						<li><a href="#">Карточка товара</a></li>
						<li><a href="#">Пункт меню 3</a></li>
					</ul>
					<ul>
						<li><a href="/catalog/type/saleboat">Sailboat</a></li>
						<li><a href="/catalog/type/motorboat">Motorboat</a></li>
						<li><a href="/catalog/type/catamaran">Catamaran</a></li>
					</ul>
					<a href="#add-modal" class="add-boat">Добавить лодку</a>
					<a href="#arenda-modal" class="rent-boat btn">Арендовать лодку</a>
					<a href="tel:+7 (495)-437-21-20" class="top-phone">+7 (495)-437-21-20</a>
					<div class="top-language">
						<a href="#" class="dropdown-toggle"><img class="lazyload" data-src="/img/russia.png" alt=""></a>
						<ul class="dropdown">
							<li><a href="#"><img class="lazyload" data-src="/img/russia.png" alt=""></a></li>
							<li><a href="#"><img class="lazyload" data-src="/img/united-states-of-america.png" alt=""></a></li>
							<li><a href="#"><img class="lazyload" data-src="/img/spain.png" alt=""></a></li>
						</ul>
					</div>
					<div class="top-currency">
						<a href="#" class="dropdown-toggle">USD</a>
						<ul class="dropdown">
							<li><a href="#">USD</a></li>
							<li><a href="#">EUR</a></li>
							<li><a href="#">RUB</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="container flex">
				<div class="logo">
					<a href="/"><img class="lazyload" data-src="/img/logo.png" alt=""></a>
				</div>
				<div class="top-catalog">
					<a href="#" class="dropdown-toggle">каталог лодок</a>
					<ul class="dropdown">
						<li><a href="/catalog/type/saleboat">Sailboat</a></li>
						<li><a href="/catalog/type/motorboat">Motorboat</a></li>
						<li><a href="/catalog/type/catamaran">Catamaran</a></li>
					</ul>
				</div>
				<a href="#add-modal" class="add-boat">Добавить лодку</a>
				<a href="#arenda-modal" class="rent-boat btn">Арендовать лодку</a>
				<a href="tel:+7 (495)-437-21-20" class="top-phone">+7 (495)-437-21-20</a>
				<div class="search">
					<a href="#"></a>
					<div class="search-group flex">
						<form action="{{ route('boats.search') }}" method="GET">
							@csrf
							<input type="text" placeholder="Начать поиск ..." name="query">
							<button type="button">найти</button>
						</form>
					</div>
				</div>
				@if(Auth::user())
					<a href="{{ route('account.edit') }}" class="top-user auth-login-link"></a>
				@else
					<a href="#reg-modal" class="top-user"></a>
				@endif
				<div class="top-language">
					<a href="#" class="dropdown-toggle"><img class="lazyload" data-src="/img/russia.png" alt=""></a>
					<ul class="dropdown">
						<li><a href="#"><img class="lazyload" data-src="/img/russia.png" alt=""></a></li>
						<li><a href="#"><img class="lazyload" data-src="/img/united-states-of-america.png" alt=""></a></li>
						<li><a href="#"><img class="lazyload" data-src="/img/spain.png" alt=""></a></li>
					</ul>
				</div>
				<div class="top-currency">
					<a href="#" class="dropdown-toggle">USD</a>
					<ul class="dropdown">
						<li><a href="#">USD</a></li>
						<li><a href="#">EUR</a></li>
						<li><a href="#">RUB</a></li>
					</ul>
				</div>
				<a href="#" class="top-wishlist">
					<span>2</span>
				</a>
				<a href="#" class="top-menu"></a>
			</div>
        </div>
        @if(isset($mainpage))
        <div class="container">
            <div class="header-caption">
                <h1>проведи свои выходные на яхте</h1>
                <ul>
                    <li>30,000 boats</li>
                    <li>Hourly, Daily, Weekly</li>
                    <li>Captain optional</li>
                </ul>
            </div>

            <div class="header-bottom flex">
                <div class="left">
                    <h2>быстрый подбор Лодки</h2>
					<form action="{{ route('boats.index') }}" method="GET">
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
					<address>70 Bowman St. South Windsor, CT 06074</address>
					<span>Позвоните нам</span>
					<a href="tel:+7 (495)-437-21-20">+7 (495)-437-21-20</a>
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
						<li><a href="#">Главная</a></li>
						<li><a href="#">Аренда яхты</a></li>
						<li><a href="#">Популярные предложения</a></li>
						<li><a href="#">Помощь</a></li>
						<li><a href="{{ route('blog.posts') }}">Блог</a></li>
						<li><a href="#">Отзывы</a></li>
						<li><a href="#">Контакты</a></li>
					</ul>
				</div>
				<div class="footer-btn">
					<a href="#arenda-modal" class="rent-btn btn">Арендовать лодку</a>
					<a href="#add-modal" class="add-boat">Добавить лодку</a>
					<div class="footer-ratings">
						<h4>отзывы клиентов</h4>
						<div class="flex-stars">
							<img class="lazyload" data-src="/img/star.png" alt="">
							<img class="lazyload" data-src="/img/star.png" alt="">
							<img class="lazyload" data-src="/img/star.png" alt="">
							<img class="lazyload" data-src="/img/star.png" alt="">
							<img class="lazyload" data-src="/img/star.png" alt="">
						</div>
						<p>Рейтинг 4.7 / 5 рассчитан среди 95315 отзывов</p>
					</div>
				</div>
			</div>

			<div class="footer-center flex">
				<div class="footer-language">
					<a href="#" class="dropdown-toggle"><img class="lazyload" data-src="/img/russia.png" alt=""> Русский (RU)</a>
					<ul class="dropdown">
						<li><a href="#"><img class="lazyload" data-src="/img/russia.png" alt=""> Русский (RU)</a></li>
						<li><a href="#"><img class="lazyload" data-src="/img/united-states-of-america.png" alt=""> English (US)</a></li>
						<li><a href="#"><img class="lazyload" data-src="/img/spain.png" alt=""> Spain (ESP)</a></li>
					</ul>
				</div>

				<a href="mailto:test@mail.ru" class="footer-mail">Написать нам</a>

				<div class="footer-social flex">
					<a href="#" class="footer-social-vk"></a>
					<a href="#" class="footer-social-fb"></a>
					<a href="#" class="footer-social-in"></a>
					<a href="#" class="footer-social-tw"></a>
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

		<form method="POST" action="{{ route('register') }}" id="register_form">
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
		<form method="POST" action="{{ route('login') }}">
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

	<div id="arenda-modal" class="modal mfp-hide arenda-modal">
		<h2>быстрый подбор Лодки</h2>
		<form action="{{ route('boats.index') }}" method="GET">
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
		<form action="{{ route('boats.store') }}" method="POST" id="boat-adding-form" enctype="multipart/form-data">
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
							</div>
							<div class="add-form-main flex">
								<h4>Общая информация</h4>
								<input type="text" placeholder="Заголовок" name="addboat_name">

								<input type="text" placeholder="Страна" class="half" name="addboat_country">
								<input type="text" placeholder="Город" class="half" name="addboat_city">

							</div>
							<div class="add-form-info flex">
								<h4>Информация о лодке</h4>
								<select class="half" name="addboat_type">
									<option disabled selected>Тип лодки</option>
									<option value="1">Saleboat</option>
									<option value="2">Motorboat</option>
									<option value="3">Catamaran</option>
								</select>
								<select class="half" name="addboat_year">
									<option value="Год выпуска лодки" disabled selected>Год выпуска лодки</option>
									<option value="1995">1995</option>
									<option value="2000">2000</option>
									<option value="2010">2010</option>
								</select>
								<input type="text" placeholder="Размер яхты в футах" class="half" name="addboat_size">
								<select class="half" name="addboat_guests_qty">
									<option disabled selected>Общее Кол-во гостей</option>
									<option value="10">10</option>
									<option value="20">20</option>
									<option value="30">30</option>
								</select>
								<select class="third" name="addboat_bedrooms_qty">
									<option disabled selected>Кол-во спален</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
								<select class="third" name="addboat_sleepers_qty">
									<option disabled selected>Спальные места</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
								<select class="third" name="addboat_showers_qty">
									<option disabled selected>Кол-во душевых</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
								<label>
									<input type="checkbox" name="with_capitan">
									<span></span>With captain
								</label>
								<label>
									<input type="checkbox" name="instant_confirmation">
									<span></span>Instant Confirmation
								</label>
								<label>
									<input type="checkbox" name="fuel_included">
									<span></span>Топливо включено
								</label>
							</div>

							<div class="add-form-bottom flex">
								<h4>Текстовое описание</h4>
								<textarea placeholder="Опишите свою лодку в свободной форме" name="addboat_description"></textarea>
							</div>

							<div class="add-form-tags">
								<h4>Дополнительно входит в аренду</h4>
								<div class="flex">
									<p>Autopilot <a href="#"></a></p>
									<p>Radar <a href="#"></a></p>
									<p>Sonar <a href="#"></a></p>
									<p>Tender/Dinghy <a href="#"></a></p>
									<p>Depth finder <a href="#"></a></p>
									<p>Fish finder <a href="#"></a></p>
									<p>Autopilot <a href="#"></a></p>
									<p>Radar <a href="#"></a></p>
									<p>Sona <a href="#"></a></p>
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
							<input type="file" name="mainpic" class="image-upload mainpic" id="image-upload" />
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
								<input type="file" name="image" class="image-upload" id="image-upload6" />
							</div>

							

							<p>загрузить фото</p>
						</div>
						<input type="text" placeholder="Имя и Фамилия">
						<input type="text" placeholder="E-mail">
						<input type="tel" placeholder="Номер телефона">
					</div>

				</div>
			</div>
			<!--<a href="#add-success-modal" class="btn add-success-btn">подать заявку на добавление</a>-->
			<button class="boat-adding-button">подать заявку на добавление</button>
		</form>
	</div>

	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<script type="text/javascript">
		$(document).ready(function() {
			$(".boat-adding-button").click(function(e){
				if ($('input#boat-adding-agree').is(':checked') && $('input#boat-adding-agree-age').is(':checked')) {

				} else {
					e.preventDefault();
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

