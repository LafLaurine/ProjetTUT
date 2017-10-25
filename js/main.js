$(document).ready(function()
{
  $("#info").click(function(){
    var $target = $('.information'),
        $info = $(this);

    $target.slideToggle(200, function () {
        $info.text(($target.is(':visible') ? 'Informations' : 'Informations'));
    });

 

    
});
});