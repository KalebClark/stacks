jQuery(function($){

var ANUBIS = window.ANUBIS || {};

/* ==================================================
   Drop Menu
================================================== */

ANUBIS.subMenu = function(){
	$('#menu-nav').supersubs({
		minWidth: 12,
		maxWidth: 27,
		extraWidth: 0 // set to 1 if lines turn over
	}).superfish({
		delay: 0,
		animation: {opacity:'show'},
		speed: 'fast',
		autoArrows: false,
		dropShadows: false
	});	
}

/* ==================================================
   Mobile Navigation
================================================== */
/* Clone Menu for use later */
var mobileMenuClone = $('#menu').clone().attr('id', 'navigation-mobile');

ANUBIS.mobileNav = function(){
	var windowWidth = $(window).width();
	
	// Show Menu or Hide the Menu
	if( windowWidth <= 979 ) {
		if( $('#mobile-nav').length > 0 ) {
			mobileMenuClone.insertAfter('header');
			$('#navigation-mobile #menu-nav').attr('id', 'menu-nav-mobile').wrap('<div class="container"><div class="row"><div class="span12" />');
		}
	} else {
		$('#navigation-mobile').css('display', 'none');
		if ($('#mobile-nav').hasClass('open')) {
			$('#mobile-nav').removeClass('open');	
		}
	}
}

// Call the Event for Menu 
ANUBIS.listenerMenu = function(){
	$('#mobile-nav').on('click', function(e){
		$(this).toggleClass('open');
		
		$('#navigation-mobile').stop().slideToggle(350, 'easeOutExpo');
		
		e.preventDefault();
	});
}

/* ==================================================
   Slider Settings
================================================== */

ANUBIS.slider = function(){
	var tpj=jQuery;
	tpj.noConflict();

	tpj(document).ready(function() {

	if (tpj.fn.cssOriginal!=undefined)
		tpj.fn.css = tpj.fn.cssOriginal;

		// Full Screen Slider
		tpj('.fullwidthbanner').revolution(
			{
				delay:9000,
				startwidth:1200,
				startheight:700,

				onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

				thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
				thumbHeight:50,
				thumbAmount:3,

				hideThumbs:0,
				navigationType:"bullet",				// bullet, thumb, none
				navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

				navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


				navigationHAlign:"center",				// Vertical Align top,center,bottom
				navigationVAlign:"bottom",				// Horizontal Align left,center,right
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

				touchenabled:"on",						// Enable Swipe Function : on/off



				stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
				stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

				hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
				hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
				hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value


				fullWidth:"on",

				shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

			});
			
			// Simple Slider
			tpj('.sliderbanner').revolution(
			{
				delay:9000,
				startwidth:1170,
				startheight:600,

				onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

				thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
				thumbHeight:50,
				thumbAmount:3,

				hideThumbs:0,
				navigationType:"bullet",				// bullet, thumb, none
				navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

				navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


				navigationHAlign:"center",				// Vertical Align top,center,bottom
				navigationVAlign:"bottom",				// Horizontal Align left,center,right
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

				touchenabled:"on",						// Enable Swipe Function : on/off



				stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
				stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

				hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
				hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
				hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value


				fullWidth:"on",

				shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

			});
	});
}

/* ==================================================
   DropDown 
================================================== */

ANUBIS.dropDown = function(){
	$('.dropmenu').on('click', function(e){
		$(this).toggleClass('open');
		
		$('.dropmenu-active').stop().slideToggle(350, 'easeOutExpo');
		
		e.preventDefault();
	});
	
	$('.dropmenu-active a').on('click', function(e){
		var dropdown = $(this).parents('.dropdown');
		var selected = dropdown.find('.dropmenu .selected');
		var newSelect = $(this).html();
		
		$('.dropmenu').removeClass('open');
		$('.dropmenu-active').slideUp(350, 'easeOutExpo');
		
		selected.html(newSelect);
		
		e.preventDefault();
	});
}


/* ==================================================
   FancyBox
================================================== */

// ANUBIS.fancyBox = function(){
// 	if($('.fancybox').length > 0 || $('.fancybox-media').length > 0 || $('.fancybox-various').length > 0){
		
// 		$(".fancybox").fancybox({				
// 			padding : 0,
// 			helpers : {
// 				title : { type: 'inside' },
// 			}
// 		});
			
// 		$('.fancybox-media').fancybox({
// 			openEffect  : 'none',
// 			closeEffect : 'none',
// 			helpers : {
// 				media : {}
// 			}
// 		});
		
// 		$(".fancybox-various").fancybox({
// 			maxWidth	: 800,
// 			maxHeight	: 600,
// 			fitToView	: false,
// 			width		: '70%',
// 			height		: '70%',
// 			autoSize	: false,
// 			closeClick	: false,
// 			openEffect	: 'none',
// 			closeEffect	: 'none'
// 		});
// 	}
// }


/* ==================================================
	Scroll to Top
================================================== */

// ANUBIS.scrollToTop = function(){
// 	var didScroll = false;

// 	var $arrow = $('#back-to-top');

// 	$arrow.click(function(e) {
// 		$('body,html').animate({ scrollTop: "0" }, 750, 'easeOutExpo' );
// 		e.preventDefault();
// 	})

// 	$(window).scroll(function() {
// 		didScroll = true;
// 	});

// 	setInterval(function() {
// 		if( didScroll ) {
// 			didScroll = false;

// 			if( $(window).scrollTop() > 1000 ) {
// 				$arrow.css('display', 'block');
// 			} else {
// 				$arrow.css('display', 'none');
// 			}
// 		}
// 	}, 250);
// }


/* ==================================================
	Center Images
================================================== */

// ANUBIS.getSize = function(){
	
// 	if($('#image-static .fullimage-container').length > 0){
// 		$('#image-static .fullimage-container').each(function() {
			
// 			var img = $(this).find('img');	
			
// 			// Get on screen image
// 			var screenImage = img;
	
// 			// Create new offscreen image to test
// 			var theImage = new Image();
// 			theImage.src = screenImage.attr("src");
	
// 			// Get accurate measurements from that.
// 			var imageWidth = theImage.width;
// 			var imageHeight = theImage.height;
			
// 			screenImage.attr('width', imageWidth);
// 			screenImage.attr('height', imageHeight);
// 		});
// 	}
	
// }

ANUBIS.centerImg = function(){
	if($('#image-static .fullimage-container').length > 0){
		$('#image-static .fullimage-container').each(function(){
			var img = $(this).find('img'),
				vpWidth = $(window).width(),
				vpHeight,
				imgHeight = img.attr('height'),
				imgWidth = img.attr('width'),
				imgAspectRatio = imgWidth / imgHeight,
				vpAspectRatio,
				newImgWidth,
				newImgHeight = vpWidth / imgAspectRatio;
		
			if( vpWidth <= 660 ) {
				vpHeight = 400;
				newImgWidth = imgWidth * vpHeight / imgHeight;
			} else if( vpWidth > 660 && vpWidth <= 1024 ) {
				vpHeight = 500;
				newImgWidth = imgWidth * vpHeight / imgHeight;
			} else {
				vpHeight = 700;
				newImgWidth = imgWidth * vpHeight / imgHeight;
			}
			
			vpAspectRatio = vpWidth / vpHeight;
									
			if( vpAspectRatio <= imgAspectRatio ) {
				img.css({
					'margin-top': 0,
					'width': newImgWidth,
					'height': '100%',
					'margin-left': (vpWidth - newImgWidth)/2
				});
			} else {
				img.css({
					'width': '100%',
					'height': newImgHeight,
					'margin-left': 'auto',
					'margin-top': (vpHeight - newImgHeight)/2
				});
			}
		});
	}
}

/* ==================================================
   Opacity Slider Elements on Scroll
================================================== */

ANUBIS.changeOpacity = function(){
	var arrows = $('.fullwidthbanner-container .tparrows, .fullwidthbanner-container .tp-bullets');
	
	$(window).scroll(function(){
		var st = $(this).scrollTop();
		arrows.css({ 'opacity' : (1 - st/600) });
	});
}


/* ==================================================
	Init
================================================== */

ANUBIS.slider();
ANUBIS.listenerMenu()

jQuery(window).resize(function(){
	ANUBIS.centerImg();
	ANUBIS.dropDown()
	ANUBIS.mobileNav();
	
});

});
