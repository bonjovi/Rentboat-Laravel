@extends('master')

    @section('content')
    <div class="breadcrumb-block">
		<div class="container">
			<ul class="breadcrumb flex">
				<li><a href="#">ГЛАВНАЯ</a></li>
				<li><span>ЛИЧНЫЙ КАБИНЕТ</span></li>
			</ul>

			<h2 class="title">ЛИЧНЫЙ КАБИНЕТ</h2>
		</div>
	</div>

	<div class="cabinet-top">
		<div class="flex container">
			<div class="image-preview cabinet-user" id="image-preview15">
				<label for="image-upload15" class="image-label" id="image-label15"></label>
				<input type="file" name="image" class="image-upload" id="image-upload15" />
			</div>
			<script type="text/javascript">
				$(document).ready(function() {
				  $.uploadPreview({
				    input_field: "#image-upload15",
				    preview_box: "#image-preview15",
				    label_field: "#image-label15",
				    label_default: "Choose File",
				    label_selected: "Change File",
				    no_label: false 
				  });
				});
			</script>
			<div class="right">
				<ul class="breadcrumb-menu flex">
					<li class="active"><a href="#">Личные данные</a></li>
					<!--<li><a href="#">Сообщения <span>14</span></a></li>-->
					<li><a href="#">История заказов</a></li>
					<li><a href="#">Мои лодки</a></li>
					<!--<li><a href="#">Избранное</a></li>-->
				</ul>
				<h4>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h4>
				<p>Зарегистрирован с 21 сентября, 2020 года</p>
			</div>
		</div>		
	</div>

	<div class="cabinet-content">
		<div class="container">
			<div class="cabinet-form flex">
				<div class="left">
					<h3>Ваша контактная информация</h3>
					<input type="text" placeholder="Имя" class="half">
					<input type="text" placeholder="Фамилия" class="half">
					<select class="half">
						<option value="Страна" disabled selected>Страна</option>
						<option value="Италия">Италия</option>
						<option value="Турция">Турция</option>
						<option value="Испания">Испания</option>
					</select>
					<input type="text" placeholder="Город" class="half">
					<input type="text" placeholder="Домашний адрес">
					<div class="bottom">
						<input type="text" placeholder="E-mail" class="cabinet-form-email half">
						<div class="cabinet-form-success half"><img src="img/podtver.png" alt=""></div>
						<input type="password" placeholder="Ваш телефон" class="cabinet-form-phone half">
						<a href="#" class="cabinet-form-btn btn">подтвердить</a>
					</div>
				</div>
				<div class="right">
					<h3>Смена пароля</h3>
					<div class="warning">
						<input type="password" placeholder="пароль">
					</div>
					<input type="password" placeholder="Новый пароль">
					<input type="password" placeholder="Повторите пароль">
				</div>
			</div>
			<a href="#" class="btn cabinet-save">сохранить изменения</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="margin-top:20px;">
				{{ csrf_field() }}
				<button class="btn cabinet-save">Выйти</button>
			</form>
		</div>
	</div>
    @endsection