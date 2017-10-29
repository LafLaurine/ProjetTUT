$(document).ready(function () {


    $("#info").click(function () {
        var $target = $('.information'),
            $info = $(this);

        $target.slideToggle(200, function () {
            $info.text(($target.is(':visible') ? 'Informations' : 'Informations'));
            $("#video").css({ "height": "30.5em" });
        });

    });

    $("body").css("display", "none");
    
        $("body").fadeIn(1000);
        
        $("a.transition").click(function(event){
            event.preventDefault();
            linkLocation = this.href;
            $("body").fadeOut(500, redirectPage);		
        });
            
        function redirectPage() {
            window.location = linkLocation;
        }

    


});