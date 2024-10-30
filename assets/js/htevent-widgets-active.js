(function($){
"use strict";

/*------ single post slider------*/
$('.htevent-single-item').slick({
    arrows: false,
    dots: false,
    autoplay: true,
});
/*--
    Gallery Hover Effect 
------------------------*/

 var WidgetHteventGalleryHandler = function ($scope, $) {

    $('.gallery-wrapper > div').each( function() { $(this).hoverdir(); } );

    /*--
        Magnific Video Popup
    --------------------------------*/
    var popupGallery = $('.popup-gallery');
    popupGallery.magnificPopup({
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        gallery: {
            enabled: true,
        },
    });

}
 var WidgetHteventVideoHandler = function ($scope, $) {
/*--
    Magnific Video Popup
--------------------------------*/
var imagePopup = $('.image-popup');
imagePopup.magnificPopup({
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    gallery: {
        enabled: true,
    },
});
var videoPopup = $('.video-popup');
videoPopup.magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    zoom: {
        enabled: true,
    }
});
$('.htevent-about-video-slider').slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: true,
    pauseOnFocus: false,
    pauseOnHover: false,
    infinite: true,
    slidesToShow: 1,
});
}

/*--
    Speaker One Slider
-----------------------------------*/
 var WidgetHteventSpeakerHandler = function ($scope, $) {


    if($('.htevent-speaker-one-slider').length){

    var slider_elem = $scope.find('.htevent-speaker-one-slider').eq(0);

    var settings = slider_elem.data('settings');
    var arrows = settings['arrows'];
    var dots = settings['dots'];
    var autoplay = settings['autoplay'];
    var autoplay_speed = parseInt(settings['autoplay_speed']) || 4000;

      if (slider_elem.length > 0) {

        slider_elem.slick({
            arrows: arrows,
            autoplay: autoplay,
            autoplaySpeed: autoplay_speed,
            dots: dots,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,    
            prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
            responsive: [
                {
                  breakpoint: 1199,
                  settings: {
                    slidesToShow: 3,
                  }
                },
                {
                  breakpoint: 991,
                  settings: {
                    slidesToShow: 2,
                  }
                },
                {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 1,
                  }
                }
            ]
        });
}

}
  if($('.speaker-share-toggle').length){
    $('.speaker-share-toggle').on('click', function(){
        $(this).siblings('.share').toggleClass('open');
    });

    }

}

/*-- Hero Slider One --*/

 var WidgetHteventSliderHandler = function ($scope, $) {

    if($('.htevent-hero-slider').length){

      var slider_elem = $scope.find('.htevent-hero-slider').eq(0);

        var settings = slider_elem.data('settings');
        var arrows = settings['arrows'];
        var dots = settings['dots'];
        var autoplay = settings['autoplay'];
        var autoplay_speed = parseInt(settings['autoplay_speed']) || 4000;

        if (slider_elem.length > 0) {
          slider_elem.slick({
            arrows: arrows,
            autoplay: autoplay,
            autoplaySpeed: autoplay_speed,
            dots: dots,
            pauseOnFocus: false,
            pauseOnHover: false,
            fade: true,
            infinite: true,
            slidesToShow: 1,
            prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
        });

        /*--
    Hero Slider One Dot Style 
-----------------------------------*/
$('.htevent-hero-slider-one .slick-dots li').each(function() {
    $(this).append('<svg class="hero-dot-circle"><circle class="shape" fill="none" cx="20" cy="20" r="19" stroke-dasharray="1000" stroke-dashoffset="1000"/></svg>');
});
        }

    }

 if($('.htevent-hero-slider2').length){
    $('.htevent-hero-slider2').slick({
    arrows: false,
    autoplay: false,
    autoplaySpeed: 5000,
    dots: true,
    pauseOnFocus: false,
    pauseOnHover: false,
    fade: true,
    infinite: true,
    slidesToShow: 1,
});

}
 if($('.hero-slider-2').length){
    /*-- Hero Slider Two --*/
$('.hero-slider-2').slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: true,
    pauseOnFocus: false,
    pauseOnHover: false,
    infinite: true,
    slidesToShow: 1,
});

}

 }
 //countdown
  var WidgetCountdownMapHandler = function ($scope, $) {
 $('[data-countdown]').each(function() {
    var $this = $(this), finalDate = $(this).data('countdown');
    $this.countdown(finalDate, function(event) {
        $this.html(event.strftime('<span class="cdown day"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hours</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Minute</p></span> <span class="cdown second"><span class="time-count">%S</span> <p>Second</p></span>'));
    });
});

}
 //countdown
var WidgetTestimonialHandler = function ($scope, $) {

/*--
    Testimonial Slider One
-----------------------------------*/ 
$('.testimonial-slider-one').slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    pauseOnFocus: false,
    pauseOnHover: false,
    infinite: true,
    slidesToShow: 1,
});

/*--
    Testimonial Slider Two
-----------------------------------*/ 
$('.testimonial-slider-two').slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: true,
    pauseOnFocus: false,
    pauseOnHover: false,
    infinite: true,
    slidesToShow: 1,
});
}

// enent slider

 var WidgetUpcommingEventHandler = function ($scope, $) {
/*--
    Upcoming Event Slider
-----------------------------------*/
if($('.upcoming-event-slider').length){
    $('.upcoming-event-slider').slick({
        arrows: false,
        autoplay: true,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
              breakpoint: 1500,
              settings: {
                slidesToShow: 4,
              }
            },
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 1,
              }
            }
        ]
    });

}
// category slider
if($('.htevent-category-slider').length){
    $('.htevent-category-slider').slick({
        arrows: false,
        autoplay: true,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 1,
              }
            }
        ]
    });
}

}

// product slider

 var WidgetHteventProductSlider = function ($scope, $) {

    /*--
    Product Event Slider
-----------------------------------*/
$('.product-slider.carousel_slide').slick({
    arrows: false,
    autoplay: false,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
        {
          breakpoint: 1199,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
          }
        }
    ]
});

 }


 // Run this code under Elementor.
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/htevent-slider.default', WidgetHteventSliderHandler);

        elementorFrontend.hooks.addAction( 'frontend/element_ready/htevent-speaker.default', WidgetHteventSpeakerHandler);
        //gallery
        elementorFrontend.hooks.addAction( 'frontend/element_ready/htevent-event-gallery-addons.default', WidgetHteventGalleryHandler);
        //countdowun
        elementorFrontend.hooks.addAction( 'frontend/element_ready/htevent-countdown.default', WidgetCountdownMapHandler);
        //testimonial
        elementorFrontend.hooks.addAction( 'frontend/element_ready/htevent_testimonial.default', WidgetTestimonialHandler);
        //upcomming event
        elementorFrontend.hooks.addAction( 'frontend/element_ready/htevent-event-addons.default', WidgetUpcommingEventHandler);
        //video
        elementorFrontend.hooks.addAction( 'frontend/element_ready/htevent_video.default', WidgetHteventVideoHandler);
        //product slider
        elementorFrontend.hooks.addAction( 'frontend/element_ready/htevent_wooproduct_style.default', WidgetHteventProductSlider);
    });

})(jQuery);