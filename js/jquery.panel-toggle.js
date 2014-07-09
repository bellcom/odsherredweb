jQuery(document).ready(function($){
  $("[class*=quicktabs].toggle > .pane-content").hide();

  $('[class*=pane-quicktabs]').each(function(i){
    var name = $(this).find(' > .pane-title a').text();
    $('<a class="toggle-panel" href="#" title="Fold ' + name + ' menu ud">Fold ' + name + ' menu ud</a>').insertAfter($(this).find(' > .pane-title'));
  });

  $('.toggle-panel').click(function(e){
    e.preventDefault();
    var $thisDiv = $(this);
    $(this).next('.pane-content').toggle();
    $thisDiv.toggleClass('open');
    var $currentPane = $(this).next('.pane-content');
    $("[class*=quicktabs] > .pane-content").not($currentPane).hide();
    $("[class*=quicktabs] > .toggle-panel").not($thisDiv).removeClass('open');
  });
});
