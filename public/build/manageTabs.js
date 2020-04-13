(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["manageTabs"],{

/***/ "./assets/js/manageTabs.js":
/*!*********************************!*\
  !*** ./assets/js/manageTabs.js ***!
  \*********************************/
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
    console.log("manageTabs ok");
    $(document).on('click', '.tab-button', function () {
      if ($(this).attr('id') !== "" && $(this).attr('data-type') !== "") {
        modifyTab($(this).attr('id'), $(this).attr('data-type'));
      } else {
        console.log("la tab que vous souhaitez afficher n'a pas d'ID ou de type");
      }
    });
  });

  function modifyTab(tabToEnableId, typeOfTab) {
    //tabs buttons are modified
    $('button[data-type=' + typeOfTab + ']').each(function () {
      if ($(this).attr('id') === tabToEnableId) {
        $(this).removeClass('coconuts-inactive');
        $(this).addClass('coconuts-active');
      } else {
        $(this).removeClass('coconuts-active');
        $(this).addClass('coconuts-inactive');
      }
    }); //tabs body are displayed or hidden

    $('div[data-type=' + typeOfTab + ']').each(function () {
      $(this).addClass('coconuts-hide');
    });
    $('div #' + tabToEnableId).removeClass('coconuts-hide');
    console.log('tab modified ');
  }
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},[["./assets/js/manageTabs.js","runtime","vendors~app~manageArticleComment~manageExpandCollapse~manageTabs~toggleArticleBookmark~toggleArticle~fe478918","vendors~manageArticleComment~manageExpandCollapse~manageTabs~toggleArticleBookmark~toggleArticleLike~664ffc85","manageArticleComment~manageExpandCollapse~manageTabs~toggleArticleBookmark~toggleArticleLike~toggleW~990338c0"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvbWFuYWdlVGFicy5qcyJdLCJuYW1lcyI6WyJyb3V0ZXMiLCJyZXF1aXJlIiwiUm91dGluZyIsInNldFJvdXRpbmdEYXRhIiwiJCIsImRvY3VtZW50IiwicmVhZHkiLCJjb25zb2xlIiwibG9nIiwib24iLCJhdHRyIiwibW9kaWZ5VGFiIiwidGFiVG9FbmFibGVJZCIsInR5cGVPZlRhYiIsImVhY2giLCJyZW1vdmVDbGFzcyIsImFkZENsYXNzIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBQUE7QUFBQTtBQUFBO0FBQUEsSUFBTUEsTUFBTSxHQUFHQyxtQkFBTyxDQUFDLDBFQUFELENBQXRCOztBQUNBO0FBRUFDLGtIQUFPLENBQUNDLGNBQVIsQ0FBdUJILE1BQXZCO0FBRUFJLENBQUMsQ0FBQyxZQUFZO0FBQ1ZBLEdBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVztBQUN6QkMsV0FBTyxDQUFDQyxHQUFSLENBQVksZUFBWjtBQUNBSixLQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZSSxFQUFaLENBQWUsT0FBZixFQUF1QixhQUF2QixFQUFzQyxZQUFVO0FBQzVDLFVBQUlMLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU0sSUFBUixDQUFhLElBQWIsTUFBdUIsRUFBdkIsSUFBNkJOLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU0sSUFBUixDQUFhLFdBQWIsTUFBOEIsRUFBL0QsRUFBbUU7QUFDL0RDLGlCQUFTLENBQUNQLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU0sSUFBUixDQUFhLElBQWIsQ0FBRCxFQUFxQk4sQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRTSxJQUFSLENBQWEsV0FBYixDQUFyQixDQUFUO0FBQ0gsT0FGRCxNQUdLO0FBQ0RILGVBQU8sQ0FBQ0MsR0FBUixDQUFZLDREQUFaO0FBQ0g7QUFDSixLQVBEO0FBUUgsR0FWRDs7QUFZQSxXQUFTRyxTQUFULENBQW1CQyxhQUFuQixFQUFrQ0MsU0FBbEMsRUFBNkM7QUFDekM7QUFDQVQsS0FBQyxDQUFDLHNCQUFxQlMsU0FBckIsR0FBZ0MsR0FBakMsQ0FBRCxDQUF1Q0MsSUFBdkMsQ0FBNEMsWUFBVztBQUNuRCxVQUFJVixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFNLElBQVIsQ0FBYSxJQUFiLE1BQXVCRSxhQUEzQixFQUEwQztBQUN0Q1IsU0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRVyxXQUFSLENBQW9CLG1CQUFwQjtBQUNBWCxTQUFDLENBQUMsSUFBRCxDQUFELENBQVFZLFFBQVIsQ0FBaUIsaUJBQWpCO0FBQ0gsT0FIRCxNQUdNO0FBQ0ZaLFNBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUVcsV0FBUixDQUFvQixpQkFBcEI7QUFDQVgsU0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRWSxRQUFSLENBQWlCLG1CQUFqQjtBQUNIO0FBQ0osS0FSRCxFQUZ5QyxDQVl6Qzs7QUFDQVosS0FBQyxDQUFDLG1CQUFrQlMsU0FBbEIsR0FBNkIsR0FBOUIsQ0FBRCxDQUFvQ0MsSUFBcEMsQ0FBeUMsWUFBVztBQUNoRFYsT0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRWSxRQUFSLENBQWlCLGVBQWpCO0FBQ0gsS0FGRDtBQUdBWixLQUFDLENBQUMsVUFBUVEsYUFBVCxDQUFELENBQXlCRyxXQUF6QixDQUFxQyxlQUFyQztBQUNBUixXQUFPLENBQUNDLEdBQVIsQ0FBWSxlQUFaO0FBQ0g7QUFDSixDQWhDQSxDQUFELEMiLCJmaWxlIjoibWFuYWdlVGFicy5qcyIsInNvdXJjZXNDb250ZW50IjpbImNvbnN0IHJvdXRlcyA9IHJlcXVpcmUoJy4uLy4uL3B1YmxpYy9qcy9mb3NfanNfcm91dGVzLmpzb24nKTtcbmltcG9ydCBSb3V0aW5nIGZyb20gJy4uLy4uL3ZlbmRvci9mcmllbmRzb2ZzeW1mb255L2pzcm91dGluZy1idW5kbGUvUmVzb3VyY2VzL3B1YmxpYy9qcy9yb3V0ZXIubWluLmpzJztcblxuUm91dGluZy5zZXRSb3V0aW5nRGF0YShyb3V0ZXMpO1xuXG4kKGZ1bmN0aW9uICgpIHtcbiAgICAkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcbiAgICAgICAgY29uc29sZS5sb2coXCJtYW5hZ2VUYWJzIG9rXCIpO1xuICAgICAgICAkKGRvY3VtZW50KS5vbignY2xpY2snLCcudGFiLWJ1dHRvbicsIGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICBpZiAoJCh0aGlzKS5hdHRyKCdpZCcpICE9PSBcIlwiICYmICQodGhpcykuYXR0cignZGF0YS10eXBlJykgIT09IFwiXCIpIHtcbiAgICAgICAgICAgICAgICBtb2RpZnlUYWIoJCh0aGlzKS5hdHRyKCdpZCcpLCAkKHRoaXMpLmF0dHIoJ2RhdGEtdHlwZScpKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKFwibGEgdGFiIHF1ZSB2b3VzIHNvdWhhaXRleiBhZmZpY2hlciBuJ2EgcGFzIGQnSUQgb3UgZGUgdHlwZVwiKVxuICAgICAgICAgICAgfVxuICAgICAgICB9KVxuICAgIH0pO1xuXG4gICAgZnVuY3Rpb24gbW9kaWZ5VGFiKHRhYlRvRW5hYmxlSWQsIHR5cGVPZlRhYikge1xuICAgICAgICAvL3RhYnMgYnV0dG9ucyBhcmUgbW9kaWZpZWRcbiAgICAgICAgJCgnYnV0dG9uW2RhdGEtdHlwZT0nKyB0eXBlT2ZUYWIgKyddJykuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIGlmICgkKHRoaXMpLmF0dHIoJ2lkJykgPT09IHRhYlRvRW5hYmxlSWQpIHtcbiAgICAgICAgICAgICAgICAkKHRoaXMpLnJlbW92ZUNsYXNzKCdjb2NvbnV0cy1pbmFjdGl2ZScpO1xuICAgICAgICAgICAgICAgICQodGhpcykuYWRkQ2xhc3MoJ2NvY29udXRzLWFjdGl2ZScpO1xuICAgICAgICAgICAgfWVsc2Uge1xuICAgICAgICAgICAgICAgICQodGhpcykucmVtb3ZlQ2xhc3MoJ2NvY29udXRzLWFjdGl2ZScpO1xuICAgICAgICAgICAgICAgICQodGhpcykuYWRkQ2xhc3MoJ2NvY29udXRzLWluYWN0aXZlJyk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pXG5cbiAgICAgICAgLy90YWJzIGJvZHkgYXJlIGRpc3BsYXllZCBvciBoaWRkZW5cbiAgICAgICAgJCgnZGl2W2RhdGEtdHlwZT0nKyB0eXBlT2ZUYWIgKyddJykuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICQodGhpcykuYWRkQ2xhc3MoJ2NvY29udXRzLWhpZGUnKTtcbiAgICAgICAgfSlcbiAgICAgICAgJCgnZGl2ICMnK3RhYlRvRW5hYmxlSWQpLnJlbW92ZUNsYXNzKCdjb2NvbnV0cy1oaWRlJyk7XG4gICAgICAgIGNvbnNvbGUubG9nKCd0YWIgbW9kaWZpZWQgJylcbiAgICB9XG59KSJdLCJzb3VyY2VSb290IjoiIn0=