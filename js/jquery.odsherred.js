jQuery(document).ready(function($){
  $('.feedback').bind('click', function(){
    $('.feedback-link').click();
    return false;
  });
  $('.navbar-toggle').bind('click', function(){
    var target = $(this).data('target');
    $(target).toggle();
  });
});
