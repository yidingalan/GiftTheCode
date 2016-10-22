var main = function() {

  $('.sign-up-btn').click(function() {
    $('.login-form').fadeOut(1000);
    $('.sign-up-form').delay(800).fadeIn(3000);
  });

$('.btn-2').click(function() {
    $('.sign-up-form').hide(1000);
    $('.login-form').delay(2000).fadeIn(3000);
  });

};

$(document).ready(main);