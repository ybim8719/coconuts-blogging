(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["manageArticleComment"],{

/***/ "./assets/js/manageArticleComment.js":
/*!*******************************************!*\
  !*** ./assets/js/manageArticleComment.js ***!
  \*******************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.find */ "./node_modules/core-js/modules/es.array.find.js");
/* harmony import */ var core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js */ "./vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js");
/* harmony import */ var _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_1__);


var routes = __webpack_require__(/*! ../../public/js/fos_js_routes.json */ "./public/js/fos_js_routes.json");


_vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_1___default.a.setRoutingData(routes);
$(function () {
  $(document).ready(function () {
    $(document).on('click', '#send-comment-action', function () {
      AddArticleComment();
    });
    $(document).on('click', '.delete-comment-action', function () {
      var commentId = $(this).attr('data-id');

      if (confirm("Supprimer ce commentaire ?")) {
        removeArticleComment(commentId);
      }
    });
  });

  function AddArticleComment() {
    var visitorId = $('#visitorId').val();
    var articleId = $('#articleId').val();
    var newCommentText = $('#send-comment-input').val();

    if (visitorId === "") {
      console.log('no user id/ cannot like Article');
    } else {
      $.ajax({
        type: 'POST',
        async: true,
        data: {
          visitorId: visitorId,
          newCommentText: newCommentText
        },
        url: _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_1___default.a.generate("articleComment_ajaxAddCommentToArticle", {
          idArticle: articleId
        })
      }).done(function (response) {
        var commentAuthor = response.commentAuthor;
        var isAuthor = response.isAuthor;
        var authorUsername = response.authorUsername;
        var commentId = response.commentId;
        var hrefPath = $('#visitor-picture').attr("data-href");
        var imgPath = $('#visitor-picture').attr("src");

        if (commentAuthor !== null && authorUsername !== null) {
          // clone a template of html block hidden in DOM
          var clonedHtml = $("#jquery-hidden-comment-block").clone(); // and complete info of this template with the create Comment action

          clonedHtml.removeAttr('id').attr('data-id', commentId);
          clonedHtml.find('.comment-username').attr("href", hrefPath).html(authorUsername);
          clonedHtml.addClass(isAuthor === "false" ? 'user-comment' : "author-comment");
          clonedHtml.find('.comment-body').html(commentAuthor);
          clonedHtml.find('.comment-avatar').attr("href", hrefPath);
          clonedHtml.find('.user-picture').attr("src", imgPath).attr("title", authorUsername);
          clonedHtml.insertBefore('.write-new');
        }
      }).fail(function (response, status, xhr) {
        console.log("Une erreur est survenue, action non enregistrée");
      });
    }
  }

  function removeArticleComment(idComment) {
    var visitorId = $('#visitorId').val();
    var articleId = $('#articleId').val();

    if (visitorId === "") {
      console.log('no user id/ cannot like Article');
    } else {
      $.ajax({
        type: 'POST',
        async: true,
        data: {
          visitorId: visitorId,
          articleId: articleId
        },
        url: _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_1___default.a.generate("articleComment_ajaxRemoveCommentFromArticle", {
          idComment: idComment
        })
      }).done(function (response) {
        var deletedCommentId = response.deletedCommentId;

        if (deletedCommentId !== null) {
          // find by data-id the comment and remove the entire block from the DOM
          $('li[data-id =' + deletedCommentId + ' ]').hide();
        }
      }).fail(function (response, status, xhr) {
        console.log("Une erreur est survenue, action non enregistrée");
      });
    }
  }
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./node_modules/core-js/modules/es.array.find.js":
/*!*******************************************************!*\
  !*** ./node_modules/core-js/modules/es.array.find.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

var $ = __webpack_require__(/*! ../internals/export */ "./node_modules/core-js/internals/export.js");
var $find = __webpack_require__(/*! ../internals/array-iteration */ "./node_modules/core-js/internals/array-iteration.js").find;
var addToUnscopables = __webpack_require__(/*! ../internals/add-to-unscopables */ "./node_modules/core-js/internals/add-to-unscopables.js");
var arrayMethodUsesToLength = __webpack_require__(/*! ../internals/array-method-uses-to-length */ "./node_modules/core-js/internals/array-method-uses-to-length.js");

var FIND = 'find';
var SKIPS_HOLES = true;

var USES_TO_LENGTH = arrayMethodUsesToLength(FIND);

// Shouldn't skip holes
if (FIND in []) Array(1)[FIND](function () { SKIPS_HOLES = false; });

// `Array.prototype.find` method
// https://tc39.github.io/ecma262/#sec-array.prototype.find
$({ target: 'Array', proto: true, forced: SKIPS_HOLES || !USES_TO_LENGTH }, {
  find: function find(callbackfn /* , that = undefined */) {
    return $find(this, callbackfn, arguments.length > 1 ? arguments[1] : undefined);
  }
});

// https://tc39.github.io/ecma262/#sec-array.prototype-@@unscopables
addToUnscopables(FIND);


/***/ })

},[["./assets/js/manageArticleComment.js","runtime","vendors~app~manageArticleComment~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow","vendors~manageArticleComment~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow","manageArticleComment~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvbWFuYWdlQXJ0aWNsZUNvbW1lbnQuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvbW9kdWxlcy9lcy5hcnJheS5maW5kLmpzIl0sIm5hbWVzIjpbInJvdXRlcyIsInJlcXVpcmUiLCJSb3V0aW5nIiwic2V0Um91dGluZ0RhdGEiLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsIm9uIiwiQWRkQXJ0aWNsZUNvbW1lbnQiLCJjb21tZW50SWQiLCJhdHRyIiwiY29uZmlybSIsInJlbW92ZUFydGljbGVDb21tZW50IiwidmlzaXRvcklkIiwidmFsIiwiYXJ0aWNsZUlkIiwibmV3Q29tbWVudFRleHQiLCJjb25zb2xlIiwibG9nIiwiYWpheCIsInR5cGUiLCJhc3luYyIsImRhdGEiLCJ1cmwiLCJnZW5lcmF0ZSIsImlkQXJ0aWNsZSIsImRvbmUiLCJyZXNwb25zZSIsImNvbW1lbnRBdXRob3IiLCJpc0F1dGhvciIsImF1dGhvclVzZXJuYW1lIiwiaHJlZlBhdGgiLCJpbWdQYXRoIiwiY2xvbmVkSHRtbCIsImNsb25lIiwicmVtb3ZlQXR0ciIsImZpbmQiLCJodG1sIiwiYWRkQ2xhc3MiLCJpbnNlcnRCZWZvcmUiLCJmYWlsIiwic3RhdHVzIiwieGhyIiwiaWRDb21tZW50IiwiZGVsZXRlZENvbW1lbnRJZCIsImhpZGUiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUEsSUFBTUEsTUFBTSxHQUFHQyxtQkFBTyxDQUFDLDBFQUFELENBQXRCOztBQUNBO0FBRUFDLGtIQUFPLENBQUNDLGNBQVIsQ0FBdUJILE1BQXZCO0FBRUFJLENBQUMsQ0FBQyxZQUFZO0FBQ1ZBLEdBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVztBQUN6QkYsS0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUUsRUFBWixDQUFlLE9BQWYsRUFBdUIsc0JBQXZCLEVBQStDLFlBQVU7QUFDckRDLHVCQUFp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QVo7QUFDSCxPQXJCTDtBQXNCSDtBQUNKO0FBR0osQ0EvRkEsQ0FBRCxDOzs7Ozs7Ozs7Ozs7O0FDTGE7QUFDYixRQUFRLG1CQUFPLENBQUMsdUVBQXFCO0FBQ3JDLFlBQVksbUJBQU8sQ0FBQyx5RkFBOEI7QUFDbEQsdUJBQXVCLG1CQUFPLENBQUMsK0ZBQWlDO0FBQ2hFLDhCQUE4QixtQkFBTyxDQUFDLGlIQUEwQzs7QUFFaEY7QUFDQTs7QUFFQTs7QUFFQTtBQUNBLDRDQUE0QyxxQkFBcUIsRUFBRTs7QUFFbkU7QUFDQTtBQUNBLEdBQUcsdUVBQXVFO0FBQzFFO0FBQ0E7QUFDQTtBQUNBLENBQUM7O0FBRUQ7QUFDQSIsImZpbGUiOiJtYW5hZ2VBcnRpY2xlQ29tbWVudC5qcyIsInNvdXJjZXNDb250ZW50IjpbImNvbnN0IHJvdXRlcyA9IHJlcXVpcmUoJy4uLy4uL3B1YmxpYy9qcy9mb3NfanNfcm91dGVzLmpzb24nKTtcbmltcG9ydCBSb3V0aW5nIGZyb20gJy4uLy4uL3ZlbmRvci9mcmllbmRzb2ZzeW1mb255L2pzcm91dGluZy1idW5kbGUvUmVzb3VyY2VzL3B1YmxpYy9qcy9yb3V0ZXIubWluLmpzJztcblxuUm91dGluZy5zZXRSb3V0aW5nRGF0YShyb3V0ZXMpO1xuXG4kKGZ1bmN0aW9uICgpIHtcbiAgICAkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcbiAgICAgICAgJChkb2N1bWVudCkub24oJ2NsaWNrJywnI3NlbmQtY29tbWVudC1hY3Rpb24nLCBmdW5jdGlvbigpe1xuICAgICAgICAgICAgQWRkQXJ0aWNsZUNvbW1lbnQoKTtcbiAgICAgICAgfSlcblxuICAgICAgICAkKGRvY3VtZW50KS5vbignY2xpY2snLCcuZGVsZXRlLWNvbW1lbnQtYWN0aW9uJywgZnVuY3Rpb24oKXtcbiAgICAgICAgICAgIHZhciBjb21tZW50SWQgPSAkKCB0aGlzICkuYXR0cignZGF0YS1pZCcpO1xuICAgICAgICAgICAgaWYgKCBjb25maXJtKCBcIlN1cHByaW1lciBjZSBjb21tZW50YWlyZSA/XCIgKSApIHtcbiAgICAgICAgICAgICAgICByZW1vdmVBcnRpY2xlQ29tbWVudChjb21tZW50SWQpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9KVxuICAgIH0pO1xuXG4gICAgZnVuY3Rpb24gQWRkQXJ0aWNsZUNvbW1lbnQoKSB7XG4gICAgICAgIHZhciB2aXNpdG9ySWQgPSAkKCcjdmlzaXRvcklkJykudmFsKCk7XG4gICAgICAgIHZhciBhcnRpY2xlSWQgPSAkKCcjYXJ0aWNsZUlkJykudmFsKCk7XG4gICAgICAgIHZhciBuZXdDb21tZW50VGV4dCA9ICQoJyNzZW5kLWNvbW1lbnQtaW5wdXQnKS52YWwoKTtcblxuICAgICAgICBpZiAodmlzaXRvcklkID09PSBcIlwiKSB7XG4gICAgICAgICAgICBjb25zb2xlLmxvZygnbm8gdXNlciBpZC8gY2Fubm90IGxpa2UgQXJ0aWNsZScpO1xuICAgICAgICB9XG4gICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICB0eXBlOiAnUE9TVCcsXG4gICAgICAgICAgICAgICAgYXN5bmM6IHRydWUsXG4gICAgICAgICAgICAgICAgZGF0YToge1xuICAgICAgICAgICAgICAgICAgICB2aXNpdG9ySWQ6IHZpc2l0b3JJZCxcbiAgICAgICAgICAgICAgICAgICAgbmV3Q29tbWVudFRleHQgOiBuZXdDb21tZW50VGV4dFxuICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgdXJsOiBSb3V0aW5nLmdlbmVyYXRlKFwiYXJ0aWNsZUNvbW1lbnRfYWpheEFkZENvbW1lbnRUb0FydGljbGVcIiwge1xuICAgICAgICAgICAgICAgICAgICBpZEFydGljbGU6IGFydGljbGVJZFxuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgIC5kb25lKGZ1bmN0aW9uKHJlc3BvbnNlKSB7XG4gICAgICAgICAgICAgICAgICAgIGxldCBjb21tZW50QXV0aG9yID0gcmVzcG9uc2UuY29tbWVudEF1dGhvcjtcbiAgICAgICAgICAgICAgICAgICAgbGV0IGlzQXV0aG9yID0gcmVzcG9uc2UuaXNBdXRob3I7XG4gICAgICAgICAgICAgICAgICAgIGxldCBhdXRob3JVc2VybmFtZSA9IHJlc3BvbnNlLmF1dGhvclVzZXJuYW1lO1xuICAgICAgICAgICAgICAgICAgICBsZXQgY29tbWVudElkID0gcmVzcG9uc2UuY29tbWVudElkO1xuICAgICAgICAgICAgICAgICAgICBsZXQgaHJlZlBhdGggPSAkKCcjdmlzaXRvci1waWN0dXJlJykuYXR0cihcImRhdGEtaHJlZlwiKTtcbiAgICAgICAgICAgICAgICAgICAgbGV0IGltZ1BhdGggPSAkKCcjdmlzaXRvci1waWN0dXJlJykuYXR0cihcInNyY1wiKTtcblxuICAgICAgICAgICAgICAgICAgICBpZiAoY29tbWVudEF1dGhvciAhPT0gbnVsbCAmJiBhdXRob3JVc2VybmFtZSAhPT0gbnVsbCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgLy8gY2xvbmUgYSB0ZW1wbGF0ZSBvZiBodG1sIGJsb2NrIGhpZGRlbiBpbiBET01cbiAgICAgICAgICAgICAgICAgICAgICAgIGxldCBjbG9uZWRIdG1sID0gJChcIiNqcXVlcnktaGlkZGVuLWNvbW1lbnQtYmxvY2tcIikuY2xvbmUoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vIGFuZCBjb21wbGV0ZSBpbmZvIG9mIHRoaXMgdGVtcGxhdGUgd2l0aCB0aGUgY3JlYXRlIENvbW1lbnQgYWN0aW9uXG4gICAgICAgICAgICAgICAgICAgICAgICBjbG9uZWRIdG1sLnJlbW92ZUF0dHIoJ2lkJykuYXR0cignZGF0YS1pZCcsIGNvbW1lbnRJZCk7XG4gICAgICAgICAgICAgICAgICAgICAgICBjbG9uZWRIdG1sLmZpbmQoJy5jb21tZW50LXVzZXJuYW1lJykuYXR0cihcImhyZWZcIiwgaHJlZlBhdGgpLmh0bWwoYXV0aG9yVXNlcm5hbWUpO1xuICAgICAgICAgICAgICAgICAgICAgICAgY2xvbmVkSHRtbC5hZGRDbGFzcyhpc0F1dGhvciA9PT0gXCJmYWxzZVwiID8gJ3VzZXItY29tbWVudCcgOiBcImF1dGhvci1jb21tZW50XCIpO1xuICAgICAgICAgICAgICAgICAgICAgICAgY2xvbmVkSHRtbC5maW5kKCcuY29tbWVudC1ib2R5JykuaHRtbChjb21tZW50QXV0aG9yKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGNsb25lZEh0bWwuZmluZCgnLmNvbW1lbnQtYXZhdGFyJykuYXR0cihcImhyZWZcIiwgaHJlZlBhdGgpO1xuICAgICAgICAgICAgICAgICAgICAgICAgY2xvbmVkSHRtbC5maW5kKCcudXNlci1waWN0dXJlJykuYXR0cihcInNyY1wiLCBpbWdQYXRoKS5hdHRyKFwidGl0bGVcIiwgYXV0aG9yVXNlcm5hbWUpO1xuICAgICAgICAgICAgICAgICAgICAgICAgY2xvbmVkSHRtbC5pbnNlcnRCZWZvcmUoJy53cml0ZS1uZXcnKTtcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgLmZhaWwoZnVuY3Rpb24ocmVzcG9uc2UsIHN0YXR1cywgeGhyKXtcbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coXCJVbmUgZXJyZXVyIGVzdCBzdXJ2ZW51ZSwgYWN0aW9uIG5vbiBlbnJlZ2lzdHLDqWVcIik7XG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgfVxuICAgIH1cblxuICAgIGZ1bmN0aW9uIHJlbW92ZUFydGljbGVDb21tZW50KGlkQ29tbWVudCkge1xuICAgICAgICB2YXIgdmlzaXRvcklkID0gJCgnI3Zpc2l0b3JJZCcpLnZhbCgpO1xuICAgICAgICB2YXIgYXJ0aWNsZUlkID0gJCgnI2FydGljbGVJZCcpLnZhbCgpO1xuXG4gICAgICAgIGlmICh2aXNpdG9ySWQgPT09IFwiXCIpIHtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCdubyB1c2VyIGlkLyBjYW5ub3QgbGlrZSBBcnRpY2xlJyk7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIHR5cGU6ICdQT1NUJyxcbiAgICAgICAgICAgICAgICBhc3luYzogdHJ1ZSxcbiAgICAgICAgICAgICAgICBkYXRhOiB7XG4gICAgICAgICAgICAgICAgICAgIHZpc2l0b3JJZDogdmlzaXRvcklkLFxuICAgICAgICAgICAgICAgICAgICBhcnRpY2xlSWQgOiBhcnRpY2xlSWRcbiAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgICAgIHVybDogUm91dGluZy5nZW5lcmF0ZShcImFydGljbGVDb21tZW50X2FqYXhSZW1vdmVDb21tZW50RnJvbUFydGljbGVcIiwge1xuICAgICAgICAgICAgICAgICAgICBpZENvbW1lbnQ6IGlkQ29tbWVudFxuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgIC5kb25lKGZ1bmN0aW9uKHJlc3BvbnNlKSB7XG4gICAgICAgICAgICAgICAgICAgIGxldCBkZWxldGVkQ29tbWVudElkID0gcmVzcG9uc2UuZGVsZXRlZENvbW1lbnRJZDtcblxuICAgICAgICAgICAgICAgICAgICBpZiAoZGVsZXRlZENvbW1lbnRJZCAhPT0gbnVsbCApIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vIGZpbmQgYnkgZGF0YS1pZCB0aGUgY29tbWVudCBhbmQgcmVtb3ZlIHRoZSBlbnRpcmUgYmxvY2sgZnJvbSB0aGUgRE9NXG4gICAgICAgICAgICAgICAgICAgICAgICAkKCdsaVtkYXRhLWlkID0nKyBkZWxldGVkQ29tbWVudElkICsnIF0nKS5oaWRlKCk7XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgIC5mYWlsKGZ1bmN0aW9uKHJlc3BvbnNlLCBzdGF0dXMsIHhocil7XG4gICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKFwiVW5lIGVycmV1ciBlc3Qgc3VydmVudWUsIGFjdGlvbiBub24gZW5yZWdpc3Ryw6llXCIpO1xuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgIH1cbiAgICB9XG5cblxufSkiLCIndXNlIHN0cmljdCc7XG52YXIgJCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9leHBvcnQnKTtcbnZhciAkZmluZCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9hcnJheS1pdGVyYXRpb24nKS5maW5kO1xudmFyIGFkZFRvVW5zY29wYWJsZXMgPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvYWRkLXRvLXVuc2NvcGFibGVzJyk7XG52YXIgYXJyYXlNZXRob2RVc2VzVG9MZW5ndGggPSByZXF1aXJlKCcuLi9pbnRlcm5hbHMvYXJyYXktbWV0aG9kLXVzZXMtdG8tbGVuZ3RoJyk7XG5cbnZhciBGSU5EID0gJ2ZpbmQnO1xudmFyIFNLSVBTX0hPTEVTID0gdHJ1ZTtcblxudmFyIFVTRVNfVE9fTEVOR1RIID0gYXJyYXlNZXRob2RVc2VzVG9MZW5ndGgoRklORCk7XG5cbi8vIFNob3VsZG4ndCBza2lwIGhvbGVzXG5pZiAoRklORCBpbiBbXSkgQXJyYXkoMSlbRklORF0oZnVuY3Rpb24gKCkgeyBTS0lQU19IT0xFUyA9IGZhbHNlOyB9KTtcblxuLy8gYEFycmF5LnByb3RvdHlwZS5maW5kYCBtZXRob2Rcbi8vIGh0dHBzOi8vdGMzOS5naXRodWIuaW8vZWNtYTI2Mi8jc2VjLWFycmF5LnByb3RvdHlwZS5maW5kXG4kKHsgdGFyZ2V0OiAnQXJyYXknLCBwcm90bzogdHJ1ZSwgZm9yY2VkOiBTS0lQU19IT0xFUyB8fCAhVVNFU19UT19MRU5HVEggfSwge1xuICBmaW5kOiBmdW5jdGlvbiBmaW5kKGNhbGxiYWNrZm4gLyogLCB0aGF0ID0gdW5kZWZpbmVkICovKSB7XG4gICAgcmV0dXJuICRmaW5kKHRoaXMsIGNhbGxiYWNrZm4sIGFyZ3VtZW50cy5sZW5ndGggPiAxID8gYXJndW1lbnRzWzFdIDogdW5kZWZpbmVkKTtcbiAgfVxufSk7XG5cbi8vIGh0dHBzOi8vdGMzOS5naXRodWIuaW8vZWNtYTI2Mi8jc2VjLWFycmF5LnByb3RvdHlwZS1AQHVuc2NvcGFibGVzXG5hZGRUb1Vuc2NvcGFibGVzKEZJTkQpO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==