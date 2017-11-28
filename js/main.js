   
    $("#info").click(function () {
        var $target = $('.information'),
            $info = $(this);

        $target.slideToggle(200, function () {
            $info.text(($target.is(':visible') ? 'Informations' : 'Informations'));
           
        });
        
        /* 

    $('.card__share > a').on('click', function(e){ 
		e.preventDefault()
   		$(this).parent().find( 'div' ).toggleClass( 'card__social--active' );
		$(this).toggleClass('share-expanded');
    }); */

    
  

/*     $("body").css("display","none");
    
        $("body").fadeIn(1000);
        
        $("a.transition").click(function(event){
            event.preventDefault();
            linkLocation = this.href;
            $("body").fadeOut(200, redirectPage);		
        });
            
        function redirectPage() {
            window.location = linkLocation;
        } */

    
        

});

$(function(){
    var items = (Math.floor(Math.random() * ($('#testimonials li').length)));
    $('#testimonials li').hide().eq(items).show();
    
  function next(){
        $('#testimonials li:visible').delay(3000).fadeOut('slow',function(){
            $(this).appendTo('#testimonials ul');
            $('#testimonials li:first').fadeIn('slow',next);
    });
   }
  next();
});

