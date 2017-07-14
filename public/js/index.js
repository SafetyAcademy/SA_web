$(function(){
	
	$('.professionals-icons-icon').click(function(ev){
		ev.preventDefault();
		
		var index = $(this).attr('data');
		
		$('.professionals-icons .-active').removeClass('-active');
		$(this).addClass('-active');
		
		$('.professionals-text .-active').removeClass('-active');
		$('.professionals-text .professionals-text-element:eq('+index+')').addClass('-active');
	})
	
	$('.feed-feedbacks-title-arrow').click(function(ev){
		ev.preventDefault();
		
		var index = parseInt($('.feed-feedbacks .-active').attr('data'));
		
		if ($(this).hasClass('-left')) {
			index--;
		} else {
			index++;
		}
		
		if (index < 0) index = parseInt($('.feed-feedbacks-title').attr('data'));
		if (index > parseInt($('.feed-feedbacks-title').attr('data'))) index = 0;
		
		$('.feed-feedbacks .-active').removeClass('-active');
		$('.feed-feedbacks .feed-feedbacks-title-words:eq('+index+')').addClass('-active');
	})
	
})