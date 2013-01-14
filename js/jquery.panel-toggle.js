jQuery(document).ready(function($){
  $("[class*=quicktabs] > .pane-content").hide();
  $('<div class="toggle-panel"></div>').insertAfter("[class*=quicktabs] > .pane-title");
  $('.toggle-panel').click(function(e){
    $(this).next('.pane-content').toggle();
    var $currentPane = $(this).next('.pane-content');
    $("[class*=quicktabs] > .pane-content").not($currentPane).hide();
  });
});
