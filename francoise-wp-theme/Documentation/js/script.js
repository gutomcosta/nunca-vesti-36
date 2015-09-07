(function($) {
$(document).ready(function(){

	$('.menu li a').on("click", function(e) {
		e.preventDefault();
		$('.menu li a.active').removeClass("active");
		$(this).addClass("active");
    	var toId = $(this).attr('href');
		$.scrollTo(toId,500, {offset: {top:0, left:0}});
		return false;
    });

});
})(jQuery);	