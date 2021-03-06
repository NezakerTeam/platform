(function ($) {
    "use strict";

    $('.slide').prepend('<div class="patternOverlay"></div>');

    // for mobile nav js	
    $('button.navbar-toggle').on("click", function () {
        $(this).toggleClass('active');
        $('.navbar-collapse').slideToggle();
    });


    $('.navbar-collapse li a').on("click", function () {
        $('.navbar-collapse.collapse').removeClass('active');
        $('button.navbar-toggle').removeClass('active');
    });


    $(".menuItem").on({
        mouseenter: function () {
            $(this).addClass('active');
        },
        mouseleave: function () {
            $(this).removeClass('active');
        }
    });


    if ($(window).width() < 1000) {
        $('.navbar-nav li a').on("click", function () {
            $('.navbar-collapse.collapse').removeClass('in');
        });
    }


// for portfoli filter jquary
    $(window).load(function () {

        $("#status").fadeOut(); // will first fade out the loading animation
        $("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.	

//        var $container = $('.portfolioContainer');
//        $container.isotope({
//            filter: '*',
//            animationOptions: {
//                duration: 750,
//                easing: 'linear',
//                queue: false
//            }
//        });
//
//        var $container2 = $('.portfolioBlog');
//        $container2.isotope({});

        $('.portfolioFilter a').on("click", function () {
            $('.portfolioFilter .current').removeClass('current');
            $(this).addClass('current');

//            var selector = $(this).attr('data-filter');
//            $container.isotope({
//                filter: selector,
//                animationOptions: {
//                    duration: 750,
//                    easing: 'linear',
//                    queue: false
//                }
//            });
            return true;
        });

    });

    // Somth page scroll
    $('#navigation a, .smooth, a[href^="#theCouple"]').on("click", function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name="' + this.hash.slice(1) + '"]');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });



}(jQuery));

//FUNCTION TO GET AND AUTO PLAY YOUTUBE VIDEO FROM DATATAG
function autoPlayYouTubeModal() {
    var trigger = $("body").find('[data-toggle="modal"]');
    trigger.click(function () {
        var theModal = $(this).data("target"),
                videoSRC = $(this).attr("data-theVideo"),
                videoSRCauto = videoSRC + "?autoplay=1";
        $(theModal + ' iframe').attr('src', videoSRCauto);
        $(theModal).on('hidden.bs.modal', function (e) {
            $(theModal + ' iframe').attr('src', videoSRC);
        });
    });
}


