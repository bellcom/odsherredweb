jQuery(document).ready(function($){
  function addToggleButton(e){
    var $itemList = $(e).find('.item-list');

    if($itemList) {
      var $paneTitle = $itemList.parent().find('.pane-title');
      $('<div class="show-links-wrapper"><i class="show-links"></i></div>').insertAfter($paneTitle);
      $itemList.hide();
    
      $('.show-links').click(function(e){
        $itemList.toggle();
        $(this).toggleClass('open');
      });
    }
  }
  
  $('.view-id-spotboxe').each(function(){addToggleButton(this);});
});
