jQuery(document).ready(function($){
  $('.toggle-related').find('.button').click(function(){
    $(this).toggleClass('open');
    $('.panel-region-stack2').find('.inside').toggle();
  });
});
