jQuery(document).ready(function($){
  if($('.facetapi-date-range').find('.facetapi-active').length === 0){
    $('.facetapi-date-range').prepend('<li><span class="facet-date-label">Tidspunkt:</span></li>');
  }
  else {
    var url = $('.facetapi-date-range').find('.facetapi-active').attr('href');
    $('.facetapi-date-range > li.first').prepend('<span class="facet-date-label">Tidspunkt: </span>');
    $('.facetapi-date-range > li.first').removeClass('leaf');
   
    $('.facetapi-date-range > li.first a').remove();

    $('.facetapi-date-range').append('<li class="leaf"><a href="'+url+'">Se alle</a></li>');

    
  }
});
