$(document).ready(function(){
	console.log('test ETM');

	var $banner = $('.banner');
	var $bannerNaranja = $banner.find($('.banner-naranja'));
	var $bannerAmarillo = $banner.find($('.banner-amarillo'));

	$bannerNaranja.click(function(){
		
	})

	$bannerAmarillo.click(function(){
		
	})


	TweenMax.to($bannerNaranja, 1, {opacity:0, yoyo:true, repeat:-1});
});