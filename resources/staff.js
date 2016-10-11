// Load jQuery if not loaded
if(!window.jQuery) {
  document.write(decodeURI("%3Cscript type=\'text/javascript\' src=\'//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js\'%3E%3C/script%3E"));
}

// Toggle staff details
jQuery.noConflict();
jQuery(function(){
  jQuery('.bsuStaffToggle').click(function () {
    jQuery(this).next('.bsuStaffDetails').stop().slideToggle();
    jQuery(this).toggleClass("active");
    jQuery(this).find(".overlay").toggleClass("active");
  });
});