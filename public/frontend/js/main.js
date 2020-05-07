(function ($) {
"use strict";

// preloader
function preloader() {
	$('#preloader').delay(0).fadeOut();
};

var win = $(window);
win.on('load', function () {
	preloader(),
		wowanimation();
});


// meanmenu
$('#mobile-menu').meanmenu({
	meanMenuContainer: '.mobile-menu',
	meanScreenWidth: "992"
});


// sticky
win.on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 245) {
		$("#header-sticky").removeClass("sticky-menu");
	} else {
		$("#header-sticky").addClass("sticky-menu");
	}
});


// data - background
$("[data-background]").each(function () {
	$(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
})


// mainSlider
function mainSlider() {
	var BasicSlider = $('.slider-active');
	BasicSlider.on('init', function (e, slick) {
		var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
		doAnimations($firstAnimatingElements);
	});
	BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
		var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
		doAnimations($animatingElements);
	});
	BasicSlider.slick({
		autoplay: false,
		autoplaySpeed: 10000,
		dots: false,
		fade: true,
    arrows: true,
    prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
		responsive: [
			{ breakpoint: 1200, settings: { dots: false, arrows: false } }
		]
	});

	function doAnimations(elements) {
		var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		elements.each(function () {
			var $this = $(this);
			var $animationDelay = $this.data('delay');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
				'animation-delay': $animationDelay,
				'-webkit-animation-delay': $animationDelay
			});
			$this.addClass($animationType).one(animationEndEvents, function () {
				$this.removeClass($animationType);
			});
		});
	}
}
mainSlider();


// courses-active
$('.courses-active').slick({
  dots: false,
  infinite: true,
  speed: 1000,
  arrows: true,
  prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
  nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
  slidesToShow: 4,
  slidesToScroll: 2,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        arrows: false,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
		    slidesToScroll: 1,
		    arrows: false,
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
		    slidesToScroll: 1,
		    arrows: false,
      }
    },
  ]
});

// testimonial-active
$('.testimonial-active').slick({
  dots: false,
  infinite: true,
  speed: 1000,
  arrows: true,
  prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
  nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 575,
      settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      }
    },
  ]
});

// student-review-active
$('.student-review-active').slick({
  dots: false,
  infinite: true,
  speed: 1000,
  arrows: false,
  autoplay: true,
  slidesToShow: 1,
  slidesToScroll: 1,
});


// testimonial-active
$('.s-testi-active').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  speed: 1000,
  fade: true,
  asNavFor: '.testimonial-nav'
});
$('.testimonial-nav').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  asNavFor: '.s-testi-active',
  dots: false,
  speed: 1000,
  prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
  nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
  centerMode: false,
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
      }
    },
  ]
});


// courses-tab-active
$('.three-courses-active').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  speed: 1000,
  prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
  nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
  asNavFor: '.courses-nav-active',
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        arrows: false,
      }
    },
    {
      breakpoint: 767,
      settings: {
        fade: true,
        arrows: false,
      }
    },
  ]
});
$('.courses-nav-active').slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  asNavFor: '.three-courses-active',
  dots: false,
  arrows: false,
  speed: 1000,
  centerMode: true,
  centerPadding: '0px',
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
      }
    },
  ]
});

// brand-active
$('.brand-active').slick({
  dots: false,
  infinite: true,
  speed: 1000,
  arrows: false,
  slidesToShow: 4,
  slidesToScroll: 2,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
		    slidesToScroll: 1,
		    arrows: false,
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
		    slidesToScroll: 1,
		    arrows: false,
      }
    },
  ]
});

// five-s-courses-active
$('.five-s-courses-active').slick({
  dots: false,
  infinite: true,
  speed: 1000,
  arrows: false,
  slidesToShow: 2,
  slidesToScroll: 1,
  centerMode: true,
  centerPadding: '350px',
  responsive: [
    {
      breakpoint: 1800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        centerPadding: '220px',
      }
    },
    {
      breakpoint: 1500,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        centerPadding: '150px',
      }
    },
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        centerPadding: '50px',
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        centerPadding: '150px',
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
		    slidesToScroll: 1,
        arrows: false,
        centerPadding: '100px',
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
		    slidesToScroll: 1,
        arrows: false,
        centerPadding: '0px',
      }
    },
  ]
});

// event-active
$('.event-active').slick({
  dots: true,
  infinite: true,
  speed: 1000,
  arrows: false,
  centerMode: true,
  centerPadding: '0px',
  autoplay: false,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
		    slidesToScroll: 1,
		    arrows: false,
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
		    slidesToScroll: 1,
		    arrows: false,
      }
    },
  ]
});

// counterUp
$('.count').counterUp({
	delay: 10,
	time: 2000
});


/* magnificPopup img view */
$('.popup-image').magnificPopup({
	type: 'image',
	gallery: {
	  enabled: true
	}
});

/* magnificPopup video view */
$('.popup-video').magnificPopup({
	type: 'iframe'
});

// niceSelect;
$("select").niceSelect();


/*----- cart-plus-minus-button -----*/
$(".cart-plus-minus").append('<span class="dec qtybutton">-</span><span class="inc qtybutton">+</span>');
$(".qtybutton").on("click", function () {
  var $button = $(this);
  var oldValue = $button.parent().find("input").val();
  if ($button.text() == "+") {
    var newVal = parseFloat(oldValue) + 1;
  } else {
    // Don't allow decrementing below zero
    if (oldValue > 0) {
      var newVal = parseFloat(oldValue) - 1;
    } else {
      newVal = 0;
    }
  }
  $button.parent().find("input").val(newVal);
});


// isotop
$('.courses-grid-active').imagesLoaded( function() {
	// init Isotope
  var $grid = $('.courses-grid-active').isotope({
	  itemSelector: '.grid-item',
	  percentPosition: true,
	  masonry: {
      columnWidth: '.grid-sizer'
	  }
	});
  // filter items on button click
  $('.courses-menu-list').on( 'click', 'button', function() {
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({ filter: filterValue });
  });
});

//for menu active class
$('.courses-menu-list button').on('click', function(event) {
	$(this).siblings('.active').removeClass('active');
	$(this).addClass('active');
	event.preventDefault();
});


// aos-active
AOS.init({
	duration: 1000,
	mirror: true
});



// scrollToTop
$.scrollUp({
	scrollName: 'scrollUp',
	topDistance: '300',
	topSpeed: 300,
	animation: 'fade',
	animationInSpeed: 200,
	animationOutSpeed: 200,
  scrollText: '<i class="fas fa-level-up-alt"></i>',
	activeOverlay: false,
});

// WOW active
function wowanimation() {
	var wow = new WOW({
		boxClass: 'wow',
		animateClass: 'animated',
		offset: 0,
		mobile: false,
		live: true
	});
	wow.init();
}


})(jQuery);