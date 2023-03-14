AOS.init({
    //easing: 'ease-out-back',
    duration: 1500,
    disable: function() {
        var maxWidth = 991;
        return window.innerWidth < maxWidth;
    }
});

$(window).scroll(function(){
    var sticky = $('header'),
        scroll = $(window).scrollTop();
  
    if (scroll >= 100) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
  });



$(document).ready(function() {

   // $("a[href*=#]").click(function(event){     
     //   event.preventDefault();
       // $('html,body').animate({scrollTop:$(this.hash).offset().top -100}, 500);
    //});
	
	
	 $("#Testimonials").owlCarousel({
        items: 1,
        merge: true,
        loop: false,
        video: true,
        lazyLoad: true,
        nav: true,
        dots: true
    });
	
	
	
	$(".navbar-toggler").click(function(){
		
		$(this).toggleClass("two");
		$("#navbarNav").toggleClass("one");
		
		
	});
   
   


});





	






