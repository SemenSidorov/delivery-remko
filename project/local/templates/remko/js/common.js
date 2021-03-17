$(function () {
    var tabContainers = $('div.tabs > div');
    tabContainers.hide().filter(':first').show();
    $('div.tabs ul.tabNavigation a').click(function () {
        tabContainers.hide();
        tabContainers.filter(this.hash).show();
        $('div.tabs ul.tabNavigation a').removeClass('selected');
        $(this).addClass('selected');
        return false;
    }).filter(':first').click();
});

$(function(){
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
	$('.menubg, .top-menu .close').click(function() {
		$('.menubg').fadeOut();
		$('.top-menu').removeClass('opened');
	});
	$('.header .menu-button').click(function() {
		$('.menubg').fadeIn();
		$('.top-menu').addClass('opened');
	});
	$('.totop').bind("click", function(e){
	  var anchor = $(this);
	  $('html, body').stop().animate({
		 scrollTop: $(anchor.attr('href')).offset().top
	  }, 1000);
	  e.preventDefault();
	});
	$(window).scroll(function() {
		if($(this).scrollTop() > 280) {
			$('.totop').addClass('opened');
		} else {
			$('.totop').removeClass('opened');
		}
	});
	$('.index-catalog .list').slick({
		dots: true,
		arrows: false
	});
	$('.index-page-slider').slick({
		dots: true
	});
	$('.index-photo-slider .list').slick({
	  speed: 300,
	  slidesToShow: 5,
	  slidesToScroll: 1,
	  responsive: [
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesToShow: 4
	      }
	    },
	    {
	      breakpoint: 992,
	      settings: {
	        slidesToShow: 3
	      }
	    },
	    {
	      breakpoint: 767,
	      settings: {
	        slidesToShow: 2
	      }
	    },
	    {
	      breakpoint: 576,
	      settings: {
	        slidesToShow: 1
	      }
	    }
	  ]
	});
	$('.item-page .more-items').slick({
	  speed: 300,
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  responsive: [
	    {
	      breakpoint: 992,
	      settings: {
	        slidesToShow: 3
	      }
	    },
	    {
	      breakpoint: 767,
	      settings: {
	        slidesToShow: 2
	      }
	    },
	    {
	      breakpoint: 576,
	      settings: {
	        slidesToShow: 1
	      }
	    }
	  ]
	});
});

$(function(){

  $(".plus").click(function(){
    var quan_cookie = $.cookie('UF_QUANTITY');
    if(typeof quan_cookie != "undefined"){
      quan_cookie = JSON.parse(quan_cookie);
      var input = $(this).parent('.number').children('.quantity-input');
      console.log($(input).html());
      if(typeof quan_cookie['id' + $(input).attr('data-id')] != 'undefined'){
        quan_cookie['id' + $(input).attr('data-id')] = Number(quan_cookie['id' + $(input).attr('data-id')]) + 1;
      }else{
        quan_cookie['id' + $(input).attr('data-id')] = $(input).val();
      }
      document.cookie = "UF_QUANTITY="+JSON.stringify(quan_cookie)+"; path=/; max-age="+(60*60*24*365)+";"
    }else{
      var input = $(this).parent('.number').children('.quantity-input');
      var quan_cookies = {};
      quan_cookies['id' + $(input).attr('data-id')] = $(input).val();
      document.cookie = "UF_QUANTITY="+JSON.stringify(quan_cookies)+"; path=/; max-age="+(60*60*24*365)+";"
    }
  });

  $(".minus").click(function(){
    var quan_cookie = $.cookie('UF_QUANTITY');
    if(typeof quan_cookie != "undefined"){
      quan_cookie = JSON.parse(quan_cookie);
      var input = $(this).parent('.number').children('.quantity-input');
      console.log($(input).html());
      if(typeof quan_cookie['id' + $(input).attr('data-id')] != 'undefined'){
        quan_cookie['id' + $(input).attr('data-id')] = Number(quan_cookie['id' + $(input).attr('data-id')]) - 1;
      }else{
        quan_cookie['id' + $(input).attr('data-id')] = $(input).val();
      }
      document.cookie = "UF_QUANTITY="+JSON.stringify(quan_cookie)+"; path=/; max-age="+(60*60*24*365)+";"
    }else{
      var input = $(this).parent('.number').children('.quantity-input');
      var quan_cookies = {};
      quan_cookies['id' + $(input).attr('data-id')] = $(input).val();
      document.cookie = "UF_QUANTITY="+JSON.stringify(quan_cookies)+"; path=/; max-age="+(60*60*24*365)+";"
    }
  });

	$(".tocart").click(function(){
		var btn = this;
		if(!$(btn).hasClass("active")){
	    $.ajax({
        type: "POST",
        url: "/local/templates/remko/ajax-basket.php",
				data: {
					id_basket: $(btn).attr('data-id'),
					method: "add",
				},
        success: function(out){
					if(out == "success"){
            $(btn).addClass('active');
            $(btn).html('<span></span> Уже в корзине');
            $(btn).attr('href', '/personal/basket/');
            $('.header-cart span').html(Number($('.header-cart span').html()) + 1);
					}else {
						var data = JSON.parse(out);
						if(data.set !== 'undefined'){
							document.cookie = "UF_BASKET="+JSON.stringify(data.set)+"; path=/; max-age="+(60*60*24*365)+";"
              $('.header-cart span').html(Number($('.header-cart span').html()) + 1);
	            $(btn).addClass('active');
              $(btn).html('<span></span> Уже в корзине');
              $(btn).attr('href', '/personal/basket/');
						}else{
							console.log(out);
						}
					}
        },
				error: function(errors){
					console.log(errors);
				}
    	});
		}
  });

	$(".remove-cart").click(function(){
		var btn = this;
    $.ajax({
      type: "POST",
      url: "/local/templates/remko/ajax-basket.php",
			data: {
				id_basket: $(btn).attr('data-id'),
				method: "remove",
			},
      success: function(out){
				if(out == "success"){
          $('.header-cart span').html(Number($('.header-cart span').html()) - 1);
          $(btn).parent('.product-item').remove();
				}else {
					var data = JSON.parse(out);
					if(data.set !== 'undefined'){
						document.cookie = "UF_BASKET="+JSON.stringify(data.set)+"; path=/; max-age="+(60*60*24*365)+";"
            $('.header-cart span').html(Number($('.header-cart span').html()) - 1);
            $(btn).parent('.product-item').remove();
					}else{
						console.log(out);
					}
				}
      },
			error: function(errors){
				console.log(errors);
			}
  	});
  });

  $('#basket_form').on('submit', function(e) {
      e.preventDefault();
      var flag = true;
			var phone = $('.phone-basket-form');
			var name = $('.name-basket-form');
			var test = $('.test-basket-form');
			var message = $('.message-basket-form');
			var address = $('.address-basket-form');
			var time = $('.time-basket-form');
      if($(phone).val() == ''){
				$(phone).css({"border": "2px solid red"})
        flag = false;
      }
      if($(name).val() == ''){
				$(name).css({"border": "2px solid red"})
        flag = false;
      }
      var data_arr = '';
      $('.quantity-input').each(function(index, el){
        data_arr += $(el).attr('data-id') + ' ' + $(el).attr('data-name') + ': ' + $(el).val() + 'шт. <br>';
      });
      if(data_arr == ''){
        flag = false;
      }
			if(flag){
		    $.ajax({
	        type: "POST",
	        url: "/local/templates/remko/ajax-order.php",
					data: {
						phone: $(phone).val(),
						test: $(test).val(),
						name: $(name).val(),
						message: $(message).val(),
						address: $(address).val(),
						time: $(time).val(),
						data_arr: data_arr,
					},
	        success: function(out){
						if(out == "success"){
              $('.basket-catalog .wrap').html('<h2>Спасибо! Наш менеджер скоро с вами свяжется!</h2>');
						}else if(out == "set"){
  						document.cookie = "UF_BASKET=''; path=/; max-age=0;"
              $('.basket-catalog .wrap').html('<h2>Спасибо! Наш менеджер скоро с вами свяжется!</h2>');
						}else{
              $('.errorBasketForm').text(out);
						}
	        }
		    });
			}
	});

});
