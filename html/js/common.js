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