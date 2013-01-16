$j(document).ready(function($){
  var $last;
  function setValue(element)
  {
      $last = element;
  }

  function getValue()
  {
    return $last;
  }
  $("li.[class^=menu] > .menu-minipanel").each(function(){
    $(this).hover(
      function(){
        $(this).addClass('hover');
        $('#page-overlay').fadeIn();
      },
      function(){
        $(this).removeClass('hover');
        $('#page-overlay').hide();
        setValue($(this));
      }
      );
  });
  $(document).on("mouseenter", ".qtip", function(){
    $last = getValue();
    $last.addClass('hover');
    $('#page-overlay').show();
  });
  $(document).on("mouseleave", ".qtip", function(){
    $('#page-overlay').hide();
    $last.removeClass('hover');
  });
});
