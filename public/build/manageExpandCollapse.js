(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["manageExpandCollapse"],{

/***/ "./assets/js/manageExpandCollapse.js":
/*!*******************************************!*\
  !*** ./assets/js/manageExpandCollapse.js ***!
  \*******************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js */ "./vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js");
/* harmony import */ var _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_0__);
var routes = __webpack_require__(/*! ../../public/js/fos_js_routes.json */ "./public/js/fos_js_routes.json");


_vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_0___default.a.setRoutingData(routes);
$(function () {
  $(document).ready(function () {
    hideAllArticles();
    $(document).on('click', '.trigger-collapse-articles', function () {
      if ($(this).attr('data-id') !== "") {
        toggleContent($(this).attr('data-id'), $(this));
      } else {
        console.log("le contenu que vous souhaitez afficher n'a pas d'ID ou de type");
      }
    });
  });

  function hideAllArticles() {
    var allArticles = $('.content-to-collapse');
    allArticles.each(function () {
      $(this).hide();
    });
  }

  function toggleContent(contentToTriggerId, selector) {
    var iconExpand = "/images/icons/iconfinder_expand2_308964.png";
    var iconCollapse = "/images/icons/iconfinder_collapse2_308968.png";
    var element = $('.content-to-collapse[data-id=' + contentToTriggerId + ']');

    if ($(element).is(":visible")) {
      element.hide("fast", "swing");
      selector.attr("src", iconExpand);
    } else {
      element.show("fast", "swing");
      selector.attr("src", iconCollapse);
    }
  }
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},[["./assets/js/manageExpandCollapse.js","runtime","vendors~app~manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageTabs~toggleArti~5918ea3b","vendors~manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageTabs~toggleArticleB~e68393d8","manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageTabs~toggleArticleBookmark~~638521e2"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvbWFuYWdlRXhwYW5kQ29sbGFwc2UuanMiXSwibmFtZXMiOlsicm91dGVzIiwicmVxdWlyZSIsIlJvdXRpbmciLCJzZXRSb3V0aW5nRGF0YSIsIiQiLCJkb2N1bWVudCIsInJlYWR5IiwiaGlkZUFsbEFydGljbGVzIiwib24iLCJhdHRyIiwidG9nZ2xlQ29udGVudCIsImNvbnNvbGUiLCJsb2ciLCJhbGxBcnRpY2xlcyIsImVhY2giLCJoaWRlIiwiY29udGVudFRvVHJpZ2dlcklkIiwic2VsZWN0b3IiLCJpY29uRXhwYW5kIiwiaWNvbkNvbGxhcHNlIiwiZWxlbWVudCIsImlzIiwic2hvdyJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7OztBQUFBO0FBQUE7QUFBQTtBQUFBLElBQU1BLE1BQU0sR0FBR0MsbUJBQU8sQ0FBQywwRUFBRCxDQUF0Qjs7QUFDQTtBQUVBQyxrSEFBTyxDQUFDQyxjQUFSLENBQXVCSCxNQUF2QjtBQUVBSSxDQUFDLENBQUMsWUFBWTtBQUNWQSxHQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQVc7QUFDekJDLG1CQUFlO0FBQ2ZILEtBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlHLEVBQVosQ0FBZSxPQUFmLEVBQXVCLDRCQUF2QixFQUFxRCxZQUFVO0FBQzNELFVBQUlKLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUssSUFBUixDQUFhLFNBQWIsTUFBNEIsRUFBaEMsRUFBb0M7QUFDaENDLHFCQUFhLENBQUNOLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUssSUFBUixDQUFhLFNBQWIsQ0FBRCxFQUEwQkwsQ0FBQyxDQUFDLElBQUQsQ0FBM0IsQ0FBYjtBQUNILE9BRkQsTUFHSztBQUNETyxlQUFPLENBQUNDLEdBQVIsQ0FBWSxnRUFBWjtBQUNIO0FBQ0osS0FQRDtBQVFILEdBVkQ7O0FBWUEsV0FBU0wsZUFBVCxHQUEyQjtBQUN2QixRQUFJTSxXQUFXLEdBQUdULENBQUMsQ0FBQyxzQkFBRCxDQUFuQjtBQUNBUyxlQUFXLENBQUNDLElBQVosQ0FBaUIsWUFBVztBQUN4QlYsT0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRVyxJQUFSO0FBQ0gsS0FGRDtBQUdIOztBQUVELFdBQVNMLGFBQVQsQ0FBdUJNLGtCQUF2QixFQUEyQ0MsUUFBM0MsRUFBcUQ7QUFDakQsUUFBTUMsVUFBVSxHQUFHLDZDQUFuQjtBQUNBLFFBQU1DLFlBQVksR0FBRywrQ0FBckI7QUFDQSxRQUFJQyxPQUFPLEdBQUdoQixDQUFDLENBQUMsa0NBQWlDWSxrQkFBakMsR0FBc0QsR0FBdkQsQ0FBZjs7QUFDQSxRQUFJWixDQUFDLENBQUNnQixPQUFELENBQUQsQ0FBV0MsRUFBWCxDQUFjLFVBQWQsQ0FBSixFQUErQjtBQUMzQkQsYUFBTyxDQUFDTCxJQUFSLENBQWEsTUFBYixFQUFxQixPQUFyQjtBQUNBRSxjQUFRLENBQUNSLElBQVQsQ0FBYyxLQUFkLEVBQXFCUyxVQUFyQjtBQUNILEtBSEQsTUFHTztBQUNIRSxhQUFPLENBQUNFLElBQVIsQ0FBYSxNQUFiLEVBQXFCLE9BQXJCO0FBQ0FMLGNBQVEsQ0FBQ1IsSUFBVCxDQUFjLEtBQWQsRUFBcUJVLFlBQXJCO0FBQ0g7QUFDSjtBQUNKLENBaENBLENBQUQsQyIsImZpbGUiOiJtYW5hZ2VFeHBhbmRDb2xsYXBzZS5qcyIsInNvdXJjZXNDb250ZW50IjpbImNvbnN0IHJvdXRlcyA9IHJlcXVpcmUoJy4uLy4uL3B1YmxpYy9qcy9mb3NfanNfcm91dGVzLmpzb24nKTtcbmltcG9ydCBSb3V0aW5nIGZyb20gJy4uLy4uL3ZlbmRvci9mcmllbmRzb2ZzeW1mb255L2pzcm91dGluZy1idW5kbGUvUmVzb3VyY2VzL3B1YmxpYy9qcy9yb3V0ZXIubWluLmpzJztcblxuUm91dGluZy5zZXRSb3V0aW5nRGF0YShyb3V0ZXMpO1xuXG4kKGZ1bmN0aW9uICgpIHtcbiAgICAkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcbiAgICAgICAgaGlkZUFsbEFydGljbGVzKCk7XG4gICAgICAgICQoZG9jdW1lbnQpLm9uKCdjbGljaycsJy50cmlnZ2VyLWNvbGxhcHNlLWFydGljbGVzJywgZnVuY3Rpb24oKXtcbiAgICAgICAgICAgIGlmICgkKHRoaXMpLmF0dHIoJ2RhdGEtaWQnKSAhPT0gXCJcIikge1xuICAgICAgICAgICAgICAgIHRvZ2dsZUNvbnRlbnQoJCh0aGlzKS5hdHRyKCdkYXRhLWlkJyksICQodGhpcykpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coXCJsZSBjb250ZW51IHF1ZSB2b3VzIHNvdWhhaXRleiBhZmZpY2hlciBuJ2EgcGFzIGQnSUQgb3UgZGUgdHlwZVwiKVxuICAgICAgICAgICAgfVxuICAgICAgICB9KVxuICAgIH0pO1xuXG4gICAgZnVuY3Rpb24gaGlkZUFsbEFydGljbGVzKCkge1xuICAgICAgICBsZXQgYWxsQXJ0aWNsZXMgPSAkKCcuY29udGVudC10by1jb2xsYXBzZScpO1xuICAgICAgICBhbGxBcnRpY2xlcy5lYWNoKGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgJCh0aGlzKS5oaWRlKCk7XG4gICAgICAgIH0pXG4gICAgfVxuXG4gICAgZnVuY3Rpb24gdG9nZ2xlQ29udGVudChjb250ZW50VG9UcmlnZ2VySWQsIHNlbGVjdG9yKSB7XG4gICAgICAgIGNvbnN0IGljb25FeHBhbmQgPSBcIi9pbWFnZXMvaWNvbnMvaWNvbmZpbmRlcl9leHBhbmQyXzMwODk2NC5wbmdcIjtcbiAgICAgICAgY29uc3QgaWNvbkNvbGxhcHNlID0gXCIvaW1hZ2VzL2ljb25zL2ljb25maW5kZXJfY29sbGFwc2UyXzMwODk2OC5wbmdcIjtcbiAgICAgICAgbGV0IGVsZW1lbnQgPSAkKCcuY29udGVudC10by1jb2xsYXBzZVtkYXRhLWlkPScrIGNvbnRlbnRUb1RyaWdnZXJJZCArICddJyk7XG4gICAgICAgIGlmICgkKGVsZW1lbnQpLmlzKFwiOnZpc2libGVcIikpIHtcbiAgICAgICAgICAgIGVsZW1lbnQuaGlkZShcImZhc3RcIiwgXCJzd2luZ1wiKTtcbiAgICAgICAgICAgIHNlbGVjdG9yLmF0dHIoXCJzcmNcIiwgaWNvbkV4cGFuZCk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBlbGVtZW50LnNob3coXCJmYXN0XCIsIFwic3dpbmdcIik7XG4gICAgICAgICAgICBzZWxlY3Rvci5hdHRyKFwic3JjXCIsIGljb25Db2xsYXBzZSk7XG4gICAgICAgIH1cbiAgICB9XG59KSJdLCJzb3VyY2VSb290IjoiIn0=