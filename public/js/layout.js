/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/layout.js ***!
  \********************************/
$(document).ready(function () {
  var $path = location.pathname.split("/")[1];

  if ($path !== "") {
    $('.navbar-nav li a[href^="' + location + '"]').addClass('active');
  } else {
    $('.navbar-nav li .home-link').addClass('active');
  } // $('.navbar-nav li a').click(function(e) {
  //     var $currentPage = $(this).attr('href');
  //     window.location.href = $currentPage;
  //     // if ($path == $currentPage.split("/")[3]) {
  //     //     $(this).addClass('active');
  //     // } else if($path == $currentPage) {
  //     //     $(this).addClass('active');
  //     // }
  //     e.preventDefault();
  // });

});
/******/ })()
;
//# sourceMappingURL=layout.js.map