$(document).ready(function(){
	"use strict";
	

	/*
	==============================================================
	 COUNTDOWN  Script Start
	==============================================================
	*/
	if($('.countdown').length){
		$('.countdown').downCount({ date: '8/8/2017 12:00:00', offset: +1 });
	}
 
	/*
  ==============================================================
     Counter Script Start
  ==============================================================
  */
    if($('.counter').length){
        $('.counter').counterUp({
          delay: 20,
          time: 1000
        });
    }
  /*
  ==============================================================
   COUNTDOWN  Script Start
  ==============================================================
  */
	if($('.countdown').length){
		$('.countdown').downCount({ date: '5/1/2017 12:00:00', offset: +1 });
	}
  
	/*
	=======================================================================
		 Pretty Photo Script Script
	=======================================================================
	*/
	if($('.slider-range').length){
		$( ".slider-range" ).slider({
		  range: true,
		  min: 0,
		  max: 500,
		  values: [ 0, 350 ],
		  slide: function( event, ui ) {
			$( ".amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		  }
		});
		$( ".amount" ).val( "$" + $( ".slider-range" ).slider( "values", 0 ) +
		  " - $" + $( ".slider-range" ).slider( "values", 1 ) );
	}
	
	
	/*
	=======================================================================
		 Pretty Photo Script Script
	=======================================================================
	*/
	if($('.progress-bar').length){
		$(".progress-bar").each(function(){
		  each_bar_width = $(this).attr('aria-valuenow');
		  $(this).width(each_bar_width + '%');
		});
	}

  /*
    =======================================================================
         Pretty Photo Script Script
    =======================================================================
  */
    if($("a[data-rel^='prettyPhoto']").length){
      $("a[data-rel^='prettyPhoto']").prettyPhoto();
    }
 

    /*
    ==============================================================
        DL Responsive Menu
    ==============================================================
    */
    if(typeof($.fn.dlmenu) == 'function'){
      $('#kode-responsive-navigation').each(function(){
        $(this).find('.dl-submenu').each(function(){
        if( $(this).siblings('a').attr('href') && $(this).siblings('a').attr('href') != '#' ){
          var parent_nav = $('<li class="menu-item kode-parent-menu"></li>');
          parent_nav.append($(this).siblings('a').clone());

          $(this).prepend(parent_nav);
        }
        });
        $(this).dlmenu();
      });
    }


  /*
  ==============================================================
      SLICK SLIDER 2 WITH NAVIGATION
  ==============================================================
  */
  if($('.slider-for2').length){
    $('.slider-for2').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      dots: true,
      asNavFor: '.slider-nav2'
    });
  }
  
  if($('.slider-nav2').length){
    $('.slider-nav2').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider-for2',
      dots: false,
      vertical: false,
      centerMode: true,
      focusOnSelect: true,
      arrows: false,
      autoplay: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
  }
 
	
	$(".filter-button").on('click',function(){
		var value = $(this).attr('data-filter');
		
		if(value == "all")
		{				
			$('.filter').show('1000');
		}
		else
		{
			$(".filter").not('.'+value).hide('1000');
			$('.filter').filter('.'+value).show('1000');
			
		}
		if ($(".filter-button").addClass("active")) {
			$(this).removeClass("active");
		}
		$(this).removeClass("active");
	});
	
	

	

  /*
  ==============================================================
  BRAND SLIDER  SCRIPT START
  ==============================================================
  */
  if($('.brand-slider').length){
    $('.brand-slider').slick({
      dots: false,
      autoplay: true,
      autoplaySpeed: 2000,
      slidesToShow: 4,
      arrows: true,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
  }

  /*
  ==============================================================
  BRAND SLIDER  SCRIPT START
  ==============================================================
  */
  if($('.d-help-donar-slider').length){
    $('.d-help-donar-slider').slick({
      dots: true,
      autoplay: true,
      autoplaySpeed: 2000,
      slidesToShow: 1,
      arrows: true,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
  }
  /*
  ==============================================================
  BRAND SLIDER  SCRIPT START
  ==============================================================
  */
  if($('.d-help-listing-slid').length){
    $('.d-help-listing-slid').slick({
      dots: true,
      autoplay: true,
      autoplaySpeed: 2000,
      slidesToShow: 1,
      arrows: true,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
  }


    /*
  ==============================================================
      SLICK SLIDER 2 WITH NAVIGATION
  ==============================================================
  */
  if($('.d-help-slider-for2').length){
    $('.d-help-slider-for2').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
	  auto:true,
      fade: true,
      dots: true,
      // asNavFor: '.d-help-slider-nav2'
    });
  }
  if($('.d-help-slider-nav2').length){
    $('.d-help-slider-nav2').slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      asNavFor: '.d-help-slider-for2',
      dots: false,
      vertical: false,
      centerMode: false,
      focusOnSelect: true,
      arrows: false,
      autoplay: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
  }
 
   /*
  ==============================================================
     SLICK SLIDER TESTIMONIAL
  ==============================================================
  */
  if($('.twitter-twite-slider').length){
    $('.twitter-twite-slider').slick({
      slidesToShow: 2,
      dots: false,
      arrows: true,
      vertical: true,
      responsive: [
        {
          breakpoint: 1680,
          settings: {
            arrows: true,
            slidesToShow: 2
          }
        },
        {
          breakpoint: 481,
          settings: {
            arrows: true,
            slidesToShow: 2
          }
        }
      ]
    });
  }
     /*
  ==============================================================
     SLICK SLIDER TESTIMONIAL
  ==============================================================
  */
  if($('.d-help-testimonial-slider').length){
    $('.d-help-testimonial-slider').slick({
      slidesToShow: 2,
      dots: true,
      arrows: false,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            slidesToShow: 1
          }
        },
        {
          breakpoint: 481,
          settings: {
            arrows: false,
            slidesToShow: 1
          }
        }
      ]
    });
  }
  
 if($('.chosen-select').length){
	$(".chosen-select").chosen()
 }
	
/*================================================
			slider start
	=================================================*/ 
	if($('.bx-pager').length){
		$('.bx-pager').bxSlider({
			
		  auto:true,
		  pagerCustom: '#bx-pager'
		  
		});
	}
	
	
  /*================================================
			spinner start
	=================================================*/ 
	if($('#spinner').length){
	 $( "#spinner" ).spinner();
	}
	
	if($('.tabset1').length){
		$('.tabset1').pwstabs({
			effect: 'scale',
			defaultTab: 3,
			containerWidth: '100%'
		});
	}
	
	if($('.hover-overlay').length){
		$('.hover-overlay').plate({
			inverse: true
		});
	}
	
	
	if($('#demo').length){
		$('#demo').dcalendarpicker();
	}	

	if($('.countdown').length){
		$('.countdown').downCount({ date: '08/08/2018 12:00:00', offset: +1 });
	}
	
	
	function openNav() {
		document.getElementById("mySidenav").style.width = "350px";
		document.getElementById("main").style.marginRight = "350px";
	}

	function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
		document.getElementById("main").style.marginRight= "0";
	}
	
	/*		
    =======================================================================
            Map Script
    =======================================================================
  */
    if($('#map-canvas').length){
      google.maps.event.addDomListener(window, 'load', initialize);
    }
	
	/* ---------------------------------------------------------------------- */
	/*	Accordion Script
	/* ---------------------------------------------------------------------- */
	if($('.modern-accordion').length){
		//custom animation for open/close
		$.fn.slideFadeToggle = function(speed, easing, callback) {
		  return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
		};

		$('.modern-accordion').accordion({
		  defaultOpen: '#section1',
		  cookieName: 'nav',
		  speed: 'slow',
		  animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
			elem.next().stop(true, true).slideFadeToggle(opts.speed);
		  },
		  animateClose: function (elem, opts) { //replace the standard slideDown with custom function
			elem.next().stop(true, true).slideFadeToggle(opts.speed);
		  }
		});
	}
});	
  /*
    =======================================================================
         Map Custom Style Script Script
    =======================================================================
  */
	function initialize() {
		var MY_MAPTYPE_ID = 'custom_style';
		var map;
		var brooklyn = new google.maps.LatLng(40.6743890, -73.9455);
		var featureOpts = [
			{
				"featureType": "administrative",
				"elementType": "all",
				"stylers": [
						{
								"saturation": "-100"
						}
				]
		},
		{
				"featureType": "administrative.province",
				"elementType": "all",
				"stylers": [
						{
								"visibility": "off"
						}
				]
		},
		{
				"featureType": "landscape",
				"elementType": "all",
				"stylers": [
						{
								"saturation": -100
						},
						{
								"lightness": 65
						},
						{
								"visibility": "on"
						}
				]
		},
		{
				"featureType": "poi",
				"elementType": "all",
				"stylers": [
						{
								"saturation": -100
						},
						{
								"lightness": "50"
						},
						{
								"visibility": "simplified"
						}
				]
		},
		{
				"featureType": "road",
				"elementType": "all",
				"stylers": [
						{
								"saturation": "-100"
						}
				]
		},
		{
				"featureType": "road.highway",
				"elementType": "all",
				"stylers": [
						{
								"visibility": "simplified"
						}
				]
		},
		{
				"featureType": "road.arterial",
				"elementType": "all",
				"stylers": [
						{
								"lightness": "30"
						}
				]
		},
		{
				"featureType": "road.local",
				"elementType": "all",
				"stylers": [
						{
								"lightness": "40"
						}
				]
		},
		{
				"featureType": "transit",
				"elementType": "all",
				"stylers": [
						{
								"saturation": -100
						},
						{
								"visibility": "simplified"
						}
				]
		},
		{
				"featureType": "water",
				"elementType": "geometry",
				"stylers": [
						{
								"hue": "#ffff00"
						},
						{
								"lightness": -25
						},
						{
								"saturation": -97
						}
				]
		},
		{
				"featureType": "water",
				"elementType": "labels",
				"stylers": [
						{
								"lightness": -25
						},
						{
								"saturation": -100
						}
				]
		}
		];

		var mapOptions = {
			zoom: 14,
			scrollwheel: false,
			center: brooklyn,
			mapTypeControlOptions: {
			  mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
			},
			mapTypeId: MY_MAPTYPE_ID
		};


		map = new google.maps.Map(document.getElementById('map-canvas'),
			  mapOptions);

		var styledMapOptions = {
			name: 'Custom Style'
		};

		var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

		map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
		var marker=new google.maps.Marker({
		  position:brooklyn,
		  icon:'images/map.png'
		  });

		marker.setMap(map);
	}
	
	