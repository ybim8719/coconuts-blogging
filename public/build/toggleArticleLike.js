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
      operateAddOrRemoveLikeOnArticle($(this).data('article-id'), $(this).attr('data-has-liked'));
    });
  });

  function operateAddOrRemoveLikeOnArticle(articleId, hasLiked) {
    console.log("article id : " + articleId);
    console.log("has liked is : " + hasLiked);
    console.log(_typeof(hasLiked));
    var visitorId = $('#visitorId').val(); //var articleId = $('#articleId').val();
    //var hasLiked = $('#hasLiked').val();

    var ajaxPath = "userLike_ajaxAddLikeToArticle";
    console.log(visitorId);

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

},[["./assets/js/toggleArticleLike.js","runtime","vendors~app~manageArticleComment~manageExpandCollapse~manageTabs~toggleArticleBookmark~toggleArticle~fe478918","vendors~manageArticleComment~manageExpandCollapse~manageTabs~toggleArticleBookmark~toggleArticleLike~664ffc85","manageArticleComment~manageExpandCollapse~manageTabs~toggleArticleBookmark~toggleArticleLike~toggleW~990338c0"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvdG9nZ2xlQXJ0aWNsZUxpa2UuanMiXSwibmFtZXMiOlsicm91dGVzIiwicmVxdWlyZSIsIlJvdXRpbmciLCJzZXRSb3V0aW5nRGF0YSIsIiQiLCJkb2N1bWVudCIsInJlYWR5Iiwib24iLCJjb25zb2xlIiwibG9nIiwiYXR0ciIsIm9wZXJhdGVBZGRPclJlbW92ZUxpa2VPbkFydGljbGUiLCJkYXRhIiwiYXJ0aWNsZUlkIiwiaGFzTGlrZWQiLCJ2aXNpdG9ySWQiLCJ2YWwiLCJhamF4UGF0aCIsImFqYXgiLCJ0eXBlIiwiYXN5bmMiLCJ1cmwiLCJnZW5lcmF0ZSIsImlkQXJ0aWNsZSIsImRvbmUiLCJyZXNwb25zZSIsImN1cnJlbnROYk9mTGlrZXMiLCJoYXNMaWtlZEN1cnJlbnRTdGF0dXMiLCJtb2RpZmllZEFydGljbGVJZCIsImhlYXJ0U2VsZWN0b3IiLCJ0ZXh0IiwicmVtb3ZlQ2xhc3MiLCJhZGRDbGFzcyIsIm1lc3NhZ2UiLCJmYWlsIiwic3RhdHVzIiwieGhyIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUEsSUFBTUEsTUFBTSxHQUFHQyxtQkFBTyxDQUFDLDBFQUFELENBQXRCOztBQUNBO0FBRUFDLGtIQUFPLENBQUNDLGNBQVIsQ0FBdUJILE1BQXZCO0FBRUFJLENBQUMsQ0FBQyxZQUFZO0FBQ1ZBLEdBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVztBQUN6QkYsS0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUUsRUFBWixDQUFlLE9BQWYsRUFBdUIsc0JBQXZCLEVBQStDLFlBQVU7QUFDckRDLGFBQU8sQ0FBQ0MsR0FBUixDQUFZTCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFNLElBQVIsQ0FBYSxnQkFBYixDQUFaO0FBQ0FDLHFDQUErQixDQUFDUCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFRLElBQVIsQ0FBYSxZQUFiLENB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QUFELEMiLCJmaWxlIjoidG9nZ2xlQXJ0aWNsZUxpa2UuanMiLCJzb3VyY2VzQ29udGVudCI6WyJjb25zdCByb3V0ZXMgPSByZXF1aXJlKCcuLi8uLi9wdWJsaWMvanMvZm9zX2pzX3JvdXRlcy5qc29uJyk7XG5pbXBvcnQgUm91dGluZyBmcm9tICcuLi8uLi92ZW5kb3IvZnJpZW5kc29mc3ltZm9ueS9qc3JvdXRpbmctYnVuZGxlL1Jlc291cmNlcy9wdWJsaWMvanMvcm91dGVyLm1pbi5qcyc7XG5cblJvdXRpbmcuc2V0Um91dGluZ0RhdGEocm91dGVzKTtcblxuJChmdW5jdGlvbiAoKSB7XG4gICAgJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XG4gICAgICAgICQoZG9jdW1lbnQpLm9uKCdjbGljaycsJy50b2dnbGUtbGlrZS1hcnRpY2xlJywgZnVuY3Rpb24oKXtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCQodGhpcykuYXR0cignZGF0YS1oYXMtbGlrZWQnKSk7XG4gICAgICAgICAgICBvcGVyYXRlQWRkT3JSZW1vdmVMaWtlT25BcnRpY2xlKCQodGhpcykuZGF0YSgnYXJ0aWNsZS1pZCcpLCAkKHRoaXMpLmF0dHIoJ2RhdGEtaGFzLWxpa2VkJykpO1xuICAgICAgICB9KVxuICAgIH0pO1xuXG4gICAgZnVuY3Rpb24gb3BlcmF0ZUFkZE9yUmVtb3ZlTGlrZU9uQXJ0aWNsZShhcnRpY2xlSWQsIGhhc0xpa2VkKSB7XG4gICAgICAgIGNvbnNvbGUubG9nKFwiYXJ0aWNsZSBpZCA6IFwiICsgYXJ0aWNsZUlkICk7XG4gICAgICAgIGNvbnNvbGUubG9nKFwiaGFzIGxpa2VkIGlzIDogXCIgKyBoYXNMaWtlZCApO1xuICAgICAgICBjb25zb2xlLmxvZyh0eXBlb2YgaGFzTGlrZWQpO1xuXG4gICAgICAgIHZhciB2aXNpdG9ySWQgPSAkKCcjdmlzaXRvcklkJykudmFsKCk7XG4gICAgICAgIC8vdmFyIGFydGljbGVJZCA9ICQoJyNhcnRpY2xlSWQnKS52YWwoKTtcbiAgICAgICAgLy92YXIgaGFzTGlrZWQgPSAkKCcjaGFzTGlrZWQnKS52YWwoKTtcbiAgICAgICAgdmFyIGFqYXhQYXRoID0gXCJ1c2VyTGlrZV9hamF4QWRkTGlrZVRvQXJ0aWNsZVwiO1xuICAgICAgICBjb25zb2xlLmxvZyh2aXNpdG9ySWQpXG5cbiAgICAgICAgaWYgKHZpc2l0b3JJZCA9PT0gXCJcIikge1xuICAgICAgICAgICAgY29uc29sZS5sb2coJ25vIHVzZXIgaWQvIGNhbm5vdCBsaWtlIEFydGljbGUnKTtcbiAgICAgICAgfVxuXG4gICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgaWYgKGhhc0xpa2VkID09PSBcInRydWVcIikge1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCdjaGFuZ2VkIGZvciByZW1vdmUgbGlrZScpXG4gICAgICAgICAgICAgICAgYWpheFBhdGggPSBcInVzZXJMaWtlX2FqYXhSZW1vdmVMaWtlT2ZBcnRpY2xlXCI7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBjb25zb2xlLmxvZyhhamF4UGF0aCk7XG5cbiAgICAgICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICAgICAgdHlwZTogJ1BPU1QnLFxuICAgICAgICAgICAgICAgIGFzeW5jOiB0cnVlLFxuICAgICAgICAgICAgICAgIGRhdGE6IHsgdmlzaXRvcklkOiB2aXNpdG9ySWQgfSxcbiAgICAgICAgICAgICAgICB1cmw6IFJvdXRpbmcuZ2VuZXJhdGUoYWpheFBhdGgsIHtcbiAgICAgICAgICAgICAgICAgICAgaWRBcnRpY2xlOiBhcnRpY2xlSWRcbiAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgfSlcbiAgICAgICAgICAgICAgICAuZG9uZShmdW5jdGlvbihyZXNwb25zZSkge1xuICAgICAgICAgICAgICAgICAgICBsZXQgY3VycmVudE5iT2ZMaWtlcyA9IHJlc3BvbnNlLmN1cnJlbnROYk9mTGlrZXM7XG4gICAgICAgICAgICAgICAgICAgIGxldCBoYXNMaWtlZEN1cnJlbnRTdGF0dXMgPSByZXNwb25zZS5oYXNMaWtlZEN1cnJlbnRTdGF0dXM7XG4gICAgICAgICAgICAgICAgICAgIGxldCBtb2RpZmllZEFydGljbGVJZCA9IHJlc3BvbnNlLm1vZGlmaWVkQXJ0aWNsZUlkO1xuICAgICAgICAgICAgICAgICAgICBsZXQgaGVhcnRTZWxlY3RvciA9ICQoJy50b2dnbGUtbGlrZS1hcnRpY2xlW2RhdGEtYXJ0aWNsZS1pZD0nICsgbW9kaWZpZWRBcnRpY2xlSWQgKyAnXScpO1xuICAgICAgICAgICAgICAgICAgICBpZiAoY3VycmVudE5iT2ZMaWtlcyAhPT0gbnVsbCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgJCgnLmR5bmFtaWMtbGlrZXMtY291bnRlci1vZi1hcnRpY2xlW2RhdGEtYXJ0aWNsZS1pZD0nICsgbW9kaWZpZWRBcnRpY2xlSWQgKyAnXScpLnRleHQoY3VycmVudE5iT2ZMaWtlcyk7XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coaGVhcnRTZWxlY3Rvcik7XG4gICAgICAgICAgICAgICAgICAgIGlmIChoYXNMaWtlZEN1cnJlbnRTdGF0dXMgPT09IHRydWUpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vJCgnI2hhc0xpa2VkJykuYXR0cigndmFsdWUnLCAnMScpXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhcIm91dHB1dCBpcyB0cnVlXCIpXG4gICAgICAgICAgICAgICAgICAgICAgICBoZWFydFNlbGVjdG9yLnJlbW92ZUNsYXNzKCdmYXInKVxuICAgICAgICAgICAgICAgICAgICAgICAgaGVhcnRTZWxlY3Rvci5hZGRDbGFzcygnZmFzJylcbiAgICAgICAgICAgICAgICAgICAgICAgIGhlYXJ0U2VsZWN0b3IuYXR0cignZGF0YS1oYXMtbGlrZWQnLCAndHJ1ZScpXG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgZWxzZSBpZiAoaGFzTGlrZWRDdXJyZW50U3RhdHVzID09PSBmYWxzZSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coXCJvdXRwdXQgaXMgZmFsc2VcIilcblxuICAgICAgICAgICAgICAgICAgICAgICAgLy8kKCcjaGFzTGlrZWQnKS5hdHRyKCd2YWx1ZScsICcwJylcbiAgICAgICAgICAgICAgICAgICAgICAgIGhlYXJ0U2VsZWN0b3IuYWRkQ2xhc3MoJ2ZhcicpXG4gICAgICAgICAgICAgICAgICAgICAgICBoZWFydFNlbGVjdG9yLnJlbW92ZUNsYXNzKCdmYXMnKVxuICAgICAgICAgICAgICAgICAgICAgICAgaGVhcnRTZWxlY3Rvci5hdHRyKCdkYXRhLWhhcy1saWtlZCcsICdmYWxzZScpXG5cbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhyZXNwb25zZS5tZXNzYWdlKTtcbiAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgIC5mYWlsKGZ1bmN0aW9uKHJlc3BvbnNlLCBzdGF0dXMsIHhocil7XG4gICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKFwiVW5lIGVycmV1ciBlc3Qgc3VydmVudWUsIGFjdGlvbiBub24gZW5yZWdpc3Ryw6llXCIpO1xuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgIH1cbiAgICB9XG59KSJdLCJzb3VyY2VSb290IjoiIn0=