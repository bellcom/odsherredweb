jQuery(document).ready(function($) {
  var pathArray = window.location.pathname.split( '/' );
  //if(pathArray[1] == ""){

    var backgrounds = [];

    var i = 0;
    $('.background-images > div').each(function(){
      backgrounds[i] = {src: $(this).html(), fade:1500};
      i++;
    });

    $.vegas({
      src: backgrounds[0].src
    }); 

    $.vegas('slideshow', {
      backgrounds: backgrounds,
    })('overlay');

    Drupal.viewsSlideshowControls.pause = function (options) {
      $.vegas('pause');

    }
    Drupal.viewsSlideshowPagerFields.goToSlide = function (options) {
      $.vegas('jump', options['slideNum']);
    }
    $('<div class="slideshow-previous"><i class="previous-arrow">').insertBefore('#views_slideshow_pager_field_item_bottom_aktuelt-panel_pane_3_0');
    $('<div class="slideshow-next"><i class="next-arrow">').insertAfter('#views_slideshow_pager_field_item_bottom_aktuelt-panel_pane_3_2');

    $('.slideshow-previous').click(function(e){
      $('.views_slideshow_controls_text_previous > a').click();
    });
    $('.slideshow-next').click(function(e){
      $('.views_slideshow_controls_text_next > a').click();
    });
  //}
});
