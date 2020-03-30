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
      operateAddOrRemoveBookMarkOnArticle();
    });
  });

  function operateAddOrRemoveBookMarkOnArticle() {
    var visitorId = $('#visitorId').val();
    var articleId = $('#articleId').val();
    var hasBookmark = $('#hasBookmark').val();
    var ajaxPath = "bookmark_ajaxAddBookmarkToArticle";
    console.log(visitorId);

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
        var bookmarkSelector = $('.toggle-bookmark-article');

        if (isBookmarkedCurrentStatus === true) {
          $('#hasBookmark').attr('value', '1');
          bookmarkSelector.removeClass('far');
          bookmarkSelector.addClass('fas');
        } else if (isBookmarkedCurrentStatus === false) {
          $('#hasBookmark').attr('value', '0');
          bookmarkSelector.removeClass('fas');
          bookmarkSelector.addClass('far');
        }
      }).fail(function (response, status, xhr) {
        console.log("Une erreur est survenue, action non enregistrée");
      });
    }
  }
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},[["./assets/js/toggleBookMarkArticle.js","runtime","vendors~app~manageArticleComment~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow","vendors~manageArticleComment~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow","manageArticleComment~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvdG9nZ2xlQm9va01hcmtBcnRpY2xlLmpzIl0sIm5hbWVzIjpbInJvdXRlcyIsInJlcXVpcmUiLCJSb3V0aW5nIiwic2V0Um91dGluZ0RhdGEiLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsIm9uIiwib3BlcmF0ZUFkZE9yUmVtb3ZlQm9va01hcmtPbkFydGljbGUiLCJ2aXNpdG9ySWQiLCJ2YWwiLCJhcnRpY2xlSWQiLCJoYXNCb29rbWFyayIsImFqYXhQYXRoIiwiY29uc29sZSIsImxvZyIsImFqYXgiLCJ0eXBlIiwiYXN5bmMiLCJkYXRhIiwidXJsIiwiZ2VuZXJhdGUiLCJpZEFydGljbGUiLCJkb25lIiwicmVzcG9uc2UiLCJpc0Jvb2ttYXJrZWRDdXJyZW50U3RhdHVzIiwiYm9va21hcmtTZWxlY3RvciIsImF0dHIiLCJyZW1vdmVDbGFzcyIsImFkZENsYXNzIiwiZmFpbCIsInN0YXR1cyIsInhociJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7OztBQUFBO0FBQUE7QUFBQTtBQUFBLElBQU1BLE1BQU0sR0FBR0MsbUJBQU8sQ0FBQywwRUFBRCxDQUF0Qjs7QUFDQTtBQUVBQyxrSEFBTyxDQUFDQyxjQUFSLENBQXVCSCxNQUF2QjtBQUVBSSxDQUFDLENBQUMsWUFBWTtBQUNWQSxHQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQVc7QUFDekJGLEtBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlFLEVBQVosQ0FBZSxPQUFmLEVBQXVCLDBCQUF2QixFQUFtRCxZQUFVO0FBQ3pEQyx5Q0FBbUM7QUFDdEMsS0FGRDtBQUdILEdBSkQ7O0FBTUEsV0FBU0EsbUNBQVQsR0FBK0M7QUFDM0MsUUFBSUMsU0FBUyxHQUFHTCxDQUFDLENBQUMsWUFBRCxDQUFELENBQWdCTSxHQUFoQixFQUFoQjtBQUNBLFFBQUlDLFNBQVMsR0FBR1AsQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQk0sR0FBaEIsRUFBaEI7QUFDQSxRQUFJRSxXQUFXLEdBQUdSLENBQUMsQ0FBQyxjQUFELENBQUQsQ0FBa0JNLEdBQWxCLEVBQWxCO0FBQ0EsUUFBSUcsUUFBUSxHQUFHLG1DQUFmO0FBQ0FDLFdBQU8sQ0FBQ0MsR0FBUixDQUFZTixTQUFaOztBQUVBLFFBQUlBLFNBQVMsS0FBSyxFQUFsQixFQUFzQjtBQUNsQkssYUFBTyxDQUFDQyxHQUFSLENBQVkscUNBQVo7QUFDSCxLQUZELE1BSUs7QUFDRCxVQUFJSCxXQUFXLEtBQUssR0FBcEIsRUFBeUI7QUFDckJDLGdCQUFRLEdBQUcsd0NBQVg7QUFDSDs7QUFDREMsYUFBTyxDQUFDQyxHQUFSLENBQVlGLFFBQVo7QUFFQVQsT0FBQyxDQUFDWSxJQUFGLENBQU87QUFDSEMsWUFBSSxFQUFFLE1BREg7QUFFSEMsYUFBSyxFQUFFLElBRko7QUFHSEMsWUFBSSxFQUFFO0FBQUVWLG1CQUFTLEVBQUVBO0FBQWIsU0FISDtBQUlIVyxXQUFHLEVBQUVsQixrSEFBTyxDQUFDbUIsUUFBUixDQUFpQlIsUUFBakIsRUFBMkI7QUFDNUJTLG1CQUFTLEVBQUVYO0FBRGlCLFNBQTNCO0FBSkYsT0FBUCxFQVFLWSxJQVJMLENBUVUsVUFBU0MsUUFBVCxFQUFtQjtBQUNyQixZQUFJQyx5QkFBeUIsR0FBR0QsUUFBUSxDQUFDQyx5QkFBekM7QUFDQSxZQUFJQyxnQkFBZ0IsR0FBR3RCLENBQUMsQ0FBQywwQkFBRCxDQUF4Qjs7QUFDQSxZQUFJcUIseUJBQXlCLEtBQUssSUFBbEMsRUFBd0M7QUFDcENyQixXQUFDLENBQUMsY0FBRCxDQUFELENBQWtCdUIsSUFBbEIsQ0FBdUIsT0FBdkIsRUFBZ0MsR0FBaEM7QUFDQUQsMEJBQWdCLENBQUNFLFdBQWpCLENBQTZCLEtBQTdCO0FBQ0FGLDBCQUFnQixDQUFDRyxRQUFqQixDQUEwQixLQUExQjtBQUNILFNBSkQsTUFLSyxJQUFJSix5QkFBeUIsS0FBSyxLQUFsQyxFQUF5QztBQUMxQ3JCLFdBQUMsQ0FBQyxjQUFELENBQUQsQ0FBa0J1QixJQUFsQixDQUF1QixPQUF2QixFQUFnQyxHQUFoQztBQUNBRCwwQkFBZ0IsQ0FBQ0UsV0FBakIsQ0FBNkIsS0FBN0I7QUFDQUYsMEJBQWdCLENBQUNHLFFBQWpCLENBQTBCLEtBQTFCO0FBQ0g7QUFDSixPQXJCTCxFQXNCS0MsSUF0QkwsQ0FzQlUsVUFBU04sUUFBVCxFQUFtQk8sTUFBbkIsRUFBMkJDLEdBQTNCLEVBQStCO0FBQ2pDbEIsZUFBTyxDQUFDQyxHQUFSLENBQVksaURBQVo7QUFDSCxPQXhCTDtBQXlCSDtBQUNKO0FBQ0osQ0FuREEsQ0FBRCxDIiwiZmlsZSI6InRvZ2dsZUFydGljbGVCb29rbWFyay5qcyIsInNvdXJjZXNDb250ZW50IjpbImNvbnN0IHJvdXRlcyA9IHJlcXVpcmUoJy4uLy4uL3B1YmxpYy9qcy9mb3NfanNfcm91dGVzLmpzb24nKTtcbmltcG9ydCBSb3V0aW5nIGZyb20gJy4uLy4uL3ZlbmRvci9mcmllbmRzb2ZzeW1mb255L2pzcm91dGluZy1idW5kbGUvUmVzb3VyY2VzL3B1YmxpYy9qcy9yb3V0ZXIubWluLmpzJztcblxuUm91dGluZy5zZXRSb3V0aW5nRGF0YShyb3V0ZXMpO1xuXG4kKGZ1bmN0aW9uICgpIHtcbiAgICAkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcbiAgICAgICAgJChkb2N1bWVudCkub24oJ2NsaWNrJywnLnRvZ2dsZS1ib29rbWFyay1hcnRpY2xlJywgZnVuY3Rpb24oKXtcbiAgICAgICAgICAgIG9wZXJhdGVBZGRPclJlbW92ZUJvb2tNYXJrT25BcnRpY2xlKCk7XG4gICAgICAgIH0pXG4gICAgfSk7XG5cbiAgICBmdW5jdGlvbiBvcGVyYXRlQWRkT3JSZW1vdmVCb29rTWFya09uQXJ0aWNsZSgpIHtcbiAgICAgICAgdmFyIHZpc2l0b3JJZCA9ICQoJyN2aXNpdG9ySWQnKS52YWwoKTtcbiAgICAgICAgdmFyIGFydGljbGVJZCA9ICQoJyNhcnRpY2xlSWQnKS52YWwoKTtcbiAgICAgICAgdmFyIGhhc0Jvb2ttYXJrID0gJCgnI2hhc0Jvb2ttYXJrJykudmFsKCk7XG4gICAgICAgIHZhciBhamF4UGF0aCA9IFwiYm9va21hcmtfYWpheEFkZEJvb2ttYXJrVG9BcnRpY2xlXCI7XG4gICAgICAgIGNvbnNvbGUubG9nKHZpc2l0b3JJZClcblxuICAgICAgICBpZiAodmlzaXRvcklkID09PSBcIlwiKSB7XG4gICAgICAgICAgICBjb25zb2xlLmxvZygnbm8gdXNlciBpZC8gY2Fubm90IGJvb2ttYXJrIEFydGljbGUnKTtcbiAgICAgICAgfVxuXG4gICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgaWYgKGhhc0Jvb2ttYXJrID09PSBcIjFcIikge1xuICAgICAgICAgICAgICAgIGFqYXhQYXRoID0gXCJib29rbWFya19hamF4UmVtb3ZlQm9va21hcmtGcm9tQXJ0aWNsZVwiO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgY29uc29sZS5sb2coYWpheFBhdGgpO1xuXG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIHR5cGU6ICdQT1NUJyxcbiAgICAgICAgICAgICAgICBhc3luYzogdHJ1ZSxcbiAgICAgICAgICAgICAgICBkYXRhOiB7IHZpc2l0b3JJZDogdmlzaXRvcklkIH0sXG4gICAgICAgICAgICAgICAgdXJsOiBSb3V0aW5nLmdlbmVyYXRlKGFqYXhQYXRoLCB7XG4gICAgICAgICAgICAgICAgICAgIGlkQXJ0aWNsZTogYXJ0aWNsZUlkXG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgLmRvbmUoZnVuY3Rpb24ocmVzcG9uc2UpIHtcbiAgICAgICAgICAgICAgICAgICAgbGV0IGlzQm9va21hcmtlZEN1cnJlbnRTdGF0dXMgPSByZXNwb25zZS5pc0Jvb2ttYXJrZWRDdXJyZW50U3RhdHVzO1xuICAgICAgICAgICAgICAgICAgICBsZXQgYm9va21hcmtTZWxlY3RvciA9ICQoJy50b2dnbGUtYm9va21hcmstYXJ0aWNsZScpO1xuICAgICAgICAgICAgICAgICAgICBpZiAoaXNCb29rbWFya2VkQ3VycmVudFN0YXR1cyA9PT0gdHJ1ZSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgJCgnI2hhc0Jvb2ttYXJrJykuYXR0cigndmFsdWUnLCAnMScpXG4gICAgICAgICAgICAgICAgICAgICAgICBib29rbWFya1NlbGVjdG9yLnJlbW92ZUNsYXNzKCdmYXInKVxuICAgICAgICAgICAgICAgICAgICAgICAgYm9va21hcmtTZWxlY3Rvci5hZGRDbGFzcygnZmFzJylcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICBlbHNlIGlmIChpc0Jvb2ttYXJrZWRDdXJyZW50U3RhdHVzID09PSBmYWxzZSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgJCgnI2hhc0Jvb2ttYXJrJykuYXR0cigndmFsdWUnLCAnMCcpXG4gICAgICAgICAgICAgICAgICAgICAgICBib29rbWFya1NlbGVjdG9yLnJlbW92ZUNsYXNzKCdmYXMnKVxuICAgICAgICAgICAgICAgICAgICAgICAgYm9va21hcmtTZWxlY3Rvci5hZGRDbGFzcygnZmFyJylcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgLmZhaWwoZnVuY3Rpb24ocmVzcG9uc2UsIHN0YXR1cywgeGhyKXtcbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coXCJVbmUgZXJyZXVyIGVzdCBzdXJ2ZW51ZSwgYWN0aW9uIG5vbiBlbnJlZ2lzdHLDqWVcIik7XG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgfVxuICAgIH1cbn0pIl0sInNvdXJjZVJvb3QiOiIifQ==