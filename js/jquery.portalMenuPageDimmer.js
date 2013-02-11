$j(document).ready(function($){
  $('body').append('<div id="page-overlay" style="display : none;">');
  var $last;
  function setValue(element){ $last = element; }
  function getValue(){ return $last; }
  $("li.[class^=menu]").find('.menu-minipanel').hover(
      function(){
        $(this).addClass('hover');
        $('#page-overlay').fadeIn();
      },
      function(){
        $(this).removeClass('hover');
        setValue($(this));
      }
  );
  $(document).on("mouseenter", ".qtip", function(){
    $last = getValue();
    $last.addClass('hover');
    $('#page-overlay').show();
  });
  $(document).on("click", "#page-overlay", function(){
    $('#page-overlay').fadeOut();
    $last.removeClass('hover');
  });
  $(document).on("mouseenter", "#page-overlay", function(){
    $('#page-overlay').fadeOut();
    $last.removeClass('hover');
  });
  $(document).on("touchstart", "#page-overlay", function(){
    $('#page-overlay').fadeOut();
    $last.removeClass('hover');
    $('.qtip').hide();
  });
});
