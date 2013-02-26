jQuery(document).ready(function($) {
  var pathArray = window.location.pathname.split( '/' );
  if(pathArray[1] === ""){

    var backgrounds = [];

    var i = 0;
    $('.background-images > div').each(function(){
      backgrounds[i] = {src: $(this).html(), fade:2000};
      i++;
    });

    if(backgrounds[0] !== undefined)
    {
      $.vegas({
        src: backgrounds[0].src
      }); 
      $.vegas('slideshow', {
        backgrounds: backgrounds,
      })('overlay');

      Drupal.viewsSlideshowControls = Drupal.viewsSlideshowControls || {};

      Drupal.viewsSlideshowControls.play = function (options) {
        $.vegas('pause');
      }
      Drupal.viewsSlideshowControls.pause = function (options) {
        $.vegas('pause');
      }
      Drupal.viewsSlideshowPagerFields = Drupal.viewsSlideshowPagerFields || {};
      
      Drupal.viewsSlideshowPagerFields.goToSlide = function (options) {
        $.vegas('jump', options['slideNum']);
      }
      
      Drupal.viewsSlideshowPagerFields.transitionBegin = function (options) {
        $.vegas('jump', options['slideNum']);
        //
        // Remove active class from pagers
        $('[id^="views_slideshow_pager_field_item_bottom_' + options.slideshowID + '"]').removeClass('active');
        
        // Add active class to active pager.
        $('#views_slideshow_pager_field_item_bottom_' + options.slideshowID + '_' + options.slideNum).addClass('active');
      }

    }
    if($('#views_slideshow_pager_field_item_bottom_aktuelt-panel_pane_3_0').length > 0)
    {
      $('<div class="slideshow-previous"><i class="previous-arrow"></i></div>').insertBefore('#views_slideshow_pager_field_item_bottom_aktuelt-panel_pane_3_0');
      $('<div class="slideshow-next"><i class="next-arrow"></i></div>').insertAfter('#views_slideshow_pager_field_item_bottom_aktuelt-panel_pane_3_2');

      $('.slideshow-previous').click(function(e){
        $('.views_slideshow_controls_text_previous > a').click();
      });
      $('.slideshow-next').click(function(e){
        $('.views_slideshow_controls_text_next > a').click();
      });
    }
  }
});
