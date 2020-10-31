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
				<li><a href="/catalog">All boats</a></li>
				<li><a href="/catalog/type/sailboat">Sailboat</a></li>
				<li><a href="/catalog/type/motorboat">Motorboat</a></li>
				<li><a href="/catalog/type/catamaran">Catamaran</a></li>
			</ul>
		</div>
	</div>

	<div class="catalog-block">
		<div class="container">
			<!--<div class="top-filter header-bottom flex">
				<a href="#" class="filter-btn">Фильтр</a>
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
			</div>-->

			<div class="catalog-flex">
				<!--<div class="left">
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
										<input type="text" id="amount">
									</span>
									<span class="filter-box-input">
										до
										<input type="text" id="amount2">
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
										<input type="text" id="amount3">
									</span>
									<span class="filter-box-input">
										до
										<input type="text" id="amount4">
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
								<label><input type="checkbox"><span></span>With captain</label>
									<label><input type="checkbox"><span></span>Instant Confirmation</label>
									<label><input type="checkbox"><span></span>Топливо включено</label>
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
										<input type="text" id="amount5">
									</span>
									<span class="filter-box-input">
										до
										<input type="text" id="amount6">
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
										<input type="text" id="amount7">
									</span>
									<span class="filter-box-input">
										до
										<input type="text" id="amount8">
									</span>
								</p>
								<div id="slider-range4"></div>
							</div>
						</div>


					</div>
				</div>-->
				<div class="right">

					<!--<div class="catalog-sort flex">
						<div class="catalog-sort-item">
							<label for="sort">Сортировать по:</label>
							<select name="sort">
								<option value="Цене (возрастание)">Цене (возрастание)</option>
								<option value="Цене (убивание)">Цене (убивание)</option>
								<option value="Цене (возрастание)2">Цене (возрастание)2</option>
								<option value="Цене (убивание)2">Цене (убивание)2</option>
							</select>
						</div>

						<div class="catalog-sort-item">
							<label for="show">Показывать по:</label>
							<select name="show">
								<option value="12">12</option>
								<option value="24">24</option>
								<option value="48">48</option>
								<option value="96">96</option>
							</select>
						</div>

						<label>
							<input type="checkbox">
							<span></span>
							Только со скидкой
						</label>
					</div>

					<div class="filter-tags flex">
						<span>1000 - 45000 р. <a href="#"></a></span>
						<span>1990 - 2016 г. <a href="#"></a></span>
						<span>With captain <a href="#"></a></span>
						<a href="#" class="delete">Очистить все</a>
					</div>-->
					<br>
					<h1>Результаты поиска по запросу "{{ request()->input('query') }}"</h1>
					<br><br>
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
												<img src="img/people.png" alt=""> {{ $boat->guests_qty }}
											</div>
											<div>
												<img src="img/bed.png" alt=""> {{ $boat->bedrooms_qty }}
											</div>
											<div>
												<img src="img/boat.png" alt=""> {{ $boat->size }} ft
											</div>
										</div>
										<div class="product-item-bottom flex">
											<a href="/catalog/{{ $boat->slug }}" class="btn">подробнее</a>
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


			<!--<p>Показано <b>1 - 12</b> из <b>325</b> лодок</p>-->
			</div>
		</div>
    </div>
    @endsection