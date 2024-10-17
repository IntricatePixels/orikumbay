(function ($) { 
  $(window).load(function () {
    $(".mega-col > a").on("click", function (e) {
      $('ul.sub-menu.depth_2').hide();
      $("li.mega-col > a.active-menu-link::after").css("background", "none");
      $("li.mega-tab a").removeClass("active-menu-link"); 
      $(this).addClass('active-menu-link');
      $(this ).next().fadeIn();
      $("li.mega-column_2>ul>li.menu-item:first-child > ul").fadeIn();
      e.preventDefault();
    });

    $(".mega-col-sub > a").on("click", function (e) {
      $(".mega-col-sub > a").removeClass('active-menu-link');
      $('ul.sub-menu.depth_3').hide();
      $(this).addClass('active-menu-link');
      $( this ).next().fadeIn();
      e.preventDefault();
    });
  });
})(jQuery);
