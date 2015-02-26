$(document).ready(function(){
	$('.verMapa').click(function(){
		$('.ligtbox').css('display','block');
		$('.baseMapa').html('<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d975.2850390901273!2d-76.97040530000004!3d-12.102556099999989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2spe!4v1424662997021" width="600" height="450" frameborder="0" style="border:0"></iframe>')
	})

	$('.ligtbox').click(function(){
		$('.ligtbox').css('display','none');
	})
})