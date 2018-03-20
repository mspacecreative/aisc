function mainContentPadding() {
	$('#main-content > .container').css('padding-top', $('#main-header').outerHeight() + 50);
}

function viewportHeight() {
	$('.splash').outerHeight($(window).height());
}

function videoHeight() {
	$('.promo-video').height($('.video-overlay').height());
}

// DOCUMENT READY
$(document).ready(function () {
    viewportHeight();
    mainContentPadding();
    videoHeight();
});

// WINDOW RESIZE
$(window).resize(function () {
    viewportHeight();
    mainContentPadding();
    videoHeight();
});

// SCROLLING VIEWPORT
$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(window).on('resize scroll', function() {
    if ($('.infographic-overlay-text img').isInViewport()) {
        $('.infographic-overlay-text img').addClass('reveal'); 
    } else {
        // do something else
    }
});

// STICKY MENU
$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 200) {
    $('.stickymenu, .hamburger').addClass('reveal');
  } else {
    $('.stickymenu, .hamburger').removeClass('reveal');
  }
});

$('.fa.fa-play-circle').click(function () {
	$('.promo-video').get(0).play()
	$('.promo-video-img, .video-overlay-content').fadeOut();
});

$('.promo-video').on('ended',function(){
	$('.promo-video-img, .video-overlay-content').fadeIn();
});

$('.promo-video').hover(function () {
	$('.video-pause-button').toggleClass('show');
});

$('.video-pause-button').click(function () {
	if($(this).find('i').hasClass('fa-pause')) {
		$('.promo-video').get(0).pause()
	} else {
		$('.promo-video').get(0).play()
	}
	$(this).find('i').toggleClass('fa-play fa-pause');
});