jQuery(document).ready(function($) {
$("#tlf").text(function(i, text) {
        text = text.replace(/(\d\d)(\d\d)(\d\d)(\d\d)/, "$1 $2 $3 $4");
        return text;
    });
  
});
