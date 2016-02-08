$(function() {
	$('#navigation ul li:last-child').addClass('last')
	$('#footer .footer-nav ul li:last-child').addClass('last')

	if( $.browser.msie ){
		$('body').addClass('iefix');
	}

});

$(window).load(function() {
	$('.big-slider').flexslider({
		animation: "slide",
		controlsContainer: ".slider-holder",
		slideshowSpeed: 5000,
		directionNav: true,
		controlNav: true,
		animationDuration: 900
	});

	$('.testimonials-slider').flexslider({
		animation: "fade",
		slideshowSpeed: 3000,
		directionNav: false,
		controlNav: false,
	});
});