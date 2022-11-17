/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/index.js ***!
  \*******************************/
$("body").click(function () {
  $("#student_change").hide();
});
$(".UserBox_s").click(function (e) {
  e.stopPropagation();
  $(".jump1").slideToggle();
});
$(".UserBox_c").click(function (e) {
  $(".jump2").slideToggle();
});
$(".UserBox_t").click(function (e) {
  $(".jump3").slideToggle();
});
/******/ })()
;