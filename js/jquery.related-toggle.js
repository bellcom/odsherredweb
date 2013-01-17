jQuery(document).ready(function($){
  $('.toggle-related').find('.button').click(function(){
    $(this).toggleClass('open');
    $('.panel-region-stack2').find('.pane-node-field-reference').toggle();
    $('.panel-region-stack2').find('.pane-selvbetjening').toggle();
    $('.panel-region-stack2').find('.pane-kle-lonks-boks-panel-pane-1').toggle();
  });
});
