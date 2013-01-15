jQuery(document).ready(function($){
  console.log('spotbox-toggle');

  $('.view-display-id-panel_pane_13').each(function(){
    var $itemList = $(this).find('.item-list');

    if($itemList) {
      var $paneTitle = $itemList.parent().find('.pane-title');
      $('<div class="show-links-wrapper"><i class="show-links"></i></div>').insertAfter($paneTitle);
      $itemList.hide();
    
      $('.show-links').click(function(e){
        $itemList.toggle();
        $(this).toggleClass('open');
      });
    
    }

  });
});
