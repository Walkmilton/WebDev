$(document).ready(function(){
  $("#marches").click(function() {
    if($(this).hasClass("clicked")){
      $(this).removeClass("clicked")

      $(this).animate({left: '0'}, "slow", function() {$(this).removeAttr('style'); });
    }else{
      $(this).addClass("clicked");

      $(this).animate({right: '106.5%'}, 'slow');
    }
  });


  $("#palace").click(function() {
    if($(this).hasClass("clicked")){
      $(this).removeClass("clicked")

      $(this).animate({left: '0'}, "slow", function() {$(this).removeAttr('style');} );
    }else{
      $(this).addClass("clicked");

      $(this).animate({left: '106.5%'}, 'slow');
    }
  });

  $("#gala").click(function() {
    if($(this).hasClass("clicked")){
      $(this).removeClass("clicked")

      $(this).animate({left: '0'}, "slow", function() {$(this).removeAttr('style'); });
    }else{
      $(this).addClass("clicked");

      $(this).animate({right: '106.5%'}, 'slow');
    }
  });

  $("#jousting").click(function() {
    if($(this).hasClass("clicked")){
      $(this).removeClass("clicked")

      $(this).animate({left: '0'}, "slow", function() {$(this).removeAttr('style');} );
    }else{
      $(this).addClass("clicked");

      $(this).animate({left: '106.5%'}, 'slow');
    }
  });
});
