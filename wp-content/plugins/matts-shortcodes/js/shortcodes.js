// SPACER HEIGHT
//$('.spacer').css('height', $('.member').height());

$('.members-container').find('.member h1, .dot-button').click(function(){
      
      //Expand or collapse this panel
      $(this).siblings('.member-content, .slider-container').slideToggle();

      //Hide the other panels
      $(".member-content, .slider-container").not($(this).siblings()).slideUp();

 });
 
 $('.dot-button').click(function () {
 		
 		$(this).children('i').toggleClass('fa-plus fa-minus');
 
 $('.dot-button').not(this).each(function () {
 		$(this).not($(this).parent().removeClass('reset'));
 		$(this).not($(this).children('i').removeClass('fa-minus').addClass('fa-plus'));
 	})
 	$(this).not($(this).parent().toggleClass('reset'));
 	
 	$('.slider').slick('setPosition');
 	
 });
 
 $('.member h1').click(function () {
 
 	$(this).siblings('.dot-button').children('i').toggleClass('fa-plus fa-minus');
 
 $('.member h1').not(this).each(function () {
 		$(this).not($(this).parent().removeClass('reset'));
 		$(this).not($(this).siblings('.dot-button').children('i').removeClass('fa-minus').addClass('fa-plus'));
 	})
 	$(this).not($(this).parent().toggleClass('reset'));
 	
 	$('.slider').slick('setPosition');
 	
 });
 
 $('.member:even').after('<div class="spacer"></div><div class="spacer"></div>');
 
 $('.member:even').addClass('member-left');
 $('.member:odd').addClass('member-right');
 
 $('.slick-dots li').addClass('dots');
 
 $('.member.member-left').children('.slider-container').children('.slider').addClass('slider-right');
 $('.member.member-right').children('.slider-container').children('.slider').addClass('slider-left');
 
$(document).ready(function() {
 	$('.slider').slick({
 		autoplay: true,
 		dots: true
 	});
 	
 	$('#cover').fadeIn(500);
 });
 
 $(window).load(function(){
     $('#cover').fadeOut(500);
     
     $(".slick-slide img").each(function(i, elem) {
       var img = $(elem);
       var div = $("<div class='slick-slide' />").css({
         background: "url(" + img.attr("src") + ") no-repeat"
       });
       img.replaceWith(div);
     });
 });