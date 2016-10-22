var main = function() {
  /* Push the body and the nav over by 285px over */
  $('.sign-up-btn').click(function() {
    $('.login-form').fadeOut(1000);
    $('.sign-up-form').fadeIn(3000);
  });


};

$(document).ready(main);