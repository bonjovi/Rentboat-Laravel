@extends('master')

    @section('content')
    <div class="product">
		<div class="flex">
			<div class="product-slider">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="{{ $boat->mainpic }}" alt="">
						</div>
						<div class="swiper-slide">
							<img src="{{ $boat->mainpic }}" alt="">
						</div>
						<div class="swiper-slide">
							<img src="{{ $boat->mainpic }}" alt="">
						</div>
						<div class="swiper-slide">
							<img src="{{ $boat->mainpic }}" alt="">
						</div>
						<div class="swiper-slide">
							<img src="{{ $boat->mainpic }}" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="right"></div>
		</div>
		<div class="product-info">
			<div class="container">
				<div class="product-info-flex">
					<div class="left">
						<div class="product-info-bottom flex">
							<div class="left">
								<div class="swiper-button-prev"></div>
								<div class="swiper-button-next"></div>
								<div class="swiper-pagination"></div>
							</div>
							<div class="right">
								<div class="product-price">
									<span class="label">-24%</span>
									<span class="product-new-price">29 899 <i>₽</i> <span>/день</span></span>
									<span class="product-old-price"> <strike>32 499 <i>₽</i></strike> <span>/день</span></span>
								</div>
							</div>
						</div>
					</div>
					<div class="right">
						<div class="product-caption">
							<div class="product-caption-shield">
								<img src="/img/shield2.png" alt="">
								<p>Собственник предоставил <br> документы</p>
							</div>
							<span class="product-item-cat">{{ $boat->type_name }}</span>
							<h4>{{ $boat->name }}</h4>
							<span class="product-caption-year">{{ $boat->year }} г.</span>
							<div class="product-item-rating flex">
								<img src="/img/star.png" alt="">
								<img src="/img/star.png" alt="">
								<img src="/img/star.png" alt="">
								<img src="/img/star.png" alt="">
								<img src="/img/star2.png" alt="">
								<span class="rating-text">4.0</span>
							</div>
							<div class="product-item-city">{{ $boat->city_name }} <span>/ {{ $boat->country_name }}</span></div>
							<div class="product-item-info flex">
								<div>
									<img src="/img/people.png" alt=""> {{ $boat->guests_qty }}
								</div>
								<div>
									<img src="/img/bed.png" alt=""> {{ $boat->bedrooms_qty }}
								</div>
								<div>
									<img src="/img/boat.png" alt=""> {{ $boat->size }} ft
								</div>
							</div>
							<a href="#more-detals" class="product-caption-more">+ Подробные детали яхты</a>
							<div class="product-caption-form">
								<input type="text" onfocus="(this.type='date')" class="date" placeholder="Дата начала">
								<select name="srok" id="srok">
									<option value="Срок аренды" disabled selected>Срок</option>
									<option value="1 час">1 час</option>
									<option value="2 часа">2 часа</option>
									<option value="6 часов">6 часов</option>
									<option value="12 часов">12 часов</option>
									<option value="1 день">1 день</option>
									<option value="2 дня">2 дня</option>
									<option value="3 дня">3 дня</option>
								</select>
								<select name="gost" id="gost">
									<option value="Срок" disabled selected>Гостей</option>
									<option value="1 час">10</option>
									<option value="2 часа">20</option>
									<option value="6 часов">60</option>
									<option value="12 часов">120</option>
								</select>
							</div>
							<div class="bron">
								<div class="bron-date">
									<span>Вы бронируете</span>
									<h5>21 сентября - 21 ноября</h5>
								</div>
								<div class="bron-price">
									<span>Стоимость брони</span>
									<h5>29 899 <i>₽</i></h5>
								</div>
								<div class="bron-depo">
									<span>Страховой депозит</span>
									<h5>2 899 <i>₽</i></h5>
								</div>
								<div class="bron-items">
									<label>
										<h5>Капитан</h5>
										<span>
											@if($boat->with_capitan)
												Да
											@else
												Нет	
											@endif
										</span>
									</label>
									<label>
										<h5>Топливо</h5>
										<span>
											@if($boat->fuel_included)
												Да
											@else
												Нет	
											@endif
										</span>
									</label>
								</div>
								<div class="bron-warning"><span>* Все налоги и сборы включены</span></div>
							</div>
							<a href="#bron-modal" class="btn product-btn">Забронировать</a>
							<div class="product-buttons">
								<a href="#" class="product-wish"></a>
								<a href="#" class="product-share"></a>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
		
	</div>

	<div class="product-content">
		<div class="container">
			<div class="accordion-container">
				<div class="set activ">
					<a href="#" class="active">
						Описание
						<i class="set-minus"></i>
					</a>
					<div class="set-content" style="display: block;">
						<p>
							Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке
						</p>
						<ul>
							<li>Lorem Ipsum is simply dummy text of the printing when an unknown printer took a galley of type</li>
							<li>Advice and Assistance Investing</li>
							<li>Comprehensive Support for Your Business</li>
							<li>Lorem Ipsum is simply dummy text of the printing when an unknown</li>
							<li>Advice and Assistance Investing</li>
						</ul>
					</div>
				</div>
				<div class="set" id="more-detals">
					<a href="#">
						подробные детали
						<i class="set-plus"></i>
					</a>
					<div class="set-content">
						<div class="more-detals">
							<div class="item">
								<p>Manufacturer:</p>
								<h4>Paasch</h4>
							</div>
							<div class="item">
								<p>Model:</p>
								<h4>RPMY</h4>
							</div>
							<div class="item">
								<p>year:</p>
								<h4>1980</h4>
							</div>
							<div class="item">
								<p>Guest Capacity:</p>
								<h4>12</h4>
							</div>
							<div class="item">
								<p>Cabins:</p>
								<h4>3</h4>
							</div>
							<div class="item">
								<p>Single Beds:</p>
								<h4>4</h4>
							</div>
							<div class="item">
								<p>Double Beds:</p>
								<h4>1</h4>
							</div>
							<div class="item">
								<p>Double Beds:</p>
								<h4>1</h4>
							</div>
							<div class="item">
								<p>Bathrooms:</p>
								<h4>4</h4>
							</div>
							<div class="item">
								<p>Number of engines:</p>
								<h4>2</h4>
							</div>
							<div class="item">
								<p>Horsepower per engine:</p>
								<h4>330</h4>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="set">
					<a href="#">
						где и сколько стоит
						<i class="set-plus"></i>
					</a>
					<div class="set-content">
						<div class="season-price">
							<div class="summer">
								<h3>Лето</h3>
								<div class="item">Локация: <span>Carribean</span></div>
								<div class="item">Нижняя стоимость: <b>29 899 ₽/день</b></div>
								<div class="item">Высшая стоимость: <b>36 899 ₽/день</b></div>
								<p>* Страховой депозит и все налоги и сборы включены</p>
							</div>
							<div class="winter">
								<h3>Зима</h3>
								<div class="item">Локация: <span>Mediterranean</span></div>
								<div class="item">Нижняя стоимость: <b>29 899 ₽/день</b></div>
								<div class="item">Высшая стоимость: <b>36 899 ₽/день</b></div>
							</div>
						</div>
					</div>
				</div> -->
				<div class="set">
					<a href="#">
						что есть на яхте
						<i class="set-plus"></i>
					</a>
					<div class="set-content">
						<div class="product-options">
							<h3>Navigation & Safety</h3>
							<div class="flex">
								<p>Autopilot</p>
								<p>Radar</p>
								<p>Sonar</p>
								<p>Tender/Dinghy</p>
								<p>Depth finder</p>
								<p>Fish finder</p>
								<p>Autopilot</p>
								<p>Radar</p>
								<p>Sonar</p>
								<p>Tender/Dinghy</p>
								<p>Depth finder</p>
								<p>Fish finder</p>
								<p>Radar</p>
								<p>Tender/Dinghy</p>
								<p>Fish finder</p>
							</div>
							<h3>Navigation & Safety</h3>
							<div class="flex">
								<p>Autopilot</p>
								<p>Radar</p>
								<p>Sonar</p>
								<p>Tender/Dinghy</p>
								<p>Depth finder</p>
								<p>Fish finder</p>
								<p>Autopilot</p>
								<p>Radar</p>
								<p>Sonar</p>
								<p>Tender/Dinghy</p>
								<p>Depth finder</p>
								<p>Fish finder</p>
								<p>Radar</p>
								<p>Tender/Dinghy</p>
								<p>Fish finder</p>
							</div>
							<h3>Navigation & Safety</h3>
							<div class="flex">
								<p>Autopilot</p>
								<p>Radar</p>
								<p>Sonar</p>
								<p>Tender/Dinghy</p>
								<p>Depth finder</p>
								<p>Fish finder</p>
								<p>Autopilot</p>
								<p>Radar</p>
								<p>Sonar</p>
								<p>Tender/Dinghy</p>
								<p>Depth finder</p>
								<p>Fish finder</p>
								<p>Radar</p>
								<p>Tender/Dinghy</p>
								<p>Fish finder</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="product-owner">
				<div class="product-owner-img"><img src="/img/owner.png" alt=""></div>
				<div class="product-owner-info">
					<h4>Alexander Manchadov</h4>
					<p>Member since July 2019</p>
				</div>
				<a href="#" class="btn">написать владельцу</a>
			</div>

			<div class="product-gallery">
				<h2 class="block-title">галерея</h2>
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<a href="img/59.jpg"><img src="/img/59.jpg" alt=""></a>
						</div>
						<div class="swiper-slide">
							<a href="img/59.jpg"><img src="/img/59.jpg" alt=""></a>
						</div>
						<div class="swiper-slide">
							<a href="img/59.jpg"><img src="/img/59.jpg" alt=""></a>
						</div>
						<div class="swiper-slide">
							<a href="img/59.jpg"><img src="/img/59.jpg" alt=""></a>
						</div>
						<div class="swiper-slide">
							<a href="img/59.jpg"><img src="/img/59.jpg" alt=""></a>
						</div>
						<div class="swiper-slide">
							<a href="img/59.jpg"><img src="/img/59.jpg" alt=""></a>
						</div>
						<div class="swiper-slide">
							<a href="img/59.jpg"><img src="/img/59.jpg" alt=""></a>
						</div>
					</div>
				</div>
				<div class="product-gallery-bottom">
					<div class="swiper-pagination"></div>
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</div>

			<div class="comments product-comments">
				<div class="top-title flex">
					<h2 class="block-title">отзывы <span>(38)</span></h2>
				</div>
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
					@foreach($reviews as $review)
						<div class="comment-item flex">
						<div class="comment-item-img">
							<img src="/storage/{{ $review->user_avatar }}" alt="">
							<span>{{ Date::parse($review->created_at)->format('j F Y г.') }}</span>
						</div>
						<div class="comment-item-info">
							<h4>{{ $review->user_name }}</h4>
							<div class="flex">
								<div class="product-item-city">{{ $review->city_name }} <span>/ {{ $review->country_name }}</span></div>
								<div class="product-item-rating flex">
									<img src="/img/star.png" alt="">
									<img src="/img/star.png" alt="">
									<img src="/img/star.png" alt="">
									<img src="/img/star.png" alt="">
									<img src="/img/star2.png" alt="">
									<span class="rating-text">4.0</span>
								</div>
							</div>
							<p>Провели с друзьями незабываемый отдых на яхте. Спасибо сервису Rent Boat за предоставленную возможность легко и просто арендовать яхту на свой вкус и возможный бюджет. Особенно понравился капитан данной яхты. Очень добрый и приятный парень! Возил аккуратно, шампанское не разлили :))) Так же удобно забронировать яхту будучи в другом городе. Спасибо еще раз, было шикарно!</p>
						</div>
					</div>
					@endforeach
				</div>
				<a href="#" class="comments-more">
					<span>Показать еще отзывы</span>
				</a>
			</div>

			<div class="related">
				<h2 class="block-title">похожие яхты</h2>
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="product-item">
								<div class="product-item-img">
									<img src="/img/item.jpg" alt="">
								</div>
								<div class="product-item-caption">
									<span class="product-item-cat">Моторная яхта</span>
									<h4><a href="#">Dufour 335 Grand Large (2004)</a></h4>
									<div class="product-item-price flex">
										<span class="new-price">1 500 $ <span>/день</span></span>
										<span class="old-price">2 000 $ <span>/день</span></span>
									</div>
									<div class="product-item-rating flex">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star2.png" alt="">
										<span class="rating-text">4.0</span>
									</div>
									<div class="product-item-city">MILAN <span>/ ITALY</span></div>
									<div class="product-item-info flex">
										<div>
											<img src="/img/people.png" alt=""> 10
										</div>
										<div>
											<img src="/img/bed.png" alt=""> 6
										</div>
										<div>
											<img src="/img/boat.png" alt=""> 176 ft
										</div>
									</div>
									<div class="product-item-bottom flex">
										<a href="#" class="btn">подробнее</a>
										<a href="#" class="wish"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="product-item">
								<div class="product-item-img">
									<img src="/img/item.jpg" alt="">
								</div>
								<div class="product-item-caption">
									<span class="product-item-cat">Моторная яхта</span>
									<h4><a href="#">Dufour 335 Grand Large (2004)</a></h4>
									<div class="product-item-price flex">
										<span class="new-price">1 500 $ <span>/день</span></span>
										<span class="old-price">2 000 $ <span>/день</span></span>
									</div>
									<div class="product-item-rating flex">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star2.png" alt="">
										<span class="rating-text">4.0</span>
									</div>
									<div class="product-item-city">MILAN <span>/ ITALY</span></div>
									<div class="product-item-info flex">
										<div>
											<img src="/img/people.png" alt=""> 10
										</div>
										<div>
											<img src="/img/bed.png" alt=""> 6
										</div>
										<div>
											<img src="/img/boat.png" alt=""> 176 ft
										</div>
									</div>
									<div class="product-item-bottom flex">
										<a href="#" class="btn">подробнее</a>
										<a href="#" class="wish"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="product-item">
								<div class="product-item-img">
									<img src="/img/item.jpg" alt="">
								</div>
								<div class="product-item-caption">
									<span class="product-item-cat">Моторная яхта</span>
									<h4><a href="#">Dufour 335 Grand Large (2004)</a></h4>
									<div class="product-item-price flex">
										<span class="new-price">1 500 $ <span>/день</span></span>
										<span class="old-price">2 000 $ <span>/день</span></span>
									</div>
									<div class="product-item-rating flex">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star2.png" alt="">
										<span class="rating-text">4.0</span>
									</div>
									<div class="product-item-city">MILAN <span>/ ITALY</span></div>
									<div class="product-item-info flex">
										<div>
											<img src="/img/people.png" alt=""> 10
										</div>
										<div>
											<img src="/img/bed.png" alt=""> 6
										</div>
										<div>
											<img src="/img/boat.png" alt=""> 176 ft
										</div>
									</div>
									<div class="product-item-bottom flex">
										<a href="#" class="btn">подробнее</a>
										<a href="#" class="wish"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="product-item">
								<div class="product-item-img">
									<img src="/img/item.jpg" alt="">
								</div>
								<div class="product-item-caption">
									<span class="product-item-cat">Моторная яхта</span>
									<h4><a href="#">Dufour 335 Grand Large (2004)</a></h4>
									<div class="product-item-price flex">
										<span class="new-price">1 500 $ <span>/день</span></span>
										<span class="old-price">2 000 $ <span>/день</span></span>
									</div>
									<div class="product-item-rating flex">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star2.png" alt="">
										<span class="rating-text">4.0</span>
									</div>
									<div class="product-item-city">MILAN <span>/ ITALY</span></div>
									<div class="product-item-info flex">
										<div>
											<img src="/img/people.png" alt=""> 10
										</div>
										<div>
											<img src="/img/bed.png" alt=""> 6
										</div>
										<div>
											<img src="/img/boat.png" alt=""> 176 ft
										</div>
									</div>
									<div class="product-item-bottom flex">
										<a href="#" class="btn">подробнее</a>
										<a href="#" class="wish"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="product-item">
								<div class="product-item-img">
									<img src="/img/item.jpg" alt="">
								</div>
								<div class="product-item-caption">
									<span class="product-item-cat">Моторная яхта</span>
									<h4><a href="#">Dufour 335 Grand Large (2004)</a></h4>
									<div class="product-item-price flex">
										<span class="new-price">1 500 $ <span>/день</span></span>
										<span class="old-price">2 000 $ <span>/день</span></span>
									</div>
									<div class="product-item-rating flex">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star2.png" alt="">
										<span class="rating-text">4.0</span>
									</div>
									<div class="product-item-city">MILAN <span>/ ITALY</span></div>
									<div class="product-item-info flex">
										<div>
											<img src="/img/people.png" alt=""> 10
										</div>
										<div>
											<img src="/img/bed.png" alt=""> 6
										</div>
										<div>
											<img src="/img/boat.png" alt=""> 176 ft
										</div>
									</div>
									<div class="product-item-bottom flex">
										<a href="#" class="btn">подробнее</a>
										<a href="#" class="wish"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="product-item">
								<div class="product-item-img">
									<img src="/img/item.jpg" alt="">
								</div>
								<div class="product-item-caption">
									<span class="product-item-cat">Моторная яхта</span>
									<h4><a href="#">Dufour 335 Grand Large (2004)</a></h4>
									<div class="product-item-price flex">
										<span class="new-price">1 500 $ <span>/день</span></span>
										<span class="old-price">2 000 $ <span>/день</span></span>
									</div>
									<div class="product-item-rating flex">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star2.png" alt="">
										<span class="rating-text">4.0</span>
									</div>
									<div class="product-item-city">MILAN <span>/ ITALY</span></div>
									<div class="product-item-info flex">
										<div>
											<img src="/img/people.png" alt=""> 10
										</div>
										<div>
											<img src="/img/bed.png" alt=""> 6
										</div>
										<div>
											<img src="/img/boat.png" alt=""> 176 ft
										</div>
									</div>
									<div class="product-item-bottom flex">
										<a href="#" class="btn">подробнее</a>
										<a href="#" class="wish"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="product-item">
								<div class="product-item-img">
									<img src="/img/item.jpg" alt="">
								</div>
								<div class="product-item-caption">
									<span class="product-item-cat">Моторная яхта</span>
									<h4><a href="#">Dufour 335 Grand Large (2004)</a></h4>
									<div class="product-item-price flex">
										<span class="new-price">1 500 $ <span>/день</span></span>
										<span class="old-price">2 000 $ <span>/день</span></span>
									</div>
									<div class="product-item-rating flex">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star.png" alt="">
										<img src="/img/star2.png" alt="">
										<span class="rating-text">4.0</span>
									</div>
									<div class="product-item-city">MILAN <span>/ ITALY</span></div>
									<div class="product-item-info flex">
										<div>
											<img src="/img/people.png" alt=""> 10
										</div>
										<div>
											<img src="/img/bed.png" alt=""> 6
										</div>
										<div>
											<img src="/img/boat.png" alt=""> 176 ft
										</div>
									</div>
									<div class="product-item-bottom flex">
										<a href="#" class="btn">подробнее</a>
										<a href="#" class="wish"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</div>
		</div>
    </div>

	<script>
		$(function() {
			$('html').scrollTop(0);
		});
	</script>
    @endsection