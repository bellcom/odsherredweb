jQuery(document).ready(function($){
    
    
  function addToggleButton(e){
    var $itemList = $(e).find('.item-list');

    if($itemList) {
      var $paneTitle = $itemList.parent().find('.pane-title');
      $('<div class="show-links-wrapper"><i class="show-links"></i></div>').insertAfter($paneTitle);
      $itemList.hide();
    
      $('.show-links').click(function(e){
        $itemList.toggle();
        $(e).toggleClass('open');
      });
    
    }

  };
  
  $('.view-display-id-panel_pane_13').each(function(){addToggleButton(this)});
  $('.view-display-id-panel_pane_14').each(function(){addToggleButton(this)});
});
