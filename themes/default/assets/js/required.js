$(function(){
		$('#tabs div').hide();
		$('#tabs div:first').show();
		$('#tabs ul li:first').addClass('active');
		
		$('#tabs ul li a').click(function(e){
			e.preventDefault();
			$('#tabs ul li').removeClass("active");
			$(this).parent().addClass('active');
			var current= $(this).attr('href');
			$('#tabs div').hide();
			$(current).show();
			return false;
		});
	});
$(function(){
	$('.new-query-popup').hide();
	$('.orange-wrap .orange-btn').click(function(){
		$('.new-query-popup').toggle(500);
	});
	$('.close').click(function(){
		$('.new-query-popup').hide();	
	});
});