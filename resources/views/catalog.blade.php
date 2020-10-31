@extends('master')
    @section('content')
    <div class="breadcrumb-block">
		<div class="container">
			<ul class="breadcrumb flex">
				<li><a href="#">ГЛАВНАЯ</a></li>
				<li><span>КАТАЛОГ ЛОДОК</span></li>
			</ul>

			<h2 class="title">КАТАЛОГ ЛОДОК</h2>

			<ul class="breadcrumb-menu flex">
				<li @if(!isset($type)) class="active" @endif><a href="/catalog">All boats</a></li>
				<li @if(isset($type) && $type == 'sailboat') class="active" @endif><a href="/catalog/type/sailboat">Sailboat</a></li>
				<li @if(isset($type) && $type == 'motorboat') class="active" @endif><a href="/catalog/type/motorboat">Motorboat</a></li>
				<li @if(isset($type) && $type == 'catamaran') class="active" @endif><a href="/catalog/type/catamaran">Catamaran</a></li>
			</ul>
		</div>
	</div>

	<div class="catalog-block">
		<div class="container">
			<form action="{{ route('boats.index', app()->getLocale()) }}" method="GET">
				@csrf
			<div class="top-filter header-bottom flex">
				<a href="#" class="filter-btn">Фильтр</a>
				<input type="text" class="city" placeholder="Местоположение" name="city" value="{{ request()->input('city') }}">
				<input type="date" onfocus="(this.type='date')" class="date" placeholder="Дата начала" name="date_start" value="{{ request()->input('date_start') }}">
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
			</div>

			<div class="catalog-flex">
				<div class="left">
					<div class="category-filter">
						<div class="filter-item filter-price filter-slider">
							<div class="top flex">
								<h3>Цена / <span>день,</span> <span class="val">₽</span></h3>
								<span class="active"></span>
							</div>
							<div class="filter-box show">
								<p class="flex">
									<span class="filter-box-input">
										от
										<input type="text" id="amount" name="min_price" value="{{ request()->input('min_price') }}">
									</span>
									<span class="filter-box-input">
										до
										<input type="text" id="amount2" name="max_price" value="{{ request()->input('max_price') }}">
									</span>
								</p>
								<div id="slider-range"></div>
							</div>
						</div>

						<div class="filter-item filter-price filter-slider">
							<div class="top flex">
								<h3>Год выпуска</h3>
								<span></span>
							</div>
							<div class="filter-box">
								<p class="flex">
									<span class="filter-box-input">
										от
										<input type="text" id="amount3" name="min_year" value="{{ request()->input('min_year') }}">
									</span>
									<span class="filter-box-input">
										до
										<input type="text" id="amount4" name="max_year" value="{{ request()->input('max_year') }}">
									</span>
								</p>
								<div id="slider-range2"></div>
							</div>
						</div>

						<div class="filter-item filter-city">
							<div class="top flex">
								<h3>Опции</h3>
								<span class="active"></span>
							</div>

							<div class="filter-checkbox filter-box show">
								<label><input type="checkbox" name="with_capitan" <?=(request()->input('with_capitan')) ? 'checked' : ''?>><span></span>С капитаном</label>
								<label><input type="checkbox" name="instant_confirmation" <?=(request()->input('instant_confirmation')) ? 'checked' : ''?>><span></span>Мгновенное подтверждение</label>
								<label><input type="checkbox" name="fuel_included" <?=(request()->input('fuel_included')) ? 'checked' : ''?>><span></span>Топливо включено</label>
							</div>
						</div>

						<div class="filter-item filter-price filter-slider">
							<div class="top flex">
								<h3>Размер яхты, Ft</h3>
								<span></span>
							</div>
							<div class="filter-box">
								<p class="flex">
									<span class="filter-box-input">
										от
										<input type="text" id="amount5" name="min_size" value="{{ request()->input('min_size') }}">
									</span>
									<span class="filter-box-input">
										до
										<input type="text" id="amount6" name="max_size" value="{{ request()->input('max_size') }}">
									</span>
								</p>
								<div id="slider-range3"></div>
							</div>
						</div>

						<div class="filter-item filter-price filter-slider">
							<div class="top flex">
								<h3>Кол-во гостей</h3>
								<span></span>
							</div>
							<div class="filter-box">
								<p class="flex">
									<span class="filter-box-input">
										от
										<input type="text" id="amount7" name="min_guests" value="{{ request()->input('min_guests') }}">
									</span>
									<span class="filter-box-input">
										до
										<input type="text" id="amount8" name="max_guests" value="{{ request()->input('max_guests') }}">
									</span>
								</p>
								<div id="slider-range4"></div>
							</div>
						</div>


					</div>
				</div>
				</form>
				<div class="right">

					<div class="catalog-sort flex">
						<div class="catalog-sort-item">
							<label for="sort">Сортировать по:</label>
							<select name="orderby">
								<option value="price_low_to_high" <?=(request()->input('orderby') == 'price_low_to_high') ? 'selected' : ''?>>Цене (возрастание)</option>
								<option value="price_high_to_low" <?=(request()->input('orderby') == 'price_high_to_low') ? 'selected' : ''?>>Цене (убывание)</option>
							</select>
						</div>

						<div class="catalog-sort-item">
							<label for="show">Показывать по:</label>
							<select name="limit">
								<option value="12" <?=(request()->input('limit') == '12') ? 'selected' : ''?>>12</option>
								<option value="24" <?=(request()->input('limit') == '24') ? 'selected' : ''?>>24</option>
								<option value="48" <?=(request()->input('limit') == '48') ? 'selected' : ''?>>48</option>
								<option value="96" <?=(request()->input('limit') == '96') ? 'selected' : ''?>>96</option>
							</select>
						</div>

						<label>
							<input type="checkbox" name="sale" <?=(request()->input('sale')) ? 'checked' : ''?>>
							<span></span>
							Только со скидкой
						</label>
					</div>

					<script>
						function splitGetParams(getParams) {
							var currentUrl = window.location.href;
							getParams = getParams.split('&');

							getParams.forEach(function(getParam, i, getParams) {
								currentUrl = removeURLParameter(currentUrl, getParam);
							});

							window.location.href = currentUrl;
						}

						function removeURLParameter(url, parameter) {
							//prefer to use l.search if you have a location/link object
							var urlparts= url.split('?');
							if (urlparts.length>=2) {

								var prefix= encodeURIComponent(parameter)+'=';
								var pars= urlparts[1].split(/[&;]/g);

								//reverse iteration as may be destructive
								for (var i= pars.length; i-- > 0;) {
									//idiom for string.startsWith
									if (pars[i].lastIndexOf(prefix, 0) !== -1) {
										pars.splice(i, 1);
									}
								}

								if(pars.length > 0) {
									url= urlparts[0]+'?'+pars.join('&');
								} else {
									url= urlparts[0];
								}

								return url;
							} else {
								return url;
							}
						}
						//alert(removeURLParameter(url, 'min_price'));
					</script>

					<div class="filter-tags flex">
						@if(count(request()->input()) > 0)
							@if(request()->input('min_price') && request()->input('max_price'))
								<span>{{ request()->input('min_price') }} - {{ request()->input('max_price') }} р. <a onclick="splitGetParams('min_price&max_price');"></a></span>
							@elseif(request()->input('min_price'))
								<span>от {{ request()->input('min_price') }} р. <a onclick="splitGetParams('min_price');"></a></span>
							@elseif(request()->input('max_price'))
								<span>до {{ request()->input('max_price') }} р. <a onclick="splitGetParams('max_price');"></a></span>
							@endif

							@if(request()->input('min_year') && request()->input('max_year'))
								<span>{{ request()->input('min_year') }} - {{ request()->input('max_year') }} г. <a onclick="splitGetParams('min_year&max_year');"></a></span>
							@elseif(request()->input('min_year'))
								<span>от {{ request()->input('min_year') }} р. <a onclick="splitGetParams('min_year');"></a></span>
							@elseif(request()->input('max_year'))
								<span>до {{ request()->input('max_year') }} р. <a onclick="splitGetParams('max_year');"></a></span>
							@endif

							@if(request()->input('with_capitan'))
								<span>С капитаном <a onclick="splitGetParams('with_capitan');"></a></span>
							@endif

							@if(request()->input('instant_confirmation'))
								<span>Мгновенное подтверждение <a onclick="splitGetParams('instant_confirmation');"></a></span>
							@endif

							@if(request()->input('fuel_included'))
								<span>Топливо включено <a onclick="splitGetParams('fuel_included');"></a></span>
							@endif

							@if(request()->input('min_size') && request()->input('max_size'))
								<span>{{ request()->input('min_size') }} - {{ request()->input('max_size') }} фут. <a onclick="splitGetParams('min_size&max_size');"></a></span>
							@elseif(request()->input('min_size'))
								<span>от {{ request()->input('min_size') }} фут. <a onclick="splitGetParams('min_size');"></a></span>
							@elseif(request()->input('max_size'))
								<span>до {{ request()->input('max_size') }} фут. <a onclick="splitGetParams('max_size');"></a></span>
							@endif

							@if(request()->input('min_guests') && request()->input('max_guests'))
								<span>{{ request()->input('min_guests') }} - {{ request()->input('max_guests') }} гостей <a onclick="splitGetParams('min_guests&max_guests');"></a></span>
							@elseif(request()->input('min_guests'))
								<span>от {{ request()->input('min_guests') }} гостей <a onclick="splitGetParams('min_guests');"></a></span>
							@elseif(request()->input('max_size'))
								<span>до {{ request()->input('max_guests') }} гостей <a onclick="splitGetParams('max_guests');"></a></span>
							@endif


							<a href="{{ route('boats.index', app()->getLocale()) }}" class="delete">Очистить все</a>
						@endif

						<!--<span>1990 - 2016 г. <a href="#"></a></span>
						<span>With captain <a href="#"></a></span>-->

					</div>

					<div class="catalog-row flex">
						@foreach ($boats as $boat)
							<div class="col">
								<div class="product-item">
									<div class="product-item-img">
										<img src="{{ Storage::url('/catalog/'.$boat->mainpic ) }}" alt="{{ $boat->name }}">
									</div>
									<div class="product-item-caption">
										<span class="product-item-cat">{{ $boat->type_name }}</span>
										<h4><a href="/catalog/{{ $boat->slug }}">{{ $boat->name }} ({{ $boat->year }})</a></h4>
										<div class="product-item-price flex">
											<span class="new-price">{{ $boat->saleprice }} $ <span>/день</span></span>
											<span class="old-price">{{ $boat->price }} $ <span>/день</span></span>
										</div>
										<div class="product-item-rating flex">
											<img src="img/star.png" alt="">
											<img src="img/star.png" alt="">
											<img src="img/star.png" alt="">
											<img src="img/star.png" alt="">
											<img src="img/star2.png" alt="">
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
										<div class="product-item-bottom flex">
											<a href="/{{ Config::get('app.locale') }}/catalog/{{ $boat->slug }}" class="btn">подробнее</a>
											<!--<a href="#" class="wish"></a>-->
										</div>
									</div>
								</div>
							</div>
						‭@endforeach
					</div>

					<!--<ul class="pagination">
						<li class="prev"><a href="#"></a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><span>...</span></li>
						<li><a href="#">15</a></li>
						<li class="next"><a href="#"></a></li>
					</ul>-->


				</div>
			</div>

			<!--<div class="catalog-bottom">
				<p>Показано <b>1 - 12</b> из <b>325</b> лодок</p>
			</div>-->
		</div>
    </div>
    @endsection