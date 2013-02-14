jQuery(document).ready(function($){
  $("[class*=quicktabs].toggle > .pane-content").hide();
  $('<div class="toggle-panel"></div>').insertAfter("[class*=quicktabs] > .pane-title");
  $('.toggle-panel').click(function(e){
    var $thisDiv = $(this);
    $(this).next('.pane-content').toggle();
    $thisDiv.toggleClass('open');
    var $currentPane = $(this).next('.pane-content');
    $("[class*=quicktabs] > .pane-content").not($currentPane).hide();
    $("[class*=quicktabs] > .toggle-panel").not($thisDiv).removeClass('open');
  });
});
