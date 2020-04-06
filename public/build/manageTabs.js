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
      if ($(this).attr('id') !== "" && $(this).data('type') !== "") {
        modifyTab($(this).attr('id'), $(this).data('type'));
      } else {
        console.log("la tab que vous souhaitez afficher n'a pas d'ID ou de type");
      }
    });
  });

  function modifyTab(tabToEnableId, typeOfTab) {
    //tabs buttons are modified
    $('button[data-type=' + typeOfTab + ']').each(function () {
      $(this).removeClass('coconuts-active');
      $(this).addClass('coconuts-inactive');
      console.log($(this).attr('id'));
      console.log(tabToEnableId);

      if ($(this).attr('id') === tabToEnableId) {
        $(this).removeClass('coconuts-inactive');
        $(this).addClass('coconuts-active');
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

},[["./assets/js/manageTabs.js","runtime","vendors~app~manageArticleComment~manageTabs~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow","vendors~manageArticleComment~manageTabs~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow","manageArticleComment~manageTabs~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvbWFuYWdlVGFicy5qcyJdLCJuYW1lcyI6WyJyb3V0ZXMiLCJyZXF1aXJlIiwiUm91dGluZyIsInNldFJvdXRpbmdEYXRhIiwiJCIsImRvY3VtZW50IiwicmVhZHkiLCJjb25zb2xlIiwibG9nIiwib24iLCJhdHRyIiwiZGF0YSIsIm1vZGlmeVRhYiIsInRhYlRvRW5hYmxlSWQiLCJ0eXBlT2ZUYWIiLCJlYWNoIiwicmVtb3ZlQ2xhc3MiLCJhZGRDbGFzcyJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7OztBQUFBO0FBQUE7QUFBQTtBQUFBLElBQU1BLE1BQU0sR0FBR0MsbUJBQU8sQ0FBQywwRUFBRCxDQUF0Qjs7QUFDQTtBQUVBQyxrSEFBTyxDQUFDQyxjQUFSLENBQXVCSCxNQUF2QjtBQUVBSSxDQUFDLENBQUMsWUFBWTtBQUNWQSxHQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQVc7QUFDekJDLFdBQU8sQ0FBQ0MsR0FBUixDQUFZLGVBQVo7QUFDQUosS0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUksRUFBWixDQUFlLE9BQWYsRUFBdUIsYUFBdkIsRUFBc0MsWUFBVTtBQUM1QyxVQUFJTCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFNLElBQVIsQ0FBYSxJQUFiLE1BQXVCLEVBQXZCLElBQTZCTixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFPLElBQVIsQ0FBYSxNQUFiLE1BQXlCLEVBQTFELEVBQThEO0FBQzFEQyxpQkFBUyxDQUFDUixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFNLElBQVIsQ0FBYSxJQUFiLENBQUQsRUFBcUJOLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU8sSUFBUixDQUFhLE1BQWIsQ0FBckIsQ0FBVDtBQUNILE9BRkQsTUFHSztBQUNESixlQUFPLENBQUNDLEdBQVIsQ0FBWSw0REFBWjtBQUNIO0FBQ0osS0FQRDtBQVFILEdBVkQ7O0FBWUEsV0FBU0ksU0FBVCxDQUFtQkMsYUFBbkIsRUFBa0NDLFNBQWxDLEVBQTZDO0FBQ3pDO0FBQ0FWLEtBQUMsQ0FBQyxzQkFBcUJVLFNBQXJCLEdBQWdDLEdBQWpDLENBQUQsQ0FBdUNDLElBQXZDLENBQTRDLFlBQVc7QUFDbkRYLE9BQUMsQ0FBQyxJQUFELENBQUQsQ0FBUVksV0FBUixDQUFvQixpQkFBcEI7QUFDQVosT0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRYSxRQUFSLENBQWlCLG1CQUFqQjtBQUNBVixhQUFPLENBQUNDLEdBQVIsQ0FBWUosQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRTSxJQUFSLENBQWEsSUFBYixDQUFaO0FBQ0FILGFBQU8sQ0FBQ0MsR0FBUixDQUFZSyxhQUFaOztBQUNBLFVBQUlULENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU0sSUFBUixDQUFhLElBQWIsTUFBdUJHLGFBQTNCLEVBQTBDO0FBQ3RDVCxTQUFDLENBQUMsSUFBRCxDQUFELENBQVFZLFdBQVIsQ0FBb0IsbUJBQXBCO0FBQ0FaLFNBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUWEsUUFBUixDQUFpQixpQkFBakI7QUFDSDtBQUNKLEtBVEQsRUFGeUMsQ0FhekM7O0FBQ0FiLEtBQUMsQ0FBQyxtQkFBaUJVLFNBQWpCLEdBQTJCLEdBQTVCLENBQUQsQ0FBa0NDLElBQWxDLENBQXVDLFlBQVc7QUFDOUNYLE9BQUMsQ0FBQyxJQUFELENBQUQsQ0FBUWEsUUFBUixDQUFpQixlQUFqQjtBQUNILEtBRkQ7QUFHQWIsS0FBQyxDQUFDLFVBQVFTLGFBQVQsQ0FBRCxDQUF5QkcsV0FBekIsQ0FBcUMsZUFBckM7QUFDQVQsV0FBTyxDQUFDQyxHQUFSLENBQVksZUFBWjtBQUNIO0FBQ0osQ0FqQ0EsQ0FBRCxDIiwiZmlsZSI6Im1hbmFnZVRhYnMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJjb25zdCByb3V0ZXMgPSByZXF1aXJlKCcuLi8uLi9wdWJsaWMvanMvZm9zX2pzX3JvdXRlcy5qc29uJyk7XG5pbXBvcnQgUm91dGluZyBmcm9tICcuLi8uLi92ZW5kb3IvZnJpZW5kc29mc3ltZm9ueS9qc3JvdXRpbmctYnVuZGxlL1Jlc291cmNlcy9wdWJsaWMvanMvcm91dGVyLm1pbi5qcyc7XG5cblJvdXRpbmcuc2V0Um91dGluZ0RhdGEocm91dGVzKTtcblxuJChmdW5jdGlvbiAoKSB7XG4gICAgJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XG4gICAgICAgIGNvbnNvbGUubG9nKFwibWFuYWdlVGFicyBva1wiKTtcbiAgICAgICAgJChkb2N1bWVudCkub24oJ2NsaWNrJywnLnRhYi1idXR0b24nLCBmdW5jdGlvbigpe1xuICAgICAgICAgICAgaWYgKCQodGhpcykuYXR0cignaWQnKSAhPT0gXCJcIiAmJiAkKHRoaXMpLmRhdGEoJ3R5cGUnKSAhPT0gXCJcIikge1xuICAgICAgICAgICAgICAgIG1vZGlmeVRhYigkKHRoaXMpLmF0dHIoJ2lkJyksICQodGhpcykuZGF0YSgndHlwZScpKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKFwibGEgdGFiIHF1ZSB2b3VzIHNvdWhhaXRleiBhZmZpY2hlciBuJ2EgcGFzIGQnSUQgb3UgZGUgdHlwZVwiKVxuICAgICAgICAgICAgfVxuICAgICAgICB9KVxuICAgIH0pO1xuXG4gICAgZnVuY3Rpb24gbW9kaWZ5VGFiKHRhYlRvRW5hYmxlSWQsIHR5cGVPZlRhYikge1xuICAgICAgICAvL3RhYnMgYnV0dG9ucyBhcmUgbW9kaWZpZWRcbiAgICAgICAgJCgnYnV0dG9uW2RhdGEtdHlwZT0nKyB0eXBlT2ZUYWIgKyddJykuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICQodGhpcykucmVtb3ZlQ2xhc3MoJ2NvY29udXRzLWFjdGl2ZScpO1xuICAgICAgICAgICAgJCh0aGlzKS5hZGRDbGFzcygnY29jb251dHMtaW5hY3RpdmUnKTtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCQodGhpcykuYXR0cignaWQnKSlcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKHRhYlRvRW5hYmxlSWQpXG4gICAgICAgICAgICBpZiAoJCh0aGlzKS5hdHRyKCdpZCcpID09PSB0YWJUb0VuYWJsZUlkKSB7XG4gICAgICAgICAgICAgICAgJCh0aGlzKS5yZW1vdmVDbGFzcygnY29jb251dHMtaW5hY3RpdmUnKTtcbiAgICAgICAgICAgICAgICAkKHRoaXMpLmFkZENsYXNzKCdjb2NvbnV0cy1hY3RpdmUnKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSlcblxuICAgICAgICAvL3RhYnMgYm9keSBhcmUgZGlzcGxheWVkIG9yIGhpZGRlblxuICAgICAgICAkKCdkaXZbZGF0YS10eXBlPScrdHlwZU9mVGFiKyddJykuZWFjaChmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICQodGhpcykuYWRkQ2xhc3MoJ2NvY29udXRzLWhpZGUnKTtcbiAgICAgICAgfSlcbiAgICAgICAgJCgnZGl2ICMnK3RhYlRvRW5hYmxlSWQpLnJlbW92ZUNsYXNzKCdjb2NvbnV0cy1oaWRlJyk7XG4gICAgICAgIGNvbnNvbGUubG9nKCd0YWIgbW9kaWZpZWQgJylcbiAgICB9XG59KSJdLCJzb3VyY2VSb290IjoiIn0=