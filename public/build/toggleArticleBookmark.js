(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["toggleArticleBookmark"],{

/***/ "./assets/js/toggleBookMarkArticle.js":
/*!********************************************!*\
  !*** ./assets/js/toggleBookMarkArticle.js ***!
  \********************************************/
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
    $(document).on('click', '.toggle-bookmark-article', function () {
      operateAddOrRemoveBookMarkOnArticle($(this).attr('data-article-id'), $(this).attr('data-has-bookmark'));
    });
  });

  function operateAddOrRemoveBookMarkOnArticle(articleId, hasBookmark) {
    var visitorId = $('#visitorId').val(); // var articleId = $('#articleId').val();
    //var hasBookmark = $('#hasBookmark').val();

    var ajaxPath = "bookmark_ajaxAddBookmarkToArticle";

    if (visitorId === "") {
      console.log('no user id/ cannot bookmark Article');
    } else {
      if (hasBookmark === "1") {
        ajaxPath = "bookmark_ajaxRemoveBookmarkFromArticle";
      }

      console.log(ajaxPath);
      $.ajax({
        type: 'POST',
        async: true,
        data: {
          visitorId: visitorId
        },
        url: _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_0___default.a.generate(ajaxPath, {
          idArticle: articleId
        })
      }).done(function (response) {
        var isBookmarkedCurrentStatus = response.isBookmarkedCurrentStatus;
        var modifiedArticleId = response.modifiedArticleId;
        var bookmarkSelector = $('.toggle-bookmark-article[data-article-id=' + modifiedArticleId + ']');

        if (isBookmarkedCurrentStatus === true) {
          //$('#hasBookmark').attr('value', '1')
          bookmarkSelector.removeClass('far');
          bookmarkSelector.addClass('fas');
          bookmarkSelector.attr('data-has-bookmark', '1');
        } else if (isBookmarkedCurrentStatus === false) {
          //$('#hasBookmark').attr('value', '0')
          bookmarkSelector.removeClass('fas');
          bookmarkSelector.addClass('far');
          bookmarkSelector.attr('data-has-bookmark', '0');
        }
      }).fail(function (response, status, xhr) {
        console.log("Une erreur est survenue, action non enregistrée");
      });
    }
  }
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},[["./assets/js/toggleBookMarkArticle.js","runtime","vendors~app~manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageTabs~toggleArti~5918ea3b","vendors~manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageTabs~toggleArticleB~e68393d8","manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageTabs~toggleArticleBookmark~~638521e2"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvdG9nZ2xlQm9va01hcmtBcnRpY2xlLmpzIl0sIm5hbWVzIjpbInJvdXRlcyIsInJlcXVpcmUiLCJSb3V0aW5nIiwic2V0Um91dGluZ0RhdGEiLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsIm9uIiwib3BlcmF0ZUFkZE9yUmVtb3ZlQm9va01hcmtPbkFydGljbGUiLCJhdHRyIiwiYXJ0aWNsZUlkIiwiaGFzQm9va21hcmsiLCJ2aXNpdG9ySWQiLCJ2YWwiLCJhamF4UGF0aCIsImNvbnNvbGUiLCJsb2ciLCJhamF4IiwidHlwZSIsImFzeW5jIiwiZGF0YSIsInVybCIsImdlbmVyYXRlIiwiaWRBcnRpY2xlIiwiZG9uZSIsInJlc3BvbnNlIiwiaXNCb29rbWFya2VkQ3VycmVudFN0YXR1cyIsIm1vZGlmaWVkQXJ0aWNsZUlkIiwiYm9va21hcmtTZWxlY3RvciIsInJlbW92ZUNsYXNzIiwiYWRkQ2xhc3MiLCJmYWlsIiwic3RhdHVzIiwieGhyIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBQUE7QUFBQTtBQUFBO0FBQUEsSUFBTUEsTUFBTSxHQUFHQyxtQkFBTyxDQUFDLDBFQUFELENBQXRCOztBQUNBO0FBRUFDLGtIQUFPLENBQUNDLGNBQVIsQ0FBdUJILE1BQXZCO0FBRUFJLENBQUMsQ0FBQyxZQUFZO0FBQ1ZBLEdBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVztBQUN6QkYsS0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUUsRUFBWixDQUFlLE9BQWYsRUFBdUIsMEJBQXZCLEVBQW1ELFlBQVU7QUFDekRDLHlDQUFtQyxDQUFDSixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFLLElBQVIsQ0FBYSxpQkFBYixDQUFELEVBQWtDTCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFLLElBQVIsQ0FBYSxtQkFBYixDQUFsQyxDQUFuQztBQUNILEtBRkQ7QUFHSCxHQUpEOztBQU1BLFdBQVNELG1DQUFULENBQTZDRSxTQUE3QyxFQUF3REMsV0FBeEQsRUFBcUU7QUFDakUsUUFBSUMsU0FBUyxHQUFHUixDQUFDLENBQUMsWUFBRCxDQUFELENBQWdCUyxHQUFoQixFQUFoQixDQURpRSxDQUVsRTtBQUNDOztBQUNBLFFBQUlDLFFBQVEsR0FBRyxtQ0FBZjs7QUFFQSxRQUFJRixTQUFTLEtBQUssRUFBbEIsRUFBc0I7QUFDbEJHLGFBQU8sQ0FBQ0MsR0FBUixDQUFZLHFDQUFaO0FBQ0gsS0FGRCxNQUlLO0FBQ0QsVUFBSUwsV0FBVyxLQUFLLEdBQXBCLEVBQXlCO0FBQ3JCRyxnQkFBUSxHQUFHLHdDQUFYO0FBQ0g7O0FBQ0RDLGFBQU8sQ0FBQ0MsR0FBUixDQUFZRixRQUFaO0FBRUFWLE9BQUMsQ0FBQ2EsSUFBRixDQUFPO0FBQ0hDLFlBQUksRUFBRSxNQURIO0FBRUhDLGFBQUssRUFBRSxJQUZKO0FBR0hDLFlBQUksRUFBRTtBQUFFUixtQkFBUyxFQUFFQTtBQUFiLFNBSEg7QUFJSFMsV0FBRyxFQUFFbkIsa0hBQU8sQ0FBQ29CLFFBQVIsQ0FBaUJSLFFBQWpCLEVBQTJCO0FBQzVCUyxtQkFBUyxFQUFFYjtBQURpQixTQUEzQjtBQUpGLE9BQVAsRUFRS2MsSUFSTCxDQVFVLFVBQVNDLFFBQVQsRUFBbUI7QUFDckIsWUFBSUMseUJBQXlCLEdBQUdELFFBQVEsQ0FBQ0MseUJBQXpDO0FBQ0EsWUFBSUMsaUJBQWlCLEdBQUdGLFFBQVEsQ0FBQ0UsaUJBQWpDO0FBQ0EsWUFBSUMsZ0JBQWdCLEdBQUd4QixDQUFDLENBQUMsOENBQThDdUIsaUJBQTlDLEdBQWtFLEdBQW5FLENBQXhCOztBQUNBLFlBQUlELHlCQUF5QixLQUFLLElBQWxDLEVBQXdDO0FBQ3BDO0FBQ0FFLDBCQUFnQixDQUFDQyxXQUFqQixDQUE2QixLQUE3QjtBQUNBRCwwQkFBZ0IsQ0FBQ0UsUUFBakIsQ0FBMEIsS0FBMUI7QUFDQUYsMEJBQWdCLENBQUNuQixJQUFqQixDQUFzQixtQkFBdEIsRUFBMkMsR0FBM0M7QUFDSCxTQUxELE1BTUssSUFBSWlCLHlCQUF5QixLQUFLLEtBQWxDLEVBQXlDO0FBQzFDO0FBQ0FFLDBCQUFnQixDQUFDQyxXQUFqQixDQUE2QixLQUE3QjtBQUNBRCwwQkFBZ0IsQ0FBQ0UsUUFBakIsQ0FBMEIsS0FBMUI7QUFDQUYsMEJBQWdCLENBQUNuQixJQUFqQixDQUFzQixtQkFBdEIsRUFBMkMsR0FBM0M7QUFDSDtBQUNKLE9BeEJMLEVBeUJLc0IsSUF6QkwsQ0F5QlUsVUFBU04sUUFBVCxFQUFtQk8sTUFBbkIsRUFBMkJDLEdBQTNCLEVBQStCO0FBQ2pDbEIsZUFBTyxDQUFDQyxHQUFSLENBQVksaURBQVo7QUFDSCxPQTNCTDtBQTRCSDtBQUNKO0FBQ0osQ0FyREEsQ0FBRCxDIiwiZmlsZSI6InRvZ2dsZUFydGljbGVCb29rbWFyay5qcyIsInNvdXJjZXNDb250ZW50IjpbImNvbnN0IHJvdXRlcyA9IHJlcXVpcmUoJy4uLy4uL3B1YmxpYy9qcy9mb3NfanNfcm91dGVzLmpzb24nKTtcbmltcG9ydCBSb3V0aW5nIGZyb20gJy4uLy4uL3ZlbmRvci9mcmllbmRzb2ZzeW1mb255L2pzcm91dGluZy1idW5kbGUvUmVzb3VyY2VzL3B1YmxpYy9qcy9yb3V0ZXIubWluLmpzJztcblxuUm91dGluZy5zZXRSb3V0aW5nRGF0YShyb3V0ZXMpO1xuXG4kKGZ1bmN0aW9uICgpIHtcbiAgICAkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcbiAgICAgICAgJChkb2N1bWVudCkub24oJ2NsaWNrJywnLnRvZ2dsZS1ib29rbWFyay1hcnRpY2xlJywgZnVuY3Rpb24oKXtcbiAgICAgICAgICAgIG9wZXJhdGVBZGRPclJlbW92ZUJvb2tNYXJrT25BcnRpY2xlKCQodGhpcykuYXR0cignZGF0YS1hcnRpY2xlLWlkJyksICQodGhpcykuYXR0cignZGF0YS1oYXMtYm9va21hcmsnKSk7XG4gICAgICAgIH0pXG4gICAgfSk7XG5cbiAgICBmdW5jdGlvbiBvcGVyYXRlQWRkT3JSZW1vdmVCb29rTWFya09uQXJ0aWNsZShhcnRpY2xlSWQsIGhhc0Jvb2ttYXJrKSB7XG4gICAgICAgIHZhciB2aXNpdG9ySWQgPSAkKCcjdmlzaXRvcklkJykudmFsKCk7XG4gICAgICAgLy8gdmFyIGFydGljbGVJZCA9ICQoJyNhcnRpY2xlSWQnKS52YWwoKTtcbiAgICAgICAgLy92YXIgaGFzQm9va21hcmsgPSAkKCcjaGFzQm9va21hcmsnKS52YWwoKTtcbiAgICAgICAgdmFyIGFqYXhQYXRoID0gXCJib29rbWFya19hamF4QWRkQm9va21hcmtUb0FydGljbGVcIjtcblxuICAgICAgICBpZiAodmlzaXRvcklkID09PSBcIlwiKSB7XG4gICAgICAgICAgICBjb25zb2xlLmxvZygnbm8gdXNlciBpZC8gY2Fubm90IGJvb2ttYXJrIEFydGljbGUnKTtcbiAgICAgICAgfVxuXG4gICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgaWYgKGhhc0Jvb2ttYXJrID09PSBcIjFcIikge1xuICAgICAgICAgICAgICAgIGFqYXhQYXRoID0gXCJib29rbWFya19hamF4UmVtb3ZlQm9va21hcmtGcm9tQXJ0aWNsZVwiO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgY29uc29sZS5sb2coYWpheFBhdGgpO1xuXG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIHR5cGU6ICdQT1NUJyxcbiAgICAgICAgICAgICAgICBhc3luYzogdHJ1ZSxcbiAgICAgICAgICAgICAgICBkYXRhOiB7IHZpc2l0b3JJZDogdmlzaXRvcklkIH0sXG4gICAgICAgICAgICAgICAgdXJsOiBSb3V0aW5nLmdlbmVyYXRlKGFqYXhQYXRoLCB7XG4gICAgICAgICAgICAgICAgICAgIGlkQXJ0aWNsZTogYXJ0aWNsZUlkXG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgLmRvbmUoZnVuY3Rpb24ocmVzcG9uc2UpIHtcbiAgICAgICAgICAgICAgICAgICAgbGV0IGlzQm9va21hcmtlZEN1cnJlbnRTdGF0dXMgPSByZXNwb25zZS5pc0Jvb2ttYXJrZWRDdXJyZW50U3RhdHVzO1xuICAgICAgICAgICAgICAgICAgICBsZXQgbW9kaWZpZWRBcnRpY2xlSWQgPSByZXNwb25zZS5tb2RpZmllZEFydGljbGVJZDtcbiAgICAgICAgICAgICAgICAgICAgbGV0IGJvb2ttYXJrU2VsZWN0b3IgPSAkKCcudG9nZ2xlLWJvb2ttYXJrLWFydGljbGVbZGF0YS1hcnRpY2xlLWlkPScgKyBtb2RpZmllZEFydGljbGVJZCArICddJyk7XG4gICAgICAgICAgICAgICAgICAgIGlmIChpc0Jvb2ttYXJrZWRDdXJyZW50U3RhdHVzID09PSB0cnVlKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAvLyQoJyNoYXNCb29rbWFyaycpLmF0dHIoJ3ZhbHVlJywgJzEnKVxuICAgICAgICAgICAgICAgICAgICAgICAgYm9va21hcmtTZWxlY3Rvci5yZW1vdmVDbGFzcygnZmFyJylcbiAgICAgICAgICAgICAgICAgICAgICAgIGJvb2ttYXJrU2VsZWN0b3IuYWRkQ2xhc3MoJ2ZhcycpXG4gICAgICAgICAgICAgICAgICAgICAgICBib29rbWFya1NlbGVjdG9yLmF0dHIoJ2RhdGEtaGFzLWJvb2ttYXJrJywgJzEnKVxuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIGVsc2UgaWYgKGlzQm9va21hcmtlZEN1cnJlbnRTdGF0dXMgPT09IGZhbHNlKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAvLyQoJyNoYXNCb29rbWFyaycpLmF0dHIoJ3ZhbHVlJywgJzAnKVxuICAgICAgICAgICAgICAgICAgICAgICAgYm9va21hcmtTZWxlY3Rvci5yZW1vdmVDbGFzcygnZmFzJylcbiAgICAgICAgICAgICAgICAgICAgICAgIGJvb2ttYXJrU2VsZWN0b3IuYWRkQ2xhc3MoJ2ZhcicpXG4gICAgICAgICAgICAgICAgICAgICAgICBib29rbWFya1NlbGVjdG9yLmF0dHIoJ2RhdGEtaGFzLWJvb2ttYXJrJywgJzAnKVxuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgICAgICAuZmFpbChmdW5jdGlvbihyZXNwb25zZSwgc3RhdHVzLCB4aHIpe1xuICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhcIlVuZSBlcnJldXIgZXN0IHN1cnZlbnVlLCBhY3Rpb24gbm9uIGVucmVnaXN0csOpZVwiKTtcbiAgICAgICAgICAgICAgICB9KVxuICAgICAgICB9XG4gICAgfVxufSkiXSwic291cmNlUm9vdCI6IiJ9