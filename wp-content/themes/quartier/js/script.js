(function($) {
	
	"use strict";
	//Preloader
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(500).fadeOut(500);
		}
	}
	
	//Update Header Style + Scroll to Top
	function headerStyle() {
		if($('.header-style-two').length){
			var windowpos = $(window).scrollTop();
			if (windowpos >= 80) {
				$('.header-style-two').addClass('fixed-header');
				$('.scroll-to-top').fadeIn(100);
				$('#qlwapp').removeClass('active');
			} else {
				$('.header-style-two').removeClass('fixed-header');
				$('.scroll-to-top').fadeOut(100);
				$('#qlwapp').addClass('active');
			}
		}
	}
	
	headerStyle();
	
	
	//Scroll to Top Style Two
	function scrollTopStyletwo() {
		if($('.header-style-two').length){
			var windowpos = $(window).scrollTop();
			if (windowpos >= 120) {
				$('.scroll-to-top').fadeIn(300);
			} else {
				$('.scroll-to-top').fadeOut(300);
			}
		}
	}
	
	scrollTopStyletwo();
	
	
	//Submenu Dropdown Toggle
	if($('.main-menu .navigation > li').find('ul').length){
		
		//Dropdown Button
		// $('.main-menu .navigation > li .dropdown-btn').on('click', function() {
		// 	$(this).prev('ul').slideToggle(500);
		// });
	}

	//Revolution Slider
	if($('.revolution-slider .tp-banner').length){

		jQuery('.revolution-slider .tp-banner').show().revolution({
		  
		  delay:10000,
		  startwidth:1200,
		  startheight:720,
		  hideThumbs:600,
	
		  thumbWidth:80,
		  thumbHeight:50,
		  thumbAmount:5,
	
		  navigationType:"bullet",
		  navigationArrows:"0",
		  navigationStyle:"preview4",
	
		  touchenabled:"on",
		  onHoverStop:"off",
	
		  swipe_velocity: 0.7,
		  swipe_min_touches: 1,
		  swipe_max_touches: 1,
		  drag_block_vertical: false,
	
		  parallax:"mouse",
		  parallaxBgFreeze:"on",
		  parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
	
		  keyboardNavigation:"off",
	
		  navigationHAlign:"center",
		  navigationVAlign:"bottom",
		  navigationHOffset:0,
		  navigationVOffset:20,
	
		  soloArrowLeftHalign:"left",
		  soloArrowLeftValign:"center",
		  soloArrowLeftHOffset:20,
		  soloArrowLeftVOffset:0,
	
		  soloArrowRightHalign:"right",
		  soloArrowRightValign:"center",
		  soloArrowRightHOffset:20,
		  soloArrowRightVOffset:0,
	
		  shadow:0,
		  fullWidth:"on",
		  fullScreen:"on",
	
		  spinner:"spinner4",
	
		  stopLoop:"off",
		  stopAfterLoops:-1,
		  stopAtSlide:-1,
	
		  shuffle:"off",
	
		  autoHeight:"off",
		  forceFullWidth:"on",
	
		  hideThumbsOnMobile:"on",
		  hideNavDelayOnMobile:1500,
		  hideBulletsOnMobile:"on",
		  hideArrowsOnMobile:"on",
		  hideThumbsUnderResolution:0,
	
		  hideSliderAtLimit:0,
		  hideCaptionAtLimit:0,
		  hideAllCaptionAtLilmit:0,
		  startWithSlide:0,
		  videoJsPath:"",
		  fullScreenOffsetContainer: "on"
	  });

		
	}

	//Related Posts Carousel
	if ($('.related-posts-carousel').find('img').length) {
		$('.related-posts-carousel').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 500,
			autoplay: 5000,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1024:{
					items:2
				},
				1400:{
					items:2
				}
			}
		});    		
	}

	//Testimonials Carousel Slider
	if ($('.testimonials-carousel').find('img').length) {
		$('.testimonials-carousel').owlCarousel({
			loop:true,
			margin:60,
			autoplayHoverPause:false,
			autoplay: 5000,
			smartSpeed: 700,
			dots:true,
			nav:true,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				760:{
					items:2
				},
				1024:{
					items:3
				},
				1100:{
					items:3
				}
			}
		});    		
	}

	//Sponsors Slider
	if ($('.sponsors-slider').find('img').length > 3) {
		$('.sponsors-slider').owlCarousel({
			loop:true,
		    margin: 70,
		    nav: false,
		    dots: false,
			smartSpeed: 500,
			autoplay: 3000,
		    autoplayHoverPause: true,
			responsive:{
		        0:{
		            items:2
		        },
		        480:{
		            items:2
		        },
		        840:{
		            items:4
		        },
		        1000:{
		            items:3
		        },
		        1200:{
		            items:3
		        }
		    }
		});    		
	}

	//Sponsors Slider
	if ($('.featured-project').find('img').length) {
		$('.featured-project').owlCarousel({
			loop:true,
			margin:0,
			dots:false,
			nav:true,
			smartSpeed: 500,
			autoplay: false,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:1
				},
				1200:{
					items:1
				}
			}
		});    		
	}

	//Accordion Box
	if($('.accordion-box').length){
		$(".accordion-box").on('click', '.accord-btn', function() {
		
			if($(this).hasClass('active')!==true){
			$('.accordion .accord-btn').removeClass('active');
			
			}
			
			if ($(this).next('.accord-content').is(':visible')){
				$(this).removeClass('active');
				$(this).next('.accord-content').slideUp(300);
			}else{
				$(this).addClass('active');
				$('.accordion .accord-content').slideUp(300);
				$(this).next('.accord-content').slideDown(300);	
			}
		});	
	}


	//Event slider
	function bxgeventCarousel () {
		$('.bx-event-carousel').bxSlider({
	        auto: false,
	        speed: 300,
	        mode: 'vertical',
	        minSlides: 4,
	        slideMargin: 20,
	        pager: false,
	        prevText: '<i class="fa fa-angle-left"></i>',
	        nextText: '<i class="fa fa-angle-right"></i>'
	    });

		$('.bx-event-carousel-style2').bxSlider({
	        auto: false,
	        speed: 300,
	        mode: 'vertical',
	        minSlides: 3,
	        slideMargin: 20,
	        pager: false,
	        prevText: '<i class="fa fa-angle-left"></i>',
	        nextText: '<i class="fa fa-angle-right"></i>'
	    });
	}

	//Common CssJs
	if($.length) {
	    $('[data-mt]').each(function() {
	        $(this).css('margin-top', $(this).data("mt"));
	    });
		$('[data-bac]').each(function() {
	        $(this).css("cssText", "background: " + $(this).data("bac") + " !important;");
	    });
	    $('[data-img-bg]').each(function() {
	        $(this).css('background-image', 'url(' + $(this).data("img-bg") + ')');
	    });
	    $('[data-border]').each(function() {
	        $(this).css('border', $(this).data("border"));
	    });
	    $('[data-border-bottom]').each(function() {
	        $(this).css('border-bottom', $(this).data("border-bottom"));
	    });
	    $('[data-border-top]').each(function() {
	        $(this).css('border-top', $(this).data("border-top"));
	    });
	    $('[data-tc]').each(function() {
	        $(this).css('color', $(this).data("tc"));
	    });
	    $('[data-height]').each(function() {
	        $(this).css('height', $(this).data("height"));
	    });
	}

	// pieChart RoundCircle
	function expertizeRoundCircle () {
		var rounderContainer = $('.piechart.style-one');
		if (rounderContainer.length) {
			rounderContainer.each(function () {
				var Self = $(this);
				var value = Self.data('value');
				var size = Self.parent().width();
				var color = Self.data('fg-color');

				Self.find('span').each(function () {
					var expertCount = $(this);
					expertCount.appear(function () {
						expertCount.countTo({
							from: 1,
							to: value*100,
							speed: 3000
						});
					});

				});
				Self.appear(function () {					
					Self.circleProgress({
						value: value,
						size: 142,
						thickness: 10,
						emptyFill: 'rgba(149,149,149,1)',
						animation: {
							duration: 3000
						},
						fill: {
							color: color
						}
					});
				});
			});
		}
	}


	// Fact Counter
	function factCounter() {
		if($('.fact-counter').length){
			$('.fact-counter .column.animated').each(function() {
		
				var $t = $(this),
					n = $t.find(".count-text").attr("data-stop"),
					r = parseInt($t.find(".count-text").attr("data-speed"), 10);
					
				if (!$t.hasClass("counted")) {
					$t.addClass("counted");
					$({
						countNum: $t.find(".count-text").text()
					}).animate({
						countNum: n
					}, {
						duration: r,
						easing: "linear",
						step: function() {
							$t.find(".count-text").text(Math.floor(this.countNum));
						},
						complete: function() {
							$t.find(".count-text").text(this.countNum);
						}
					});
				}
				
			});
		}
	}
	
	
	//LightBox / Fancybox
	if($('.lightbox-image').length) {
		$('.lightbox-image').fancybox({
			openEffect  : 'elastic',
			closeEffect : 'elastic',
			helpers : {
				media : {}
			}
		});
	}
	
	
	//Sortable Masonary with Filters
	function enableMasonry() {
		if($('.sortable-masonry').length){
	
			var winDow = $(window);
			// Needed variables
			var $container=$('.sortable-masonry .items-container');
			var $filter=$('.sortable-masonry .filter-btns');
	
			$container.isotope({
				filter:'*',
				 masonry: {
					columnWidth : 1 
				 },
				animationOptions:{
					duration:1000,
					easing:'linear'
				}
			});
			
	
			// Isotope Filter 
			$filter.find('li').on('click', function(){
				var selector = $(this).attr('data-filter');
	
				try {
					$container.isotope({ 
						filter	: selector,
						animationOptions: {
							duration: 1000,
							easing	: 'linear',
							queue	: false
						}
					});
				} catch(err) {
	
				}
				return false;
			});
	
	
			winDow.bind('resize', function(){
				var selector = $filter.find('li.active').attr('data-filter');

				$container.isotope({ 
					filter	: selector,
					animationOptions: {
						duration: 1000,
						easing	: 'linear',
						queue	: false
					}
				});
			});
	
	
			var filterItemA	= $('.sortable-masonry .filter-btns li');
	
			filterItemA.on('click', function(){
				var $this = $(this);
				if ( !$this.hasClass('active')) {
					filterItemA.removeClass('active');
					$this.addClass('active');
				}
			});
		}
	}
	
	enableMasonry();

	//Gallery With Filters List
	if($('.filter-list').length){
		$('.filter-list').mixItUp({});
	}
	
	
	//Date Picker
	  if($('.datepicker').length){
		$( ".datepicker" ).datepicker();
	  }
	
	
	//Contact Form Validation
	if($('#contact-form').length){
		$('#contact-form').validate({
			rules: {
				username: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				message: {
					required: true
				}
			}
		});
	}
	
	
	// Scroll to a Specific Div
	if($('.scroll-to-target').length){
		$(".scroll-to-target").on('click', function() {
			var HeaderHeight = $('.header-style-two').height();
			var target = $(this).attr('data-target');
		   // animate
		   $('html, body').animate({
			   scrollTop: 0
			 }, 1000);
	
		});
	}
	
	
	// Elements Animation
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       false,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}

/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */
	
	$(window).on('scroll', function() {
		headerStyle();
		scrollTopStyletwo();
		factCounter();
		scrollBtnContact();
	});
	
/* ==========================================================================
   When document is loading, do
   ========================================================================== */
	
	$(window).on('load', function() {
		//if($('ezrzerzerze').length){
			handlePreloader();
			enableMasonry();
			expertizeRoundCircle();
			bxgeventCarousel();
		//}
	});

	$(document).on('click','.navbar-toggle', function(e){
		e.preventDefault();
		$('body').toggleClass('open-nav');
	});

	$(window).on('scroll', function(){
		var _this = $('.navbar-toggle');
		var _thisOffset = _this.offset().top;

		var _head = '.header-top';
		if(_thisOffset > $(_head).outerHeight(true)){
			_this.addClass('active');
		}else{
			_this.removeClass('active');
		}
	})

	dropdownMD();
	// set name of main menu
	isSubMenuExist('#quartier');
	// redirect contact
	isRedirectContact();
	// scroll to page 
	scrollToFormContact();
	// scrollDown 
	scrollDownStep();
})(window.jQuery);

function scrollBtnContact() {
	if((jQuery(window).scrollTop() +  jQuery('.main-footer').height()) > jQuery('.main-footer').offset().top) {
		jQuery('.btn-contact-link').addClass('hidden-btn');
	}else {
		jQuery('.btn-contact-link').removeClass('hidden-btn');
	}
}

function dropdownMD(){
	jQuery(document).on('click', '#quartier .subDropDown > a', function(e){
		e.preventDefault();
		var $this = jQuery(this);

		$this.closest('.subDropDown').find('.sub-menu').toggle();
		$this.closest('.subDropDown').toggleClass('active');

	})
}


function isSubMenuExist(nav) {
	$(nav + '> li').each(function() {
		var $this = $(this);

		if($this.find('.sub-menu').length){
			$this.addClass('subDropDown');
		}
	});
}


function isRedirectContact() {
	var btnContact = '.redirect-contact';

	$(document).on('click', btnContact, function(e){
		e.preventDefault();
		var urlRedirect = $('.btn-contact-link a').attr('href');
		var urlContact = window.location.origin + urlRedirect + '?formto=true';

		window.location.href = urlContact;
	})
}

function scrollToFormContact() {
	var classContact = '.contact-form';
	var urlContactForm;
	try {
		if($(classContact).length && window.location.href.indexOf('?') !== -1) {
			urlContactForm = window.location.href.split('?')[1];
			urlContactForm = urlContactForm.split('=')[1];
		}
	}
	catch(err){
		console.log('no page contact identified', err);
	}


	if($(classContact).length && urlContactForm === 'true'){
		setTimeout(function(){
			window.scrollTo({
				top: $(classContact).offset().top  - 200,
				behavior: 'smooth'
			  });
		}, 2500)
	}
	else {
		return false; 
	}
}

function scrollDownStep() {
	var arrowScrollDown = '.scrollDown';
	var IML = '.imagefull-mya-landing';
	
	$(document).on('click', arrowScrollDown, function(e){
		e.preventDefault();
		var topLanding =  $(this).closest(IML);
		window.scrollTo({
			top: topLanding.height(),
			behavior: 'smooth'
		});
	});
}