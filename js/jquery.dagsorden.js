(function ($) {
var is_visible = false;

$('.agenda-item').hide(); 

$('a.agenda-bullet-list').click(function(e) {
  e.preventDefault();
  $(this).nextAll('.agenda-item').toggle();
  $(this).toggleClass('open');
  return false;
  });
}(jQuery));
