$j(document).ready(function($){
  $('body').append('<div id="page-overlay" style="display : none;">');
  var $last,
      browser = true;

  if ( $.browser.msie ) {
    if( $.browser.version === "8.0" || $.browser.version === "7.0" ) {
      browser = false; 
    }
  }
  $('.js-menu-minipanel-toggle').click(function(){
    $(this).parent().find('.portal-link').addClass('hover');
    return false
  });
});
