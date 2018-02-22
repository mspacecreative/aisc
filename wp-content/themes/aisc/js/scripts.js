// PAGE CONTAINER BOTTOM MARGIN TO CLEAR FOOTER
/*function clearFooter() {
	$('#page-container').css('margin-bottom', $('#main-footer').outerHeight());
}*/

function mainContentPadding() {
	$('#main-content > .container').css('padding-top', $('#main-header').outerHeight() + 50);
}

function viewportHeight() {
	$('.splash').outerHeight($(window).height());
}

// DOCUMENT READY
$(document).ready(function () {
    viewportHeight();
    mainContentPadding();
    clearFooter();
    
    $('.slider').slick({
    	dots: true,
    	autoplay: true
    });
});

// WINDOW RESIZE
$(window).resize(function () {
    viewportHeight();
    mainContentPadding();
    clearFooter();
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
    $('.stickymenu').addClass('reveal');
  } else {
    $('.stickymenu').removeClass('reveal');
  }
});