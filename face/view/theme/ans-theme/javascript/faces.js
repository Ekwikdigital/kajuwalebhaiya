$(document).ready(function () {
    window.onscroll = function () {
        myFunction()
    };
    var header = document.getElementById("mega-menu");
    var sticky = header.offsetTop;
    function myFunction() {
        if (window.pageYOffset > sticky) {
            $("#mega-menu").addClass("sticky");
        } else {
            $("#mega-menu").removeClass("sticky");
        }
    }
    if ($(window).width() < 768) {
        $(".footer .col-sm-3 h4").bind("click", function () {
            $(this).next().slideToggle();
            $(this).toggleClass("active");
        });
    }
    // ===== go to Top ==== 
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 50) {
            $('#return-to-top').fadeIn(200);
        } else {
            $('#return-to-top').fadeOut(200);
        }
    });
    $('#return-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
    });
    // ===== go to Top ==== Ï
    
    
    $("#brandlogo").owlCarousel({
	navigation: true,
	navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
	items: 8,
	autoPlay: 3000, //Set AutoPlay to 3 seconds
	stopOnHover: true,
	loop: true,
	center: true,
	margin: 30,
	lazyLoad: true,
	itemsTablet: [992, 8], //2 items between 600 and 0
	itemsMobile: true // itemsMobile disabled - inherit from itemsTablet option
    });
    
    $("#paymentbrand").owlCarousel({
	navigation: true,
	navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
	items: 8,
	autoPlay: 3000, //Set AutoPlay to 3 seconds
	stopOnHover: true,
	loop: true,
	center: true,
	margin: 30,
	lazyLoad: true,
	itemsTablet: [992, 8], //2 items between 600 and 0
	itemsMobile: true // itemsMobile disabled - inherit from itemsTablet option
    });
    
     // add value on pdp  //
    $('.add').click(function () {
	if ($(this).prev().val() < 5) {
	    $(this).prev().val(+$(this).prev().val() + 1);
	}
    });
    $('.sub').click(function () {
	if ($(this).next().val() > 1) {
	    if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
	}
        if($('.sub').next().val() == 1) {
        }
    });
	if($('.sub').next().val() <= 1) {
    }
    
});
