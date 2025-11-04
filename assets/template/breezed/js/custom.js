(function ($) {

	"use strict";

	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	  });

	// $(window).on('scroll', function() {
	//   var scroll = $(window).scrollTop();
	//   var box = $('.header-text').height();
	//   var header = $('header').height();

	//   if (scroll >= box - header) {
	//     $("header").addClass("background-header");
	//   } else {
	//     $("header").removeClass("background-header");
	//   }
	// });


var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 500) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '100');
});


$('.jarallax').jarallax({
    speed: 0.2
});

	if ($.fn.owlCarousel) {
	$(".clients-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 2
      },
      900: {
        items: 4
      }
    }
  });

    $(".testimonials-slides").owlCarousel({
        items: 1,
        margin: 0,
        loop: true,
        autoplay: true,
        smartSpeed: 1000,
        nav: true,
        navText: ["<i class='carousel-control-prev-icon'</i>", "<i class='carousel-control-next-icon'</i>"],
        dots: false
    });
  }



  if($.fn.tooltip) {
    $('[data-toggle="tooltip"]').tooltip();
  }

	$('.filters ul li').click(function(){
	  $('.filters ul li').removeClass('active');
	  $(this).addClass('active');

	  var data = $(this).attr('data-filter');
	  $grid.isotope({
	    filter: data
	  })
	});

	var $grid = $(".grid").isotope({
	  itemSelector: ".all",
	  percentPosition: true,
	  masonry: {
	    columnWidth: ".all"
	  }
	})

	// $(".Modern-Slider").slick({
	//     autoplay:true,
	//     autoplaySpeed:10000,
	//     speed:600,
	//     slidesToShow:1,
	//     slidesToScroll:1,
	//     pauseOnHover:false,
	//     dots:true,
	//     pauseOnDotsHover:true,
	//     cssEase:'linear',
	//    // fade:true,
	//     draggable:false,
	//     prevArrow:'<button class="PrevArrow"></button>',
	//     nextArrow:'<button class="NextArrow"></button>',
	//   });


	  // Search
	$('.search-icon a').on("click", function(event) {
	    event.preventDefault();
	    $("#search").addClass("open");
	    $('#search > form > input[type="text"]').focus();
	  });

	  $("#search, #search button.close").on("click keyup", function(event) {
	    if (
	      event.target == this ||
	      event.target.className == "close" ||
	      event.keyCode == 27
	    ) {
	      $(this).removeClass("open");
	    }
	  });

	  $("#search-box").submit(function(event) {
	    event.preventDefault();
	    return false;
	  });




	// Window Resize Mobile Menu Fix
	mobileNav();


	// Scroll animation init
	window.sr = new scrollReveal();


	// Menu Dropdown Toggle
	if($('.menu-trigger').length){
		$(".menu-trigger").on('click', function() {
			$(this).toggleClass('active');
			$('.header-area .nav').slideToggle(200);
		});
	}


	// Menu elevator animation
	// $('a[href*=\\#]:not([href=\\#])').on('click', function() {
	// 	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	// 		var target = $(this.hash);
	// 		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	// 		if (target.length) {
	// 			var width = $(window).width();
	// 			if(width < 991) {
	// 				$('.menu-trigger').removeClass('active');
	// 				$('.header-area .nav').slideUp(200);
	// 			}
	// 			$('html,body').animate({
	// 				// scrollTop: (target.offset().top) - 80
	// 			}, 700);
	// 			return false;
	// 		}
	// 	}
	// });

	// $(document).ready(function () {
	//     $(document).on("scroll", onScroll);

	//     //smoothscroll
	//     $('a[href^="#"]').on('click', function (e) {
	//         e.preventDefault();
	//         $(document).off("scroll");

	//         $('a').each(function () {
	//             $(this).removeClass('active');
	//         })
	//         $(this).addClass('active');

	//         var target = this.hash,
	//         menu = target;
	//        	var target = $(this.hash);
	//         $('html, body').stop().animate({
	//             // scrollTop: (target.offset().top) - 79
	//         }, 500, 'swing', function () {
	//             window.location.hash = target;
	//             $(document).on("scroll", onScroll);
	//         });
	//     });
	// });

	// Page loading animation
	$(window).on('load', function() {
		if($('.cover').length){
			$('.cover').parallax({
				imageSrc: $('.cover').data('image'),
				zIndex: '1'
			});
		}

		$("#preloader").animate({
			'opacity': '0'
		}, 600, function(){
			setTimeout(function(){
				$("#preloader").css("visibility", "hidden").fadeOut();
			}, 300);
		});
	});


	// Window Resize Mobile Menu Fix
	$(window).on('resize', function() {
		mobileNav();
	});


	// Window Resize Mobile Menu Fix
// 	function mobileNav() {
// 		var width = $(window).width();
// 		$('.submenu').on('click', function() {
// 			if(width < 999) {
// 				$('.submenu ul').removeClass('active');
// 				$(this).find('ul').toggleClass('active');
// 			}
// 		});
// 	}

function mobileNav() {
		var width = $(window).width();
		$('.submenu').click(function() {
			if(width < 999) {
				$('.submenu ul li').removeClass('active');
				$(this).find('ul').toggleClass('active');

			}
		});
	}


})(window.jQuery);
