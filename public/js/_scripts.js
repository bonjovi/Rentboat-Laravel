var swiper1 = new Swiper('.popular-slider .swiper-container', {
	effect: 'coverflow',
	grabCursor: true,
	centeredSlides: true,
	slidesPerView: 2,
	coverflowEffect: {
	rotate: 40,
	stretch: 0,
	depth: 100,
	modifier: 1,
	spaceBetween: 10,
	},
	loop: true,
	navigation: {
		nextEl: '.popular-slider .swiper-button-next',
		prevEl: '.popular-slider .swiper-button-prev'
	},
	breakpoints: {
		992: {
		slidesPerView: 1,
			effect: 'none',
		}
	}
});

var swiper2 = new Swiper('.traveler-reviews .swiper-container', {
	slidesPerView: 1,
	spaceBetween: 30,
	autoHeight: true,
	loop: true,
	pagination: {
		el: '.traveler-reviews .swiper-pagination',
		clickable: true
	},
	navigation: {
		nextEl: '.traveler-reviews .swiper-button-next',
		prevEl: '.traveler-reviews .swiper-button-prev'
	}
});

var swiper3 = new Swiper('.owner-reviews .swiper-container', {
	slidesPerView: 1,
	spaceBetween: 0,

	loop: true,
	pagination: {
		el: '.owner-reviews .swiper-pagination',
		clickable: true
	},
	navigation: {
		nextEl: '.owner-reviews .swiper-button-next',
		prevEl: '.owner-reviews .swiper-button-prev'
	}
});

var swiper4 = new Swiper('.product .swiper-container', {
	slidesPerView: 1,
	spaceBetween: 30,
	autoHeight: true,
	loop: true,
	pagination: {
		el: '.product .swiper-pagination',
		clickable: true
	},
	navigation: {
		nextEl: '.product .swiper-button-next',
		prevEl: '.product .swiper-button-prev'
	}
});

var swiper5 = new Swiper('.product-gallery .swiper-container', {
	slidesPerView: 2,
	spaceBetween: 24,
	centeredSlides: true,
	loop: true,
	pagination: {
		el: '.product-gallery .swiper-pagination',
		clickable: true
	},
	navigation: {
		nextEl: '.product-gallery .swiper-button-next',
		prevEl: '.product-gallery .swiper-button-prev'
	},
	breakpoints: {
		600: {
		slidesPerView: 1,
		}
	}
});

var swiper6 = new Swiper('.related .swiper-container', {
	slidesPerView: 4,
	spaceBetween: 24,
	centeredSlides: true,
	loop: true,
	navigation: {
		nextEl: '.related .swiper-button-next',
		prevEl: '.related .swiper-button-prev'
	},
	breakpoints: {
		992: {
		slidesPerView: 3,
		},
		768: {
		slidesPerView: 2,
		},
		600: {
		slidesPerView: 2,
		centeredSlides: false,
		spaceBetween: 15,
		},
		550:{
			slidesPerView: 1,

		}
	}
});

var galleryThumbs = new Swiper('.popular-gallery-thumbs', {
  spaceBetween: 15,
  slidesPerView: 6,
  freeMode: true,
  watchSlidesVisibility: true,
  watchSlidesProgress: true
});
var galleryTop = new Swiper('.popular-gallery-top', {
spaceBetween: 7,
slidesPerView: 1,
  centeredSlides: true,
  thumbs: {
    swiper: galleryThumbs
  },
  navigation: {
    nextEl: '.sw-bottom .swiper-button-next',
    prevEl: '.sw-bottom .swiper-button-prev',
  },
  breakpoints: {
    992: {
       spaceBetween: 20,
    },
    480: {
       
    }
  }
});











$(document).ready(function() {

	$('input[type=\'tel\']').mask('+7 (999) 999-99-99');

	$(".top .dropdown-toggle, .footer-language .dropdown-toggle").click(function(event) {
		event.preventDefault();
		event.stopPropagation();
		if ( $(this).parent().find('.dropdown').is( ":hidden" ) ) {
			$(this).parent().addClass('active');
			$('.top .dropdown').slideUp(300);
			$(this).parent().find('.dropdown').slideDown(300);
		} else {
			$(this).parent().removeClass('active');
			$(this).parent().find('.dropdown').slideUp(300);
		}

	});

	$(".search a").click(function(event) {
		event.preventDefault();
		if ( $(this).parent().find('.search-group').is( ":hidden" ) ) {
			$(this).parent().find('.search-group').slideDown(300);
		} else {
			$(this).parent().find('.search-group').slideUp(300);
		}

	});

	$(".filter-item .top").click(function(event) {
		event.preventDefault();
		var filterBox = $(this).parent().find('.filter-box');
		if ( filterBox.hasClass('show') ) {
			$(this).removeClass('active');
			filterBox.removeClass('show');
		} else {
			$(this).addClass('active');
			filterBox.addClass('show');
		}
	});

	$(".set > a").on("click", function(e){
		e.preventDefault();
		$('.set').removeClass('activ');
		$(this).parent('.set').addClass('activ')
		if($(this).hasClass('active')){
			$(this).removeClass("active");
			$(this).parent('.set').removeClass('activ');
			$(this).siblings('.set-content').slideUp(200);
			$(".set > a i").removeClass("set-minus").addClass("set-plus");
		}else{
			$(".set > a i").removeClass("set-minus").addClass("set-plus");
			$(this).find("i").removeClass("set-plus").addClass("set-minus");
			$(".set > a").removeClass("active");
			$(this).addClass("active");
			$('.set-content').slideUp(200);
			$(this).siblings('.set-content').slideDown(200);
		}
	  
	});

	$('.top-user, .comment-form .btn, .post-info-share,.product-item-last-bottom .btn, .login-btn, .rent-boat, .rent-btn, .reg-btn, .add-boat, .success-btn, .add-success-btn, .product-btn, .main-banner .btn, .owner .btn').magnificPopup({
		type: 'inline'
	});

	$(".top-menu").click(function(event) {
		event.preventDefault();
		event.stopPropagation();
		if ( $(".mob-menu" ).is( ":hidden" ) ) {
			$(this).addClass('active');
			$(".mob-menu" ).slideDown(300);
		} else {
			$(this).removeClass('active');
			$(".mob-menu" ).slideUp(300);
		}

	});

	$('.video-play img').click(function(){
		$(this).parent().parent().addClass('active');
		$(".video-play video")[0].play();
		return false;
	});

	$('body').click(function(e) {

		$(".top .dropdown, .search-group, .mob-menu").slideUp(300);
	});

	$(".dropdown, .search a,.search-group, .mob-menu").click(function(e) {
		e.stopPropagation();
	});
	$(".add-form-item, .add-items button").click(function(event) {
		event.preventDefault();
		var vall = $(".data-input").val();
		if (vall) {
			$(".add-form-tags .flex").append("<p>"+ vall + '<a href="#"></a></p>');
		}
	});

	$(".add-form-tags p a").click(function(event) {
		$(this).parent().remove();
	});


	

	$(".mob-nav, .mob-menu").click(function(event) {
		event.stopPropagation();
	});

	$(window).scroll(function(){
	    if($(this).scrollTop()>150){
	        $('header').addClass('fixed');
	    }
	    else if ($(this).scrollTop()<150){
	        $('header').removeClass('fixed');
	    }

	});

	if ($(window).width() > 992){
		$(window).scroll(function(){

		    if($(this).scrollTop()>400){
		        $('.category-filter').addClass('fixed');
		    }
		    else if ($(this).scrollTop()<400){
		        $('.category-filter').removeClass('fixed');
		    }

		});
	}

	if ($(window).width() < 992){
		$('.filter-btn').click(function(event) {
			event.preventDefault();
			if ( $(".category-filter.fixed" ).is( ":hidden" ) ) {
				$(this).addClass('active');
				$(".category-filter" ).slideDown(300);
			} else {
				$(this).removeClass('active');
				$(".category-filter" ).slideUp(300);
			}
		});
		$(window).scroll(function(){

		    if($(this).scrollTop()>200){
		    	$('.category-filter').addClass('fixed');
		        $('.filter-btn').slideDown(300);
		    }
		    else if ($(this).scrollTop()<200){
		        $('.category-filter').removeClass('fixed');
		    	$('.filter-btn').slideUp(300);
		    }

		});
	}

	$('.product-caption-more').bind('click', function(e) {
	e.preventDefault();
	
	
	$('html, body').stop().animate({ scrollTop: $(".accordion-container").offset().top}, 500, function() {
	location.hash = target;
	});
	$("#more-detals > a").trigger('click');
	
	return false;
	});
	

	$("#arend_date").on('focusout', function() {
		var ts = Date.parse($("#arend_date").val())/1000;
		var timestamp = new Date(+ts * 1000);
		var month= timestamp.getMonth();
		var arr=[
		   'Января',
		   'Февраля',
		   'Марта',
		   'Апреля',
		   'Мая',
		   'Июня',
		   'Июля',
		   'Августа',
		   'Сентября',
		   'Октября',
		   'Ноября',
		   'Декабря',
		];
		$(".bron-date h5").text(timestamp.getDate() + ' ' + arr[month]);
		if ($("#arend_srok").val() >= 86400) {
			var ass = +$("#arend_srok").val() + Date.parse($("#arend_date").val())/1000;
			var tims = new Date(ass * 1000);
			var month= tims.getMonth();
			$(".bron-date h5").text(timestamp.getDate() + ' ' + arr[month] + ' - ' + tims.getDate() + ' ' + arr[month]);
		}

	});

	$("#arend_srok").on('change', function() {
		if ($("#arend_date").val()) {
			var ts = Date.parse($("#arend_date").val())/1000;
			var timestamp = new Date(+ts * 1000);
			var month= timestamp.getMonth();
			var arr=[
			   'Января',
			   'Февраля',
			   'Марта',
			   'Апреля',
			   'Мая',
			   'Июня',
			   'Июля',
			   'Августа',
			   'Сентября',
			   'Октября',
			   'Ноября',
			   'Декабря',
			];
			if ($("#arend_srok").val() >= 86400) {
				var ass = +$("#arend_srok").val() + Date.parse($("#arend_date").val())/1000;
				var tims = new Date(ass * 1000);
				var month= tims.getMonth();
				$(".bron-date h5").text(timestamp.getDate() + ' ' + arr[month] + ' - ' + tims.getDate() + ' ' + arr[month]);
			}else{
				$(".bron-date h5").text(timestamp.getDate() + ' ' + arr[month]);
			}
		}
	});


	

	
		
	






	





















 


});










(function($) {
  $(function() {
    $("ul.tabs__caption").on("click", "li:not(.active)", function() {
      $(this)
        .addClass("active")
        .siblings()
        .removeClass("active")
        .closest("div.tabs")
        .find("div.tabs__content")
        .removeClass("active")
        .eq($(this).index())
        .addClass("active");
    });
  });
})(jQuery);


		$(document).ready(function() {
		  $.uploadPreview({
		    input_field: "#image-upload6",
		    preview_box: "#image-preview6",
		    label_field: "#image-label6",
		    label_default: "Choose File",
		    label_selected: "Change File",
		    no_label: false 
		  });
		});

		$(document).ready(function() {
		  $.uploadPreview({
		    input_field: "#image-upload5",
		    preview_box: "#image-preview5",
		    label_field: "#image-label5",
		    label_default: "Choose File",
		    label_selected: "Change File",
		    no_label: false 
		  });
		});

		$(document).ready(function() {
		  $.uploadPreview({
		    input_field: "#image-upload2",
		    preview_box: "#image-preview2",
		    label_field: "#image-label2",
		    label_default: "Choose File",
		    label_selected: "Change File",
		    no_label: false 
		  });
		});

		$(document).ready(function() {
		  $.uploadPreview({
		    input_field: "#image-upload",
		    preview_box: "#image-preview",
		    label_field: "#image-label",
		    label_default: "Choose File",
		    label_selected: "Change File",
		    no_label: false 
		  });
		});
		$(document).ready(function() {
		  $.uploadPreview({
		    input_field: "#image-upload3",
		    preview_box: "#image-preview3",
		    label_field: "#image-label3",
		    label_default: "Choose File",
		    label_selected: "Change File",
		    no_label: false 
		  });
		});
		$(document).ready(function() {
		  $.uploadPreview({
		    input_field: "#image-upload4",
		    preview_box: "#image-preview4",
		    label_field: "#image-label4",
		    label_default: "Choose File",
		    label_selected: "Change File",
		    no_label: false 
		  });
		});
(function($) {
	  	$(function() {

	  		$('select').styler();

	  	});
	  	})(jQuery);