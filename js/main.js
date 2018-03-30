// Hover sur les articles
$(function() {
    var items = (Math.floor(Math.random() * ($('#testimonials li').length)));
    $('#testimonials li').hide().eq(items).show();

    function next() {
        $('#testimonials li:visible').fadeOut('slow', function() {
            $(this).appendTo('#testimonials ul');
            $('#testimonials li:first').fadeIn('slow', next);
        });
    }
    next();
});


//Menu responsive
$(document).ready(function() {

    $(".button-collapse").sideNav();

    $(".hamburger").click(function() {
        $(".menu").slideToggle("slow", function() {
            $(".hamburger").hide();
        });
    });

    $(".email-signup").hide();


    $("#signup-box-link").click(function() {
        $(".email-login").fadeOut(100);
        $(".email-signup").delay(100).fadeIn(100);
        $("#login-box-link").removeClass("active");
        $("#signup-box-link").addClass("active");
    });

    $("#login-box-link").click(function() {
        $(".email-login").delay(100).fadeIn(100);;
        $(".email-signup").fadeOut(100);
        $("#login-box-link").addClass("active");
        $("#signup-box-link").removeClass("active");
    });

});