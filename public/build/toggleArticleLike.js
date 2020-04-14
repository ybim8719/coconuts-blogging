(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["toggleArticleLike"],{

/***/ "./assets/js/toggleArticleLike.js":
/*!****************************************!*\
  !*** ./assets/js/toggleArticleLike.js ***!
  \****************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var core_js_modules_es_symbol__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.symbol */ "./node_modules/core-js/modules/es.symbol.js");
/* harmony import */ var core_js_modules_es_symbol__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_symbol_description__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.symbol.description */ "./node_modules/core-js/modules/es.symbol.description.js");
/* harmony import */ var core_js_modules_es_symbol_description__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_description__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_symbol_iterator__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.symbol.iterator */ "./node_modules/core-js/modules/es.symbol.iterator.js");
/* harmony import */ var core_js_modules_es_symbol_iterator__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_iterator__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_array_iterator__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.array.iterator */ "./node_modules/core-js/modules/es.array.iterator.js");
/* harmony import */ var core_js_modules_es_array_iterator__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_iterator__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_object_to_string__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.object.to-string */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_string_iterator__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.string.iterator */ "./node_modules/core-js/modules/es.string.iterator.js");
/* harmony import */ var core_js_modules_es_string_iterator__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_iterator__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_web_dom_collections_iterator__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/web.dom-collections.iterator */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
/* harmony import */ var core_js_modules_web_dom_collections_iterator__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_iterator__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js */ "./vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js");
/* harmony import */ var _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_7__);








function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

var routes = __webpack_require__(/*! ../../public/js/fos_js_routes.json */ "./public/js/fos_js_routes.json");


_vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_7___default.a.setRoutingData(routes);
$(function () {
  $(document).ready(function () {
    $(document).on('click', '.toggle-like-article', function () {
      console.log($(this).attr('data-has-liked'));
      operateAddOrRemoveLikeOnArticle($(this).attr('data-article-id'), $(this).attr('data-has-liked'));
    });
  });

  function operateAddOrRemoveLikeOnArticle(articleId, hasLiked) {
    console.log("article id : " + articleId);
    console.log("has liked is : " + hasLiked);
    console.log(_typeof(hasLiked));
    var visitorId = $('#visitorId').val(); //var articleId = $('#articleId').val();
    //var hasLiked = $('#hasLiked').val();

    var ajaxPath = "userLike_ajaxAddLikeToArticle";
    console.log('visitor id is ' + visitorId);

    if (visitorId === "") {
      console.log('no user id/ cannot like Article');
    } else {
      if (hasLiked === "true") {
        console.log('changed for remove like');
        ajaxPath = "userLike_ajaxRemoveLikeOfArticle";
      }

      console.log(ajaxPath);
      $.ajax({
        type: 'POST',
        async: true,
        data: {
          visitorId: visitorId
        },
        url: _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_7___default.a.generate(ajaxPath, {
          idArticle: articleId
        })
      }).done(function (response) {
        var currentNbOfLikes = response.currentNbOfLikes;
        var hasLikedCurrentStatus = response.hasLikedCurrentStatus;
        var modifiedArticleId = response.modifiedArticleId;
        var heartSelector = $('.toggle-like-article[data-article-id=' + modifiedArticleId + ']');

        if (currentNbOfLikes !== null) {
          $('.dynamic-likes-counter-of-article[data-article-id=' + modifiedArticleId + ']').text(currentNbOfLikes);
        }

        console.log(heartSelector);

        if (hasLikedCurrentStatus === true) {
          //$('#hasLiked').attr('value', '1')
          console.log("output is true");
          heartSelector.removeClass('far');
          heartSelector.addClass('fas');
          heartSelector.attr('data-has-liked', 'true');
        } else if (hasLikedCurrentStatus === false) {
          console.log("output is false"); //$('#hasLiked').attr('value', '0')

          heartSelector.addClass('far');
          heartSelector.removeClass('fas');
          heartSelector.attr('data-has-liked', 'false');
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

},[["./assets/js/toggleArticleLike.js","runtime","vendors~app~manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageTabs~toggleArti~5918ea3b","vendors~manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageTabs~toggleArticleB~e68393d8","manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageTabs~toggleArticleBookmark~~638521e2"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvdG9nZ2xlQXJ0aWNsZUxpa2UuanMiXSwibmFtZXMiOlsicm91dGVzIiwicmVxdWlyZSIsIlJvdXRpbmciLCJzZXRSb3V0aW5nRGF0YSIsIiQiLCJkb2N1bWVudCIsInJlYWR5Iiwib24iLCJjb25zb2xlIiwibG9nIiwiYXR0ciIsIm9wZXJhdGVBZGRPclJlbW92ZUxpa2VPbkFydGljbGUiLCJhcnRpY2xlSWQiLCJoYXNMaWtlZCIsInZpc2l0b3JJZCIsInZhbCIsImFqYXhQYXRoIiwiYWpheCIsInR5cGUiLCJhc3luYyIsImRhdGEiLCJ1cmwiLCJnZW5lcmF0ZSIsImlkQXJ0aWNsZSIsImRvbmUiLCJyZXNwb25zZSIsImN1cnJlbnROYk9mTGlrZXMiLCJoYXNMaWtlZEN1cnJlbnRTdGF0dXMiLCJtb2RpZmllZEFydGljbGVJZCIsImhlYXJ0U2VsZWN0b3IiLCJ0ZXh0IiwicmVtb3ZlQ2xhc3MiLCJhZGRDbGFzcyIsIm1lc3NhZ2UiLCJmYWlsIiwic3RhdHVzIiwieGhyIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUEsSUFBTUEsTUFBTSxHQUFHQyxtQkFBTyxDQUFDLDBFQUFELENBQXRCOztBQUNBO0FBRUFDLGtIQUFPLENBQUNDLGNBQVIsQ0FBdUJILE1BQXZCO0FBRUFJLENBQUMsQ0FBQyxZQUFZO0FBQ1ZBLEdBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVztBQUN6QkYsS0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUUsRUFBWixDQUFlLE9BQWYsRUFBdUIsc0JBQXZCLEVBQStDLFlBQVU7QUFDckRDLGFBQU8sQ0FBQ0MsR0FBUixDQUFZTCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFNLElBQVIsQ0FBYSxnQkFBYixDQUFaO0FBQ0FDLHFDQUErQixDQUFDUCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFNLElBQVIsQ0FBYSxpQkFBYixD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SixDQXRFQSxDQUFELEMiLCJmaWxlIjoidG9nZ2xlQXJ0aWNsZUxpa2UuanMiLCJzb3VyY2VzQ29udGVudCI6WyJjb25zdCByb3V0ZXMgPSByZXF1aXJlKCcuLi8uLi9wdWJsaWMvanMvZm9zX2pzX3JvdXRlcy5qc29uJyk7XG5pbXBvcnQgUm91dGluZyBmcm9tICcuLi8uLi92ZW5kb3IvZnJpZW5kc29mc3ltZm9ueS9qc3JvdXRpbmctYnVuZGxlL1Jlc291cmNlcy9wdWJsaWMvanMvcm91dGVyLm1pbi5qcyc7XG5cblJvdXRpbmcuc2V0Um91dGluZ0RhdGEocm91dGVzKTtcblxuJChmdW5jdGlvbiAoKSB7XG4gICAgJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XG4gICAgICAgICQoZG9jdW1lbnQpLm9uKCdjbGljaycsJy50b2dnbGUtbGlrZS1hcnRpY2xlJywgZnVuY3Rpb24oKXtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCQodGhpcykuYXR0cignZGF0YS1oYXMtbGlrZWQnKSk7XG4gICAgICAgICAgICBvcGVyYXRlQWRkT3JSZW1vdmVMaWtlT25BcnRpY2xlKCQodGhpcykuYXR0cignZGF0YS1hcnRpY2xlLWlkJyksICQodGhpcykuYXR0cignZGF0YS1oYXMtbGlrZWQnKSk7XG4gICAgICAgIH0pXG4gICAgfSk7XG5cbiAgICBmdW5jdGlvbiBvcGVyYXRlQWRkT3JSZW1vdmVMaWtlT25BcnRpY2xlKGFydGljbGVJZCwgaGFzTGlrZWQpIHtcbiAgICAgICAgY29uc29sZS5sb2coXCJhcnRpY2xlIGlkIDogXCIgKyBhcnRpY2xlSWQgKTtcbiAgICAgICAgY29uc29sZS5sb2coXCJoYXMgbGlrZWQgaXMgOiBcIiArIGhhc0xpa2VkICk7XG4gICAgICAgIGNvbnNvbGUubG9nKHR5cGVvZiBoYXNMaWtlZCk7XG5cbiAgICAgICAgdmFyIHZpc2l0b3JJZCA9ICQoJyN2aXNpdG9ySWQnKS52YWwoKTtcbiAgICAgICAgLy92YXIgYXJ0aWNsZUlkID0gJCgnI2FydGljbGVJZCcpLnZhbCgpO1xuICAgICAgICAvL3ZhciBoYXNMaWtlZCA9ICQoJyNoYXNMaWtlZCcpLnZhbCgpO1xuICAgICAgICB2YXIgYWpheFBhdGggPSBcInVzZXJMaWtlX2FqYXhBZGRMaWtlVG9BcnRpY2xlXCI7XG4gICAgICAgIGNvbnNvbGUubG9nKCd2aXNpdG9yIGlkIGlzICcgK3Zpc2l0b3JJZClcblxuICAgICAgICBpZiAodmlzaXRvcklkID09PSBcIlwiKSB7XG4gICAgICAgICAgICBjb25zb2xlLmxvZygnbm8gdXNlciBpZC8gY2Fubm90IGxpa2UgQXJ0aWNsZScpO1xuICAgICAgICB9XG5cbiAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICBpZiAoaGFzTGlrZWQgPT09IFwidHJ1ZVwiKSB7XG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coJ2NoYW5nZWQgZm9yIHJlbW92ZSBsaWtlJylcbiAgICAgICAgICAgICAgICBhamF4UGF0aCA9IFwidXNlckxpa2VfYWpheFJlbW92ZUxpa2VPZkFydGljbGVcIjtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGNvbnNvbGUubG9nKGFqYXhQYXRoKTtcblxuICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICB0eXBlOiAnUE9TVCcsXG4gICAgICAgICAgICAgICAgYXN5bmM6IHRydWUsXG4gICAgICAgICAgICAgICAgZGF0YTogeyB2aXNpdG9ySWQ6IHZpc2l0b3JJZCB9LFxuICAgICAgICAgICAgICAgIHVybDogUm91dGluZy5nZW5lcmF0ZShhamF4UGF0aCwge1xuICAgICAgICAgICAgICAgICAgICBpZEFydGljbGU6IGFydGljbGVJZFxuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgIC5kb25lKGZ1bmN0aW9uKHJlc3BvbnNlKSB7XG4gICAgICAgICAgICAgICAgICAgIGxldCBjdXJyZW50TmJPZkxpa2VzID0gcmVzcG9uc2UuY3VycmVudE5iT2ZMaWtlcztcbiAgICAgICAgICAgICAgICAgICAgbGV0IGhhc0xpa2VkQ3VycmVudFN0YXR1cyA9IHJlc3BvbnNlLmhhc0xpa2VkQ3VycmVudFN0YXR1cztcbiAgICAgICAgICAgICAgICAgICAgbGV0IG1vZGlmaWVkQXJ0aWNsZUlkID0gcmVzcG9uc2UubW9kaWZpZWRBcnRpY2xlSWQ7XG4gICAgICAgICAgICAgICAgICAgIGxldCBoZWFydFNlbGVjdG9yID0gJCgnLnRvZ2dsZS1saWtlLWFydGljbGVbZGF0YS1hcnRpY2xlLWlkPScgKyBtb2RpZmllZEFydGljbGVJZCArICddJyk7XG4gICAgICAgICAgICAgICAgICAgIGlmIChjdXJyZW50TmJPZkxpa2VzICE9PSBudWxsKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAkKCcuZHluYW1pYy1saWtlcy1jb3VudGVyLW9mLWFydGljbGVbZGF0YS1hcnRpY2xlLWlkPScgKyBtb2RpZmllZEFydGljbGVJZCArICddJykudGV4dChjdXJyZW50TmJPZkxpa2VzKTtcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhoZWFydFNlbGVjdG9yKTtcbiAgICAgICAgICAgICAgICAgICAgaWYgKGhhc0xpa2VkQ3VycmVudFN0YXR1cyA9PT0gdHJ1ZSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgLy8kKCcjaGFzTGlrZWQnKS5hdHRyKCd2YWx1ZScsICcxJylcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKFwib3V0cHV0IGlzIHRydWVcIilcbiAgICAgICAgICAgICAgICAgICAgICAgIGhlYXJ0U2VsZWN0b3IucmVtb3ZlQ2xhc3MoJ2ZhcicpXG4gICAgICAgICAgICAgICAgICAgICAgICBoZWFydFNlbGVjdG9yLmFkZENsYXNzKCdmYXMnKVxuICAgICAgICAgICAgICAgICAgICAgICAgaGVhcnRTZWxlY3Rvci5hdHRyKCdkYXRhLWhhcy1saWtlZCcsICd0cnVlJylcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICBlbHNlIGlmIChoYXNMaWtlZEN1cnJlbnRTdGF0dXMgPT09IGZhbHNlKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhcIm91dHB1dCBpcyBmYWxzZVwiKVxuXG4gICAgICAgICAgICAgICAgICAgICAgICAvLyQoJyNoYXNMaWtlZCcpLmF0dHIoJ3ZhbHVlJywgJzAnKVxuICAgICAgICAgICAgICAgICAgICAgICAgaGVhcnRTZWxlY3Rvci5hZGRDbGFzcygnZmFyJylcbiAgICAgICAgICAgICAgICAgICAgICAgIGhlYXJ0U2VsZWN0b3IucmVtb3ZlQ2xhc3MoJ2ZhcycpXG4gICAgICAgICAgICAgICAgICAgICAgICBoZWFydFNlbGVjdG9yLmF0dHIoJ2RhdGEtaGFzLWxpa2VkJywgJ2ZhbHNlJylcblxuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlc3BvbnNlLm1lc3NhZ2UpO1xuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgLmZhaWwoZnVuY3Rpb24ocmVzcG9uc2UsIHN0YXR1cywgeGhyKXtcbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coXCJVbmUgZXJyZXVyIGVzdCBzdXJ2ZW51ZSwgYWN0aW9uIG5vbiBlbnJlZ2lzdHLDqWVcIik7XG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgfVxuICAgIH1cbn0pIl0sInNvdXJjZVJvb3QiOiIifQ==