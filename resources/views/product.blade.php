@extends('master')

    @section('content')
    <div class="product">
		<div class="flex">
			<div class="product-slider">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="{{ Storage::url('/catalog/'.$boat->mainpic ) }}" alt="">
						</div>
						<div class="swiper-slide">
							<img src="{{ Storage::url('/catalog/'.$boat->mainpic ) }}" alt="">
						</div>
						<div class="swiper-slide">
							<img src="{{ Storage::url('/catalog/'.$boat->mainpic ) }}" alt="">
						</div>
						<div class="swiper-slide">
							<img src="{{ Storage::url('/catalog/'.$boat->mainpic ) }}" alt="">
						</div>
						<div class="swiper-slide">
							<img src="{{ Storage::url('/catalog/'.$boat->mainpic ) }}" alt="">
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
									@if($boat->saleprice)
										<span class="label">
											@php
												echo round((($boat->saleprice / $boat->price) * 100), 0);
											@endphp
											%
										</span>
									@endif
									@if($boat->saleprice)
										<span class="product-new-price">{{ $boat->saleprice }} <i>₽</i> <span>/день</span></span>
										<span class="product-old-price"> <strike>{{ $boat->price }} <i>₽</i></strike> <span>/день</span></span>
									@else
										<span class="product-new-price">{{ $boat->price }} <i>₽</i> <span>/день</span></span>
									@endif
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
								<!--<img src="/img/star.png" alt="">
								<img src="/img/star.png" alt="">
								<img src="/img/star.png" alt="">
								<img src="/img/star.png" alt="">
								<img src="/img/star2.png" alt="">
								<span class="rating-text">4.0</span>-->
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
								<input type="text" onfocus="(this.type='date')" class="date" placeholder="Дата начала" id="arend_date">
								<select name="srok" id="arend_srok">
									<option value="Срок аренды" disabled selected>Срок</option>
									<option value="3600">1 час</option>
									<option value="7200">2 часа</option>
									<option value="21600">6 часов</option>
									<option value="43200">12 часов</option>
									<option value="86400">1 день</option>
									<option value="172800">2 дня</option>
									<option value="259200">3 дня</option>
								</select>
								<select name="gost" id="gost">
									<option value="Срок" disabled selected>Гостей</option>
									<option value="10">10</option>
									<option value="20">20</option>
									<option value="60">60</option>
									<option value="120">120</option>
								</select>
							</div>
							<div class="bron">
								<div class="bron-date">
									<span>Вы бронируете</span>
									<h5>21 сентября - 21 ноября</h5>
								</div>
								<div class="bron-price">
									<span>Стоимость брони</span>
									<h5>@if($boat->saleprice) {{ $boat->saleprice }} @else {{ $boat->price }} @endif<i>₽</i></h5>
								</div>
								<div class="bron-depo">
									<span>Страховой депозит</span>
									@if($boat->with_capitan)
										<h5>{{ setting('site.security_deposit_with_capitan') }} <i>₽</i></h5>
									@else
										<h5>{{ setting('site.security_deposit_without_capitan') }} <i>₽</i></h5>
									@endif

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
							<!--<div class="product-buttons">
								<a href="#" class="product-wish"></a>
								<a href="#" class="product-share"></a>
							</div>-->
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
						{!! $boat->description !!}
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
					<h4>{{ $owner->name }} {{ $owner->last_name }}</h4>
					<p>Member since July 2019</p>
				</div>
				<!--<a href="#" class="btn">написать владельцу</a>-->
			</div>

			<div class="product-gallery">
				<h2 class="block-title">галерея</h2>
				<div class="swiper-container">
					<div class="swiper-wrapper">
						@if($boat->thumbnail1)
							<div class="swiper-slide">
								<a href="{{ Storage::url('/catalog/'.$boat->thumbnail1 ) }}"><img src="{{ Storage::url('/catalog/'.$boat->thumbnail1 ) }}" alt=""></a>
							</div>
						@endif
						@if($boat->thumbnail2)
							<div class="swiper-slide">
								<a href="{{ Storage::url('/catalog/'.$boat->thumbnail2 ) }}"><img src="{{ Storage::url('/catalog/'.$boat->thumbnail2 ) }}" alt=""></a>
							</div>
						@endif
						@if($boat->thumbnail3)
							<div class="swiper-slide">
								<a href="{{ Storage::url('/catalog/'.$boat->thumbnail3 ) }}"><img src="{{ Storage::url('/catalog/'.$boat->thumbnail3 ) }}" alt=""></a>
							</div>
						@endif
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
					<h2 class="block-title">отзывы <span>({{ count($reviews) }})</span></h2>
				</div>
				<div class="comment-form">
					@error('addreview_text')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>

					@enderror
					@if ($message = Session::get('success'))
						<script>$(function() {$.magnificPopup.open({items: {src: '#add-success-modal2', type: 'inline'}});});</script>
					@endif
					<form action="{{ route('reviews.store', app()->getLocale()) }}" method="POST" id="addreview_form">
						@csrf
						<div class="rating-flex">
							<span>Ваша общая оценка:</span>
							<input type="hidden" name="addreview_user_id" value="2">
							<input type="hidden" name="addreview_boat_id" value="{{ $boat->id }}">
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
						<div class="rating-flex">
							<textarea placeholder="Напишите Ваш комментарий" name="addreview_text"></textarea>
						</div>
						<div class="rating-flex">
							<!--<a href="#add-success-modal2" class="btn">комментировать</a>-->
							<button class="addreview_button">комментировать</button>
						</div>
					</form>
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
							<p>{!!  $review->text  !!}</p>
						</div>
					</div>
					@endforeach
				</div>
				<!--<a href="#" class="comments-more">
					<span>Показать еще отзывы</span>
				</a>-->
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


	<div id="bron-modal" class="modal mfp-hide bron-modal add-modal">
		<form id="booking_form" method="POST" action="{{ route('booking.store', app()->getLocale()) }}">
			<div class="modal-flex flex">
				<div class="modal-left">
					<h2>Оформление бронирования</h2>
					<p>Пожалуйста, заполните поля ниже ...</p>
					<div class="add-form">
						<div class="add-form-main flex">
							<h4>Payment Information</h4>
							<input type="number" placeholder="Номер карты" class="input-card" name="booking_cardnumber">
							<input type="number" placeholder="ММ / ГГ" class="input-card-year" name="booking_cardexpires">
							<input type="text" placeholder="Имя на карте" class="input-cardholder" name="booking_cardholder">
							<input type="number" placeholder="CVC" class="input-cvc" name="booking_cardcvc">
						</div>
						<div class="add-form-info flex">
							<h4>Ваша контактная информация</h4>
							<input type="text" placeholder="Имя" class="half" name="booking_customer_name">
							<input type="text" placeholder="Фамилия" class="half" name="booking_customer_last_name">
							<input type="text" placeholder="Номер телефона" class="half" name="booking_customer_phone">
							<input type="text" placeholder="E-mail" class="half" name="booking_customer_email">
							<select class="half">
								<option value="Страна" disabled selected name="booking_country">Страна</option>
								<option value="1">Россия</option>
								<option value="2">Украина</option>
							</select>
							<input type="text" placeholder="Город" class="half" name="booking_customer_city">
							<input type="text" placeholder="Домашний адрес" name="booking_customer_address">
						</div>

						<div class="add-form-bottom flex">
							<h4>Комментарий для Alexander</h4>
							<textarea placeholder="Tell Alexander about yourself and something else ..." name="booking_customer_comment"></textarea>
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
					<div class="product-item-img">
						<img src="{{ Storage::url('/catalog/'.$boat->mainpic ) }}" alt="">
					</div>
					<div class="product-item-caption">
						<span class="product-item-cat">{{ $boat->type }}</span>
						<h4><a href="#">{{ $boat->name }}</a></h4>
						<div class="product-item-city">{{ $boat->city_name }} <span>/ {{ $boat->country_name }}</span></div>
						<div class="product-owner">
							<div class="product-owner-img"><img src="img/owner.png" alt=""></div>
							<div class="product-owner-info">
								<h4>{{ $owner->name }} {{ $owner->last_name }}</h4>
								<p>Владелец лодки</p>
							</div>
						</div>
						<div class="bron">
							<div class="bron-date">
								<span>Вы бронируете</span>
								<h5>21 сентября - 21 ноября</h5>
								<input type="hidden" name="booking_date">
							</div>
							<div class="product-item-info flex">
								<div>
									<img src="img/people.png" alt=""> <span>Гостей: </span> 6
								</div>
							</div>
							<div class="bron-price">
								<span>Стоимость брони</span>
								<h5>
									@if($boat->saleprice)
										{{ $boat->saleprice }}
									@else
										{{ $boat->price }}
									@endif
									₽</h5>
							</div>
							<div class="bron-depo">
								<span>Страховой депозит</span>
								@if($boat->with_capitan)
									<h5>{{ setting('site.security_deposit_with_capitan') }} <i>₽</i></h5>
								@else
									<h5>{{ setting('site.security_deposit_without_capitan') }} <i>₽</i></h5>
								@endif
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
						<div class="bron-full-price">
							<div class="flex">
								<h5>Итого к оплате:</h5>
								<span>33 899 ₽</span>
							</div>
							<p><span class="red">Внимание!</span> Реквизиты вашей банковской карты нужны только для гарантии бронирования. Ваши денежные средства списываться не будут.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="bron-modal-bottom flex">
				<a href="#pay-modal" class="btn add-success-btn">перейти к оплате</a>
				<a href="#">Нужна страховка?</a>
			</div>
		</form>
	</div>


	<script>
		$(function() {
			$('html').scrollTop(0);
		});
	</script>
    @endsection