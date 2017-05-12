$(window).load(function(){

	$(window.location.hash).find('a').click();

	$('.faq_dl > dt').click(function(){
		$(this).parent().find('dt').removeClass('act');
		$(this).parent().find('dd').hide();
		$(this).addClass('act').next().show();
	});

	$('.psk_select > button').click(function(){
		$(this).parent().toggleClass('open');
	});
	$('.psk_select > ul > li > a').click(function(){
		var parent = $(this).parent().parent().parent();
		parent.find('button > span').html($(this).html());
		parent.find('.psk_select_val').val($(this).html());
		parent.toggleClass('open');
	});

});

$(document).ready(function(){



});

