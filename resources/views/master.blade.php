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
	<script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
	
</head>
<body>

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
						<li><a href="/catalog">Sailboat</a></li>
						<li><a href="/catalog">Motorboat</a></li>
						<li><a href="/catalog">Catamaran</a></li>
					</ul>
					<a href="#add-modal" class="add-boat">Добавить лодку</a>
					<a href="#arenda-modal" class="rent-boat btn">Арендовать лодку</a>
					<a href="tel:+7 (495)-437-21-20" class="top-phone">+7 (495)-437-21-20</a>
					<div class="top-language">
						<a href="#" class="dropdown-toggle"><img class="lazyload" data-src="img/russia.png" alt=""></a>
						<ul class="dropdown">
							<li><a href="#"><img class="lazyload" data-src="img/russia.png" alt=""></a></li>
							<li><a href="#"><img class="lazyload" data-src="img/united-states-of-america.png" alt=""></a></li>
							<li><a href="#"><img class="lazyload" data-src="img/spain.png" alt=""></a></li>
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
					<a href="/"><img class="lazyload" data-src="img/logo.png" alt=""></a>
				</div>
				<div class="top-catalog">
					<a href="#" class="dropdown-toggle">каталог лодок</a>
					<ul class="dropdown">
						<li><a href="/catalog">Sailboat</a></li>
						<li><a href="/catalog">Motorboat</a></li>
						<li><a href="/catalog">Catamaran</a></li>
					</ul>
				</div>
				<a href="#add-modal" class="add-boat">Добавить лодку</a>
				<a href="#arenda-modal" class="rent-boat btn">Арендовать лодку</a>
				<a href="tel:+7 (495)-437-21-20" class="top-phone">+7 (495)-437-21-20</a>
				<div class="search">
					<a href="#"></a>
					<div class="search-group flex">
						<input type="text" placeholder="Начать поиск ...">
						<button type="button">найти</button>
					</div>
				</div>
				<a href="#reg-modal" class="top-user"></a>
				<div class="top-language">
					<a href="#" class="dropdown-toggle"><img class="lazyload" data-src="img/russia.png" alt=""></a>
					<ul class="dropdown">
						<li><a href="#"><img class="lazyload" data-src="img/russia.png" alt=""></a></li>
						<li><a href="#"><img class="lazyload" data-src="img/united-states-of-america.png" alt=""></a></li>
						<li><a href="#"><img class="lazyload" data-src="img/spain.png" alt=""></a></li>
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
                    <input type="text" class="city" placeholder="Местоположение">
                    <input type="text" onfocus="(this.type='date')" class="date" placeholder="Дата начала">
                    <select name="srok" id="srok">
                        <option value="Срок аренды" disabled selected>Срок аренды</option>
                        <option value="1 час">1 час</option>
                        <option value="2 часа">2 часа</option>
                        <option value="6 часов">6 часов</option>
                        <option value="12 часов">12 часов</option>
                        <option value="1 день">1 день</option>
                        <option value="2 дня">2 дня</option>
                        <option value="3 дня">3 дня</option>
                    </select>
                    <button class="btn">подобрать</button>
                </div>
                <div class="right">
                    <div class="flex">
                        <div class="header-bottom-item">
                            <div class="header-bottom-item-img"><img class="lazyload" data-src="img/wallet.png" alt=""></div>
                            <h3>самые Низкие цены</h3>
                        </div>
                        <div class="header-bottom-item">
                            <div class="header-bottom-item-img"><img class="lazyload" data-src="img/yacht.png" alt=""></div>
                            <h3>Большой выбор стран и лодок</h3>
                        </div>
                        <div class="header-bottom-item">
                            <div class="header-bottom-item-img"><img class="lazyload" data-src="img/shield.png" alt=""></div>
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
						<li><a href="#">Блог</a></li>
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
							<img class="lazyload" data-src="img/star.png" alt="">
							<img class="lazyload" data-src="img/star.png" alt="">
							<img class="lazyload" data-src="img/star.png" alt="">
							<img class="lazyload" data-src="img/star.png" alt="">
							<img class="lazyload" data-src="img/star.png" alt="">
						</div>
						<p>Рейтинг 4.7 / 5 рассчитан среди 95315 отзывов</p>
					</div>
				</div>
			</div>

			<div class="footer-center flex">
				<div class="footer-language">
					<a href="#" class="dropdown-toggle"><img class="lazyload" data-src="img/russia.png" alt=""> Русский (RU)</a>
					<ul class="dropdown">
						<li><a href="#"><img class="lazyload" data-src="img/russia.png" alt=""> Русский (RU)</a></li>
						<li><a href="#"><img class="lazyload" data-src="img/united-states-of-america.png" alt=""> English (US)</a></li>
						<li><a href="#"><img class="lazyload" data-src="img/spain.png" alt=""> Spain (ESP)</a></li>
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
				<a href="#"><img class="lazyload" data-src="img/footer-logo.png" alt=""></a>
			</div>

			<div class="footer-bottom">
				<p>© Copyright 2020 by Yawl. All rights reserved.</p>
			</div>
		</div>
	</footer>


	<div id="reg-modal" class="modal mfp-hide reg-modal">
		<h2>регистрация</h2>
		<p class="title-text">Добро пожаловать в RENTBOAT!</p>
		<a href="#" class="reg-fb"><img class="lazyload" data-src="img/fb.png" alt="">Регистрация через Facebook</a>
		<a href="#" class="reg-gg"><img class="lazyload" data-src="img/gg.png" alt="">Регистрация через Google</a>
		<p class="form-before">OR</p>
		<form>
			<input type="text" placeholder="First name">
			<input type="text" placeholder="Second Name">
			<input type="text" placeholder="E-mail">
			<input type="password" placeholder="Password">
			<input type="password" placeholder="Repeat Password">
			<label class="check">
				<input type="checkbox" id="agree">
				<span></span>
				I agree to the <a href="#">Cancellation Policy</a> and <a href="#">Terms of Service</a>
			</label>
			<a href="#success-modal" class="success-btn btn">регистрация</a>
		</form>
		<p class="form-bottom">
			Уже есть аккаунт? - <a href="#login-modal" class="login-btn">Войти</a>
		</p>
	</div>

	<div id="login-modal" class="modal mfp-hide login-modal">
		<h2>вход</h2>
		<p class="title-text">С возвращением в RENTBOAT!</p>
		<a href="#" class="reg-fb"><img class="lazyload" data-src="img/fb.png" alt="">Регистрация через Facebook</a>
		<a href="#" class="reg-gg"><img class="lazyload" data-src="img/gg.png" alt="">Регистрация через Google</a>
		<p class="form-before">OR</p>
		<form>
			<input type="text" placeholder="E-mail" class="modal-input-email">
			<input type="password" placeholder="Password" class="modal-input-pass">
			<label class="check">
				<input type="checkbox" id="agree">
				<span></span>
				Запомнить меня <a href="#">Забыли пароль?</a>
			</label>
			<a href="#" class="btn">Войти в аккаунт</a>
		</form>
		<p class="form-bottom">
			Еще нет аккаунта? -<a href="#reg-modal" class="reg-btn">Зарегистрируйстесь</a>
		</p>
	</div>

	<div id="success-modal" class="modal mfp-hide success-modal">
		<div class="modal-img"><img class="lazyload" data-src="img/logo.png" alt=""></div>
		<h2>СПАСИБО! Ваш аккаунт успешно <br> зарегистрирован!</h2>
		<p class="title-text">Для того, чтобы начать пользоваться аккаунтом, перейдите по ссылке, которую мы отправили на Ваш E-mail <b><a href="mailto:alexander.makedonski@gmail.com">alexander.makedonski@gmail.com</a></b></p>
	</div>

	<div id="add-success-modal" class="modal mfp-hide success-modal">
		<div class="modal-img"><img class="lazyload" data-src="img/logo.png" alt=""></div>
		<h2>СПАСИБО! Ваша заявка на добавление <br> лодки принята!</h2>
		<p class="title-text">Ваша заявка находится в обработке. Наш менеджер перезвонит Вам в течении дня с предварительной оценкой возможной стоимости аренды вашей лодки и коммерческим предложением.</p>
	</div>

	<div id="arenda-modal" class="modal mfp-hide arenda-modal">
		<h2>быстрый подбор Лодки</h2>
		<form action="">
			<input type="text" class="city" placeholder="Местоположение">
			<input type="text" onfocus="(this.type='date')" class="date" placeholder="Дата начала">
			<select name="srok" id="srok">
				<option value="Срок аренды" disabled selected>Срок аренды</option>
				<option value="1 час">1 час</option>
				<option value="2 часа">2 часа</option>
				<option value="6 часов">6 часов</option>
				<option value="12 часов">12 часов</option>
				<option value="1 день">1 день</option>
				<option value="2 дня">2 дня</option>
				<option value="3 дня">3 дня</option>
			</select>
			<button class="btn">подобрать</button>
		</form>
	</div>		

	<div id="add-modal" class="modal mfp-hide add-modal">
		<form>
			<div class="modal-flex flex">
				<div class="modal-left">
					<h2>добавление лодки</h2>
					<div class="add-form">
						<div class="add-form-main flex">
							<h4>Общая информация</h4>
							<input type="text" placeholder="Заголовок">
							<select class="half">
								<option value="Страна" disabled selected>Страна</option>
								<option value="Италия">Италия</option>
								<option value="Турция">Турция</option>
								<option value="Испания">Испания</option>
							</select>
							<input type="text" placeholder="Город" class="half">
						</div>
						<div class="add-form-info flex">
							<h4>Информация о лодке</h4>
							<select class="half">
								<option value="Тип лодки" disabled selected>Тип лодки</option>
								<option value="Моторная">Моторная</option>
								<option value="Моторная2">Моторная2</option>
								<option value="Моторная3">Моторная3</option>
							</select>
							<select class="half">
								<option value="Год выпуска лодки" disabled selected>Год выпуска лодки</option>
								<option value="1995">1995</option>
								<option value="2000">2000</option>
								<option value="2010">2010</option>
							</select>
							<input type="text" placeholder="Размер яхты в футах" class="half">
							<select class="half">
								<option value="Общее Кол-во гостей" disabled selected>Общее Кол-во гостей</option>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="30">30</option>
							</select>
							<select class="third">
								<option value="Кол-во спален" disabled selected>Кол-во спален</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
							<select class="third">
								<option value="Спальные места" disabled selected>Спальные места</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
							<select class="third">
								<option value="Кол-во душевых" disabled selected>Кол-во душевых</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
							<label>
								<input type="checkbox">
								<span></span>With captain
							</label>
							<label>
								<input type="checkbox">
								<span></span>Instant Confirmation
							</label>
							<label>
								<input type="checkbox">
								<span></span>Топливо включено
							</label>
						</div>

						<div class="add-form-bottom flex">
							<h4>Текстовое описание</h4>
							<textarea placeholder="Опишите свою лодку в свободной форме"></textarea>
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
								<input type="checkbox">
								<span></span>
								I agree to the <a href="#">Cancellation Policy</a> and <a href="#">Terms of Service</a>
							</label>
							<label class="check">
								<input type="checkbox">
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
							<input type="file" name="image" class="image-upload" id="image-upload" />
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
			<a href="#add-success-modal" class="btn add-success-btn">подать заявку на добавление</a>
		</form>
	</div>

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

