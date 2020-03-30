(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["toggleArticleLike"],{

/***/ "./assets/js/toggleArticleLike.js":
/*!****************************************!*\
  !*** ./assets/js/toggleArticleLike.js ***!
  \****************************************/
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
    $(document).on('click', '.toggle-like-article', function () {
      operateAddOrRemoveLikeOnArticle();
    });
  });

  function operateAddOrRemoveLikeOnArticle() {
    var visitorId = $('#visitorId').val();
    var articleId = $('#articleId').val();
    var hasLiked = $('#hasLiked').val();
    var ajaxPath = "userLike_ajaxAddLikeToArticle";
    console.log(visitorId);

    if (visitorId === "") {
      console.log('no user id/ cannot like Article');
    } else {
      if (hasLiked === "1") {
        ajaxPath = "userLike_ajaxRemoveLikeOfArticle";
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
        var currentNbOfLikes = response.currentNbOfLikes;
        var hasLikedCurrentStatus = response.hasLikedCurrentStatus;

        if (currentNbOfLikes !== null) {
          $('.dynamic-likes-counter-of-article').text(currentNbOfLikes);
        }

        if (hasLikedCurrentStatus === true) {
          $('#hasLiked').attr('value', '1');
        } else if (hasLikedCurrentStatus === false) {
          $('#hasLiked').attr('value', '0');
        }

        console.log(response.message);
      }).fail(function (response, status, xhr) {
        console.log("Une erreur est survenue, action non enregistrée");
      });
    }
  }
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},[["./assets/js/toggleArticleLike.js","runtime","vendors~app~manageArticleComment~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow","vendors~manageArticleComment~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow","manageArticleComment~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvdG9nZ2xlQXJ0aWNsZUxpa2UuanMiXSwibmFtZXMiOlsicm91dGVzIiwicmVxdWlyZSIsIlJvdXRpbmciLCJzZXRSb3V0aW5nRGF0YSIsIiQiLCJkb2N1bWVudCIsInJlYWR5Iiwib24iLCJvcGVyYXRlQWRkT3JSZW1vdmVMaWtlT25BcnRpY2xlIiwidmlzaXRvcklkIiwidmFsIiwiYXJ0aWNsZUlkIiwiaGFzTGlrZWQiLCJhamF4UGF0aCIsImNvbnNvbGUiLCJsb2ciLCJhamF4IiwidHlwZSIsImFzeW5jIiwiZGF0YSIsInVybCIsImdlbmVyYXRlIiwiaWRBcnRpY2xlIiwiZG9uZSIsInJlc3BvbnNlIiwiY3VycmVudE5iT2ZMaWtlcyIsImhhc0xpa2VkQ3VycmVudFN0YXR1cyIsInRleHQiLCJhdHRyIiwibWVzc2FnZSIsImZhaWwiLCJzdGF0dXMiLCJ4aHIiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7QUFBQTtBQUFBO0FBQUE7QUFBQSxJQUFNQSxNQUFNLEdBQUdDLG1CQUFPLENBQUMsMEVBQUQsQ0FBdEI7O0FBQ0E7QUFFQUMsa0hBQU8sQ0FBQ0MsY0FBUixDQUF1QkgsTUFBdkI7QUFFQUksQ0FBQyxDQUFDLFlBQVk7QUFDVkEsR0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFXO0FBQ3pCRixLQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZRSxFQUFaLENBQWUsT0FBZixFQUF1QixzQkFBdkIsRUFBK0MsWUFBVTtBQUNyREMscUNBQStCO0FBQ2xDLEtBRkQ7QUFHSCxHQUpEOztBQU1BLFdBQVNBLCtCQUFULEdBQTJDO0FBQ3ZDLFFBQUlDLFNBQVMsR0FBR0wsQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQk0sR0FBaEIsRUFBaEI7QUFDQSxRQUFJQyxTQUFTLEdBQUdQLENBQUMsQ0FBQyxZQUFELENBQUQsQ0FBZ0JNLEdBQWhCLEVBQWhCO0FBQ0EsUUFBSUUsUUFBUSxHQUFHUixDQUFDLENBQUMsV0FBRCxDQUFELENBQWVNLEdBQWYsRUFBZjtBQUNBLFFBQUlHLFFBQVEsR0FBRywrQkFBZjtBQUNBQyxXQUFPLENBQUNDLEdBQVIsQ0FBWU4sU0FBWjs7QUFFQSxRQUFJQSxTQUFTLEtBQUssRUFBbEIsRUFBc0I7QUFDbEJLLGFBQU8sQ0FBQ0MsR0FBUixDQUFZLGlDQUFaO0FBQ0gsS0FGRCxNQUlLO0FBQ0QsVUFBSUgsUUFBUSxLQUFLLEdBQWpCLEVBQXNCO0FBQ2xCQyxnQkFBUSxHQUFHLGtDQUFYO0FBQ0g7O0FBQ0RDLGFBQU8sQ0FBQ0MsR0FBUixDQUFZRixRQUFaO0FBRUFULE9BQUMsQ0FBQ1ksSUFBRixDQUFPO0FBQ0hDLFlBQUksRUFBRSxNQURIO0FBRUhDLGFBQUssRUFBRSxJQUZKO0FBR0hDLFlBQUksRUFBRTtBQUFFVixtQkFBUyxFQUFFQTtBQUFiLFNBSEg7QUFJSFcsV0FBRyxFQUFFbEIsa0hBQU8sQ0FBQ21CLFFBQVIsQ0FBaUJSLFFBQWpCLEVBQTJCO0FBQzVCUyxtQkFBUyxFQUFFWDtBQURpQixTQUEzQjtBQUpGLE9BQVAsRUFRS1ksSUFSTCxDQVFVLFVBQVNDLFFBQVQsRUFBbUI7QUFDckIsWUFBSUMsZ0JBQWdCLEdBQUdELFFBQVEsQ0FBQ0MsZ0JBQWhDO0FBQ0EsWUFBSUMscUJBQXFCLEdBQUdGLFFBQVEsQ0FBQ0UscUJBQXJDOztBQUNBLFlBQUlELGdCQUFnQixLQUFLLElBQXpCLEVBQStCO0FBQzNCckIsV0FBQyxDQUFDLG1DQUFELENBQUQsQ0FBdUN1QixJQUF2QyxDQUE0Q0YsZ0JBQTVDO0FBQ0g7O0FBQ0QsWUFBSUMscUJBQXFCLEtBQUssSUFBOUIsRUFBb0M7QUFDaEN0QixXQUFDLENBQUMsV0FBRCxDQUFELENBQWV3QixJQUFmLENBQW9CLE9BQXBCLEVBQTZCLEdBQTdCO0FBQ0gsU0FGRCxNQUdLLElBQUlGLHFCQUFxQixLQUFLLEtBQTlCLEVBQXFDO0FBQ3RDdEIsV0FBQyxDQUFDLFdBQUQsQ0FBRCxDQUFld0IsSUFBZixDQUFvQixPQUFwQixFQUE2QixHQUE3QjtBQUNIOztBQUNEZCxlQUFPLENBQUNDLEdBQVIsQ0FBWVMsUUFBUSxDQUFDSyxPQUFyQjtBQUNILE9BckJMLEVBc0JLQyxJQXRCTCxDQXNCVSxVQUFTTixRQUFULEVBQW1CTyxNQUFuQixFQUEyQkMsR0FBM0IsRUFBK0I7QUFDakNsQixlQUFPLENBQUNDLEdBQVIsQ0FBWSxpREFBWjtBQUNILE9BeEJMO0FBeUJIO0FBQ0o7QUFDSixDQW5EQSxDQUFELEMiLCJmaWxlIjoidG9nZ2xlQXJ0aWNsZUxpa2UuanMiLCJzb3VyY2VzQ29udGVudCI6WyJjb25zdCByb3V0ZXMgPSByZXF1aXJlKCcuLi8uLi9wdWJsaWMvanMvZm9zX2pzX3JvdXRlcy5qc29uJyk7XG5pbXBvcnQgUm91dGluZyBmcm9tICcuLi8uLi92ZW5kb3IvZnJpZW5kc29mc3ltZm9ueS9qc3JvdXRpbmctYnVuZGxlL1Jlc291cmNlcy9wdWJsaWMvanMvcm91dGVyLm1pbi5qcyc7XG5cblJvdXRpbmcuc2V0Um91dGluZ0RhdGEocm91dGVzKTtcblxuJChmdW5jdGlvbiAoKSB7XG4gICAgJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XG4gICAgICAgICQoZG9jdW1lbnQpLm9uKCdjbGljaycsJy50b2dnbGUtbGlrZS1hcnRpY2xlJywgZnVuY3Rpb24oKXtcbiAgICAgICAgICAgIG9wZXJhdGVBZGRPclJlbW92ZUxpa2VPbkFydGljbGUoKTtcbiAgICAgICAgfSlcbiAgICB9KTtcblxuICAgIGZ1bmN0aW9uIG9wZXJhdGVBZGRPclJlbW92ZUxpa2VPbkFydGljbGUoKSB7XG4gICAgICAgIHZhciB2aXNpdG9ySWQgPSAkKCcjdmlzaXRvcklkJykudmFsKCk7XG4gICAgICAgIHZhciBhcnRpY2xlSWQgPSAkKCcjYXJ0aWNsZUlkJykudmFsKCk7XG4gICAgICAgIHZhciBoYXNMaWtlZCA9ICQoJyNoYXNMaWtlZCcpLnZhbCgpO1xuICAgICAgICB2YXIgYWpheFBhdGggPSBcInVzZXJMaWtlX2FqYXhBZGRMaWtlVG9BcnRpY2xlXCI7XG4gICAgICAgIGNvbnNvbGUubG9nKHZpc2l0b3JJZClcblxuICAgICAgICBpZiAodmlzaXRvcklkID09PSBcIlwiKSB7XG4gICAgICAgICAgICBjb25zb2xlLmxvZygnbm8gdXNlciBpZC8gY2Fubm90IGxpa2UgQXJ0aWNsZScpO1xuICAgICAgICB9XG5cbiAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICBpZiAoaGFzTGlrZWQgPT09IFwiMVwiKSB7XG4gICAgICAgICAgICAgICAgYWpheFBhdGggPSBcInVzZXJMaWtlX2FqYXhSZW1vdmVMaWtlT2ZBcnRpY2xlXCI7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBjb25zb2xlLmxvZyhhamF4UGF0aCk7XG5cbiAgICAgICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICAgICAgdHlwZTogJ1BPU1QnLFxuICAgICAgICAgICAgICAgIGFzeW5jOiB0cnVlLFxuICAgICAgICAgICAgICAgIGRhdGE6IHsgdmlzaXRvcklkOiB2aXNpdG9ySWQgfSxcbiAgICAgICAgICAgICAgICB1cmw6IFJvdXRpbmcuZ2VuZXJhdGUoYWpheFBhdGgsIHtcbiAgICAgICAgICAgICAgICAgICAgaWRBcnRpY2xlOiBhcnRpY2xlSWRcbiAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgfSlcbiAgICAgICAgICAgICAgICAuZG9uZShmdW5jdGlvbihyZXNwb25zZSkge1xuICAgICAgICAgICAgICAgICAgICBsZXQgY3VycmVudE5iT2ZMaWtlcyA9IHJlc3BvbnNlLmN1cnJlbnROYk9mTGlrZXM7XG4gICAgICAgICAgICAgICAgICAgIGxldCBoYXNMaWtlZEN1cnJlbnRTdGF0dXMgPSByZXNwb25zZS5oYXNMaWtlZEN1cnJlbnRTdGF0dXM7XG4gICAgICAgICAgICAgICAgICAgIGlmIChjdXJyZW50TmJPZkxpa2VzICE9PSBudWxsKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAkKCcuZHluYW1pYy1saWtlcy1jb3VudGVyLW9mLWFydGljbGUnKS50ZXh0KGN1cnJlbnROYk9mTGlrZXMpO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIGlmIChoYXNMaWtlZEN1cnJlbnRTdGF0dXMgPT09IHRydWUpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICQoJyNoYXNMaWtlZCcpLmF0dHIoJ3ZhbHVlJywgJzEnKVxuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIGVsc2UgaWYgKGhhc0xpa2VkQ3VycmVudFN0YXR1cyA9PT0gZmFsc2UpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICQoJyNoYXNMaWtlZCcpLmF0dHIoJ3ZhbHVlJywgJzAnKVxuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlc3BvbnNlLm1lc3NhZ2UpO1xuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgLmZhaWwoZnVuY3Rpb24ocmVzcG9uc2UsIHN0YXR1cywgeGhyKXtcbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coXCJVbmUgZXJyZXVyIGVzdCBzdXJ2ZW51ZSwgYWN0aW9uIG5vbiBlbnJlZ2lzdHLDqWVcIik7XG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgfVxuICAgIH1cbn0pIl0sInNvdXJjZVJvb3QiOiIifQ==