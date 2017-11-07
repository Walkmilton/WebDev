$(document).ready(function(){

  $("#marchesText").hide();
  $("#palaceText").hide();
  $("#galaText").hide();
  $("#joustingText").hide();

  $("#marches").click(function() {
    if($(this).hasClass("clicked")){
      $(this).removeClass("clicked")

      $(this).animate({left: '0'}, "slow", function() {$(this).removeAttr('style'); $("#marchesText").toggle(); });

    }else{
      $(this).addClass("clicked");

      $(this).animate({right: '106.5%'}, 'slow', function() {$("#marchesText").toggle(); });

    }

  });


  $("#palace").click(function() {
    if($(this).hasClass("clicked")){
      $(this).removeClass("clicked")

      $(this).animate({left: '0'}, "slow", function() {$(this).removeAttr('style'); $("#palaceText").toggle(); });
    }else{
      $(this).addClass("clicked");

      $(this).animate({left: '106.5%'}, 'slow', function() { $("#palaceText").toggle() });
    }
  });

  $("#gala").click(function() {
    if($(this).hasClass("clicked")){
      $(this).removeClass("clicked")

      $(this).animate({left: '0'}, "slow", function() {$(this).removeAttr('style'); $("#galaText").toggle(); });
    }else{
      $(this).addClass("clicked");

      $(this).animate({right: '106.5%'}, 'slow', function () { $("#galaText").toggle(); });
    }
  });

  $("#jousting").click(function() {
    if($(this).hasClass("clicked")){
      $(this).removeClass("clicked")

      $(this).animate({left: '0'}, "slow", function() {$(this).removeAttr('style'); $("#joustingText").toggle(); } );
    }else{
      $(this).addClass("clicked");

      $(this).animate({left: '106.5%'}, 'slow', function() {$("#joustingText").toggle();});
    }
  });
});
