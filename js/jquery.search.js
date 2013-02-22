jQuery(document).ready(function($){

  if(document.location.href.indexOf('search') !== -1){

    if($('.block-sort ul').find('.active').length === 0) {

      $('.block-sort ul').prepend('<span class="solr-sort-label">Sorter efter:</span>');
    } else
    {
      var activeSortLiHtml = $('.block-sort ul').find('.active').parent().html();
      $('.block-sort ul').find('.active').parent().remove();
      
      $('.block-sort ul').prepend('<span class="solr-sort-label">Sorter efter:</span>'+activeSortLiHtml);
    }

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
  }
});
