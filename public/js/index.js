/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/index.js ***!
  \*******************************/
// $(document).ready(function () {
//     $('#example').DataTable();
// });
// const swal = (window.swal = require("sweetalert2"));
// var oNavbarToggler = document.getElementsByClassName('navbar-toggler');
// var aNavLink = document.getElementsByClassName('nav-item')
// console.log(aNavLink)
// console.log(123)

//Pair-Box
var PB_tbody = document.querySelector("#Pair-Box-tbody");
// console.log(PB_tbody.rows.length)
if (PB_tbody.rows.length === 0) {
  var tr = document.createElement("tr");
  var td = document.createElement("td");
  tr.append(td);
  PB_tbody.append(tr);
  td.colSpan = "100";
  td.innerHTML = "暫無資料";
  td.className = "text-center";
}
/******/ })()
;