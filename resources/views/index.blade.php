@extends('master')    
    
    @section('content')

    

    <div class="popular-slider">
		<div class="container">
			<h2 class="title"><span>популярные направления</span></h2>
			    <div class="flipster">
					<ul>
						@foreach($overall_cities as $city)
							<li>
								<img class="lazyload" data-src="{{ Storage::url('/'.$city->image ) }}" alt="">
								<a href="/{{ Config::get('app.locale') }}/catalog/location/{{ $city->slug }}">смотреть лодки ></a>
								<div class="caption">
									<?php
									//dd($city->name);
									?>
									<h3>{{ $city->name }}</h3>
									<p>{{ $city->description }}</p>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
				<div class="popular-slider-bottom">
					<!-- <div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div> -->
					<a href="/{{ Config::get('app.locale') }}/catalog" class="btn">смотреть все локации</a>
					
				</div>				
		</div>
	</div>

	<div class="steps">
		<div class="container">
			{!! setting('site.4steps') !!}
		</div>
	</div>
	<div class="best-items">
		<div class="container">
			<h2 class="title"><span>наши лодки с безупречной репутацией</span></h2>
			<div class="product-items">
				@foreach ($boats as $boat)
					<div class="col">
						<div class="product-item">
							<div class="product-item-img">
								<img class="lazyload" data-src="{{ Storage::url('/catalog/'.$boat->mainpic ) }}" alt="{{ $boat->name }}">
							</div>
							<div class="product-item-caption">
								<span class="product-item-cat">{{ $boat->type_name }}</span>
								<h4><a href="/catalog/{{ $boat->slug }}">{{ $boat->name }}</a></h4>
								<div class="product-item-price flex">
									<span class="new-price">1 500 $ <span>/день</span></span>
									<span class="old-price">2 000 $ <span>/день</span></span>
								</div>
								<div class="product-item-rating flex">
									<img class="lazyload" data-src="img/star.png" alt="">
									<img class="lazyload" data-src="img/star.png" alt="">
									<img class="lazyload" data-src="img/star.png" alt="">
									<img class="lazyload" data-src="img/star.png" alt="">
									<img class="lazyload" data-src="img/star2.png" alt="">
									<span class="rating-text">4.0</span>
								</div>
								<div class="product-item-city">{{ $boat->city_name }} <span>/ {{ $boat->country_name }}</span></div>
								<div class="product-item-info flex">
									<div>
										<img class="lazyload" data-src="img/people.png" alt=""> {{ $boat->guests_qty }}
									</div>
									<div>
										<img class="lazyload" data-src="img/bed.png" alt=""> {{ $boat->bedrooms_qty }}
									</div>
									<div>
										<img class="lazyload" data-src="img/boat.png" alt=""> {{ $boat->size }} ft
									</div>
								</div>
								<div class="product-item-bottom flex">
									<a href="/catalog/{{ $boat->slug }}" class="btn">подробнее</a>
									<a href="#" class="wish"></a>
								</div>
							</div>
						</div>
					</div>‭
				@endforeach
			</div>
			<a href="{{ route('boats.index', app()->getLocale()) }}" class="more">смотреть все лодки</a>
		</div>
	</div>

	<div class="main-banner">
		<div class="container">
			{!! setting('site.discount') !!}
			<a href="#reg-modal" class="btn">зарегистрироваться</a>
		</div>
	</div>

	<div class="popular-reviews">
		<div class="container">
			<h2 class="title"><span>Популярные люди о путешествиях</span></h2>
			<div class="swiper-container popular-gallery-top">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="popular-review flex">
							<div class="left">
								<h4>« Мальдивы - Самый лучший тропический остров из всех существующих на Земле »</h4>
								<p>
									Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.
								</p>
								<div class="popular-review-author flex">
									<div class="popular-review-author-img">
										<img class="lazyload" data-src="img/popular-review-author.jpg" alt="">
									</div>
									<div class="popular-review-author-info">
										<p>Настя Ивлеева</p>
										<span>Блогер, телеведущая</span>
									</div>
								</div>
								
							</div>
							<div class="right">

								<div class="media-block">
									<div class="video">
										<div class="video-play">
											<div class="video-poster" style="background-image: url(img/mediya.png);">
												<div class="video-text">
													<img class="lazyload" data-src="img/play.png" alt="">
													Смотреть видео
												</div>
											</div>
											<video src="{{ asset('video.mp4') }}" controls></video>
										</div>
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="popular-review flex">
							<div class="left">
								<h4>« Мальдивы - Самый лучший тропический остров из всех существующих на Земле »</h4>
								<p>
									Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.
								</p>
								<div class="popular-review-author flex">
									<div class="popular-review-author-img">
										<img class="lazyload" data-src="img/popular-review-author.jpg" alt="">
									</div>
									<div class="popular-review-author-info">
										<p>Настя Ивлеева</p>
										<span>Блогер, телеведущая</span>
									</div>
								</div>
								
							</div>
							<div class="right">

								<div class="media-block">
									<img class="lazyload" data-src="img/mediya.png" alt="">
								</div>
								
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="popular-review flex">
							<div class="left">
								<h4>« Мальдивы - Самый лучший тропический остров из всех существующих на Земле »</h4>
								<p>
									Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.
								</p>
								<div class="popular-review-author flex">
									<div class="popular-review-author-img">
										<img class="lazyload" data-src="img/popular-review-author.jpg" alt="">
									</div>
									<div class="popular-review-author-info">
										<p>Настя Ивлеева</p>
										<span>Блогер, телеведущая</span>
									</div>
								</div>
								
							</div>
							<div class="right">

								<div class="media-block">
									<img class="lazyload" data-src="img/mediya.png" alt="">
								</div>
								
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="popular-review flex">
							<div class="left">
								<h4>« Мальдивы - Самый лучший тропический остров из всех существующих на Земле »</h4>
								<p>
									Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.
								</p>
								<div class="popular-review-author flex">
									<div class="popular-review-author-img">
										<img class="lazyload" data-src="img/popular-review-author.jpg" alt="">
									</div>
									<div class="popular-review-author-info">
										<p>Настя Ивлеева</p>
										<span>Блогер, телеведущая</span>
									</div>
								</div>
								
							</div>
							<div class="right">

								<div class="media-block">
									<img class="lazyload" data-src="img/mediya.png" alt="">
								</div>
								
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="popular-review flex">
							<div class="left">
								<h4>« Мальдивы - Самый лучший тропический остров из всех существующих на Земле »</h4>
								<p>
									Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.
								</p>
								<div class="popular-review-author flex">
									<div class="popular-review-author-img">
										<img class="lazyload" data-src="img/popular-review-author.jpg" alt="">
									</div>
									<div class="popular-review-author-info">
										<p>Настя Ивлеева</p>
										<span>Блогер, телеведущая</span>
									</div>
								</div>
								
							</div>
							<div class="right">

								<div class="media-block">
									<img class="lazyload" data-src="img/mediya.png" alt="">
								</div>
								
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="popular-review flex">
							<div class="left">
								<h4>« Мальдивы - Самый лучший тропический остров из всех существующих на Земле »</h4>
								<p>
									Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.
								</p>
								<div class="popular-review-author flex">
									<div class="popular-review-author-img">
										<img class="lazyload" data-src="img/popular-review-author.jpg" alt="">
									</div>
									<div class="popular-review-author-info">
										<p>Настя Ивлеева</p>
										<span>Блогер, телеведущая</span>
									</div>
								</div>
								
							</div>
							<div class="right">

								<div class="media-block">
									<img class="lazyload" data-src="img/mediya.png" alt="">
								</div>
								
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="popular-review flex">
							<div class="left">
								<h4>« Мальдивы - Самый лучший тропический остров из всех существующих на Земле »</h4>
								<p>
									Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.
								</p>
								<div class="popular-review-author flex">
									<div class="popular-review-author-img">
										<img class="lazyload" data-src="img/popular-review-author.jpg" alt="">
									</div>
									<div class="popular-review-author-info">
										<p>Настя Ивлеева</p>
										<span>Блогер, телеведущая</span>
									</div>
								</div>
								
							</div>
							<div class="right">

								<div class="media-block">
									<img class="lazyload" data-src="img/mediya.png" alt="">
								</div>
								
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<div class="popular-review flex">
							<div class="left">
								<h4>« Мальдивы - Самый лучший тропический остров из всех существующих на Земле »</h4>
								<p>
									Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.
								</p>
								<div class="popular-review-author flex">
									<div class="popular-review-author-img">
										<img class="lazyload" data-src="img/popular-review-author.jpg" alt="">
									</div>
									<div class="popular-review-author-info">
										<p>Настя Ивлеева</p>
										<span>Блогер, телеведущая</span>
									</div>
								</div>
								
							</div>
							<div class="right">

								<div class="media-block">
									<img class="lazyload" data-src="img/mediya.png" alt="">
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>

		<div class="sw-bottom">
			<div class="container">

				<div class="left">
						<div class="swiper-button-next">следующий отзыв</div>
						<img class="lazyload" data-src="img/kema.png" alt="">
				</div>
				<div class="right">
					<div class="swiper-container popular-gallery-thumbs">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="media-block">
									<img class="lazyload" data-src="img/mask.png" alt="">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="media-block">
									<img class="lazyload" data-src="img/mask.png" alt="">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="media-block">
									<img class="lazyload" data-src="img/mask.png" alt="">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="media-block">
									<img class="lazyload" data-src="img/mask.png" alt="">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="media-block">
									<img class="lazyload" data-src="img/mask.png" alt="">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="media-block">
									<img class="lazyload" data-src="img/mask.png" alt="">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="media-block">
									<img class="lazyload" data-src="img/mask.png" alt="">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="media-block">
									<img class="lazyload" data-src="img/mask.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="owner">
		<div class="container">
			{!! setting('site.youowner') !!}
		</div>
	</div>

	<div class="traveler-reviews">
		<div class="container">
			<div class="review-wrapper flex">
				<div class="left">
					<h2 class="title">Отзывы путешественников</h2>
				</div>
				<div class="right">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							@foreach($reviews as $review)
								@if($review->user_role_id != 3)
									<div class="swiper-slide">
										<div class="review">
											<img class="lazyload" data-src="img/quote.png" alt="">
											{!! $review->text !!}
											<div class="review-author flex">
												<div class="review-author-img">
													<img class="lazyload" data-src="/storage/{{ $review->user_avatar }}" alt="" width="61">
												</div>
												<div class="review-author-info">
													<h4>{{ $review->user_name }}</h4>
													<p>{{ $review->city_name }} <span>/ {{ $review->country_name }}</span></p>
												</div>
											</div>
											<div class="review-bottom">
												<p>
													Арендованная <br> яхта
													<img src="img/vector.png" alt="">
												</p>
												<img src="{{ $review->boat_mainpic }}" alt="">
												<a href="{{ $review->link }}" class="btn">хочу такую же</a>
											</div>
										</div>
									</div>
								@endif
							@endforeach
						</div>
					</div>					

					<div class="traveler-review-bottom flex">
						<div class="swiper-pagination"></div>
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="owner-reviews">
		<div class="container">
			<div class="owner-review-wrapper flex">
				<div class="left">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							@foreach($reviews as $review)
								@if($review->user_role_id == 3)
									<div class="swiper-slide">
										<div class="review">
											<img class="lazyload" data-src="img/quote.png" alt="">
											{!! $review->text !!}
											<div class="review-author flex">
												<div class="review-author-img">
													<img class="lazyload" data-src="/storage/{{ $review->user_avatar }}" alt="" width="61">
												</div>
												<div class="review-author-info">
													<h4>{{ $review->user_name }}</h4>
													<p>{{ $review->city_name }} <span>/ {{ $review->country_name }}</span></p>
												</div>
											</div>
										</div>

										<div class="product-item flex">
											<div class="product-item-img">
												<img class="lazyload" data-src="img/item-quad.png" alt="">
											</div>
											<div class="product-item-caption">
												<span class="product-item-cat">{{ $review->boat_type_name }}</span>
												<h4><a href="#">{{ $review->boat_name }} ({{ $review->boat_year }})</a></h4>
												<div class="product-item-price flex">
													<span class="new-price">1 500 $ <span>/день</span></span>
													<span class="old-price">2 000 $ <span>/день</span></span>
												</div>
												<div class="product-item-rating flex">
													<img class="lazyload" data-src="img/star.png" alt="">
													<img class="lazyload" data-src="img/star.png" alt="">
													<img class="lazyload" data-src="img/star.png" alt="">
													<img class="lazyload" data-src="img/star.png" alt="">
													<img class="lazyload" data-src="img/star2.png" alt="">
													<span class="rating-text">4.0</span>
												</div>
												<div class="product-item-city">{{ $review->city_name }} <span>/ {{ $review->country_name }}</span></div>
												<div class="product-item-info flex">
													<div>
														<img class="lazyload" data-src="img/people.png" alt=""> {{ $review->boat_guests_qty }}
													</div>
													<div>
														<img class="lazyload" data-src="img/bed.png" alt=""> {{ $review->boat_sleepers_qty }}
													</div>
													<div>
														<img class="lazyload" data-src="img/boat.png" alt=""> {{ $review->boat_size }} ft
													</div>
												</div>
												<div class="product-item-bottom flex">
													<a href="/catalog/{{ $review->boat_slug }}" class="btn">подробнее</a>
													<a href="#" class="wish"></a>
												</div>
											</div>
										</div>
									</div>
								@endif
							@endforeach
						</div>
					</div>

					<div class="owner-review-bottom flex">
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
						<div class="swiper-pagination"></div>
					</div>

				</div>
				<div class="right">
					<h2 class="title">Отзывы <br> владельцев яхт</h2>
				</div>				
			</div>
		</div>
	</div>

	<div class="popular-news">
		<div class="container">
			<div class="top-title">
				<h2 class="title"><span>интересные статьи</span></h2>
				<a href="/{{ Config::get('app.locale') }}/blog" class="btn">читать все статьи</a>
			</div>
			<div class="row flex">
				@foreach($overall_posts as $post)
					<div class="col">
						<div class="news-item">
							<span class="label">{{ $post->created_at }}</span>
							<div class="news-item-img"><img class="lazyload" data-src="img/news.jpg" alt=""></div>
							<div class="news-item-caption">
								<h4><a href="#">{{ $post->title }}</a></h4>
								<p>{{ $post->excerpt }}</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	<div class="about-text">
		<div class="container">
			<h2 class="title"><span>о нашей компании</span></h2>
			{!! setting('site.about') !!}
		</div>
    </div>
    @endsection