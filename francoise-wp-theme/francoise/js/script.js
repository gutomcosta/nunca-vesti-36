window.ParsleyValidator.setLocale(unithemeparams.locale);

//message
var uni_popup_message = function(text, type) {
  var message_div = jQuery('#uni_popup');
      message_text = message_div.text(text);

  if (type == 'success') {
    message_div.addClass('success-message');
  }
  if (type == 'warning') {
    message_div.addClass('warning-message');
  }
  if (type == 'error') {
    message_div.addClass('error-message');
  }

  if (text != '') {
    message_div.fadeIn(400).dequeue().animate({ left: 25 }, 250, function(){
      setTimeout(function(){
        message_div.animate({ left: -125 }, 250).dequeue().fadeOut(400, function(){

            setTimeout(function(){
              message_div.removeClass('success-message warning-message error-message');
            }, 1);
        });
      }, 3000);
    });
  }
};

jQuery( document ).ready( function( $ ) {
    'use strict';

	//// ---> Check issue element
	jQuery.fn.exists = function() {
	  return jQuery(this).length;
	}
	
	if($('.homeV2SliderWrap').exists()){
		var homeV2Slider = $('.homeV2SliderWrap').bxSlider({
			mode:"fade",
			auto:true,
			speed:700,
			pause:4000,
			onSlideAfter: function(){
				var gcs = homeV2Slider.getCurrentSlide();
				$('.homeV2SliderWrap').find('.homeV2SliderItem[data-slide="'+gcs+'"]').find(".homeV1PostDesc").each(function(){
					var contentHeight = $(this).height();
					contentHeight = (contentHeight * -1) / 2;
					$(this).css("margin-top",contentHeight);
				});
		        $('.homeV2SliderWrap').find('.homeV2SliderItem:not(li[data-slide="'+gcs+'"])').removeClass("active");
				$('.homeV2SliderWrap').find('.homeV2SliderItem[data-slide="'+gcs+'"]').addClass("active");
		    }
		});
	}

	if($('.tp_recent_tweets').exists()){
		var twitterWidgetSlider = $('.tp_recent_tweets ul').bxSlider({
			mode:"fade",
			controls: false,
			adaptiveHeight: true,
			auto:true,
			speed:500,
			pause:3000
		});
	}

	$(".searchIcon").on("click", function(){
		$(".searchPopup").addClass("show").find('input[type="text"]').focus();
	});

	$(".closeBtn").on("click", function(){
		$(this).closest(".searchPopup").removeClass("show");
	});

	$(".homeV1PostDesc, .relatedPostDesc").each(function(){
		var contentHeight = $(this).height();
		contentHeight = (contentHeight * -1) / 2;
		$(this).css("margin-top",contentHeight);
	});

	$(window).resize( function(e) {
		$(".homeV1PostDesc, .relatedPostDesc").each(function(){
			var contentHeight = $(this).height();
			contentHeight = (contentHeight * -1) / 2;
			$(this).css("margin-top",contentHeight);
		});
	});

	$('.showMobileMenu').on("click", function(e){
		e.preventDefault();
		$(this).toggleClass('open').closest("body").toggleClass('animated');
	});

	$(window).load(function() {
        if($('.masonryBox').exists()){
			$(".masonryBox").masonry({
				gutter: 30,
				itemSelector: '.blogPostItem'
			});
		}
		$(".masonryBox").addClass("show");
    });

    $("body").on("click", ".uni_input_submit", function (e) {
        var submit_button = $(this),
            this_form = submit_button.closest("form");
        this_form.submit();
    });

    $("body").on("submit", ".uni_form", function (e) {

        var submit_button = $(this),
            this_form = submit_button.closest("form"),
            action = this_form.attr('action');
            //console.log(submit_button);
        var form_valid = this_form.parsley({excluded: '[disabled]'}).validate();

            if ( form_valid ) {
                var dataToSend = this_form.serialize();

			    $.ajax({
				    type: 'post',
	        	    url: action,
	        	    data: dataToSend + '&cheaters_always_disable_js=' + 'true_bro',
	        	    dataType: 'json',
	        	    beforeSend: function(){
	        	        this_form.block({
	        	            message: null,
                            overlayCSS: { background: '#fff', opacity: 0.6 }
                        });
	        	    },
	        	    success: function(response) {
	        		    if ( response.status == "success" ) {
                            this_form.unblock();
                            uni_popup_message(response.message, "success");
	        		    } else if ( response.status == "error" ) {
                            this_form.unblock();
                            uni_popup_message(response.message, "error");
	        		    }
	        	    },
	        	    error:function(response){
	        	        this_form.unblock();
	        	        uni_popup_message("Error!", "warning");
	        	    }
	            });
            }
            return false;
    });

	// hide the loader after page is loaded
    $(window).load(function() {
        $(".loaderWrap").addClass("hide");
        
        var logoImgWidth = $(".logo img").width();
    	$(".logo").css("width", logoImgWidth);
    	$(".logo").addClass("show");
    });

    $(window).resize( function(e) {
		var winWidth = $(window).width();
		if (winWidth > 1023) {
			var logoImgWidth = $(".logo img").width();
	    	$(".logo").css("width", logoImgWidth);
	    	$(".logo").addClass("show");
		}
	});

});