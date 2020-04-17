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
      console.log('hello');
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
          clonedHtml.addClass(isAuthor === false ? 'user-comment' : "author-comment");
          clonedHtml.find('.comment-body').html(commentAuthor);
          clonedHtml.find('.comment-avatar').attr("href", hrefPath);
          clonedHtml.find('.user-picture').attr("src", imgPath).attr("title", authorUsername);
          clonedHtml.find('.delete-comment-action').attr("data-id", commentId);
          $('#send-comment-input').val('');
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

},[["./assets/js/manageArticleComment.js","runtime","vendors~app~manageArticleComment~manageChannelSubscription~manageExpandCollapse~manageJoinChannelReq~0c61dbcd","vendors~manageArticleComment~manageChannelSubscription~manageExpandCollapse~manageJoinChannelRequest~913969f7","manageArticleComment~manageChannelSubscription~manageExpandCollapse~manageJoinChannelRequest~manageJ~fa029cbd"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvbWFuYWdlQXJ0aWNsZUNvbW1lbnQuanMiLCJ3ZWJwYWNrOi8vLy4vbm9kZV9tb2R1bGVzL2NvcmUtanMvbW9kdWxlcy9lcy5hcnJheS5maW5kLmpzIl0sIm5hbWVzIjpbInJvdXRlcyIsInJlcXVpcmUiLCJSb3V0aW5nIiwic2V0Um91dGluZ0RhdGEiLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsIm9uIiwiY29uc29sZSIsImxvZyIsIkFkZEFydGljbGVDb21tZW50IiwiY29tbWVudElkIiwiYXR0ciIsImNvbmZpcm0iLCJyZW1vdmVBcnRpY2xlQ29tbWVudCIsInZpc2l0b3JJZCIsInZhbCIsImFydGljbGVJZCIsIm5ld0NvbW1lbnRUZXh0IiwiYWpheCIsInR5cGUiLCJhc3luYyIsImRhdGEiLCJ1cmwiLCJnZW5lcmF0ZSIsImlkQXJ0aWNsZSIsImRvbmUiLCJyZXNwb25zZSIsImNvbW1lbnRBdXRob3IiLCJpc0F1dGhvciIsImF1dGhvclVzZXJuYW1lIiwiaHJlZlBhdGgiLCJpbWdQYXRoIiwiY2xvbmVkSHRtbCIsImNsb25lIiwicmVtb3ZlQXR0ciIsImZpbmQiLCJodG1sIiwiYWRkQ2xhc3MiLCJpbnNlcnRCZWZvcmUiLCJmYWlsIiwic3RhdHVzIiwieGhyIiwiaWRDb21tZW50IiwiZGVsZXRlZENvbW1lbnRJZCIsImhpZGUiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7O0FBQUEsSUFBTUEsTUFBTSxHQUFHQyxtQkFBTyxDQUFDLDBFQUFELENBQXRCOztBQUNBO0FBRUFDLGtIQUFPLENBQUNDLGNBQVIsQ0FBdUJILE1BQXZCO0FBRUFJLENBQUMsQ0FBQyxZQUFZO0FBQ1ZBLEdBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVztBQUN6QkYsS0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUUsRUFBWixDQUFlLE9BQWYsRUFBdUIsc0JBQXZCLEVBQStDLFlBQVU7QUFDckRDLGFBQU8s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QUFDLGlCQUFnQndDLGdCQUFoQixHQUFrQyxJQUFuQyxDQUFELENBQTBDQyxJQUExQztBQUNIO0FBQ0osT0FsQkwsRUFtQktMLElBbkJMLENBbUJVLFVBQVNiLFFBQVQsRUFBbUJjLE1BQW5CLEVBQTJCQyxHQUEzQixFQUErQjtBQUNqQ2xDLGVBQU8sQ0FBQ0MsR0FBUixDQUFZLGlEQUFaO0FBQ0gsT0FyQkw7QUFzQkg7QUFDSjtBQUdKLENBakdBLENBQUQsQzs7Ozs7Ozs7Ozs7OztBQ0xhO0FBQ2IsUUFBUSxtQkFBTyxDQUFDLHVFQUFxQjtBQUNyQyxZQUFZLG1CQUFPLENBQUMseUZBQThCO0FBQ2xELHVCQUF1QixtQkFBTyxDQUFDLCtGQUFpQztBQUNoRSw4QkFBOEIsbUJBQU8sQ0FBQyxpSEFBMEM7O0FBRWhGO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQSw0Q0FBNEMscUJBQXFCLEVBQUU7O0FBRW5FO0FBQ0E7QUFDQSxHQUFHLHVFQUF1RTtBQUMxRTtBQUNBO0FBQ0E7QUFDQSxDQUFDOztBQUVEO0FBQ0EiLCJmaWxlIjoibWFuYWdlQXJ0aWNsZUNvbW1lbnQuanMiLCJzb3VyY2VzQ29udGVudCI6WyJjb25zdCByb3V0ZXMgPSByZXF1aXJlKCcuLi8uLi9wdWJsaWMvanMvZm9zX2pzX3JvdXRlcy5qc29uJyk7XG5pbXBvcnQgUm91dGluZyBmcm9tICcuLi8uLi92ZW5kb3IvZnJpZW5kc29mc3ltZm9ueS9qc3JvdXRpbmctYnVuZGxlL1Jlc291cmNlcy9wdWJsaWMvanMvcm91dGVyLm1pbi5qcyc7XG5cblJvdXRpbmcuc2V0Um91dGluZ0RhdGEocm91dGVzKTtcblxuJChmdW5jdGlvbiAoKSB7XG4gICAgJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XG4gICAgICAgICQoZG9jdW1lbnQpLm9uKCdjbGljaycsJyNzZW5kLWNvbW1lbnQtYWN0aW9uJywgZnVuY3Rpb24oKXtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCdoZWxsbycpXG4gICAgICAgICAgICBBZGRBcnRpY2xlQ29tbWVudCgpO1xuICAgICAgICB9KVxuXG4gICAgICAgICQoZG9jdW1lbnQpLm9uKCdjbGljaycsJy5kZWxldGUtY29tbWVudC1hY3Rpb24nLCBmdW5jdGlvbigpe1xuICAgICAgICAgICAgdmFyIGNvbW1lbnRJZCA9ICQoIHRoaXMgKS5hdHRyKCdkYXRhLWlkJyk7XG4gICAgICAgICAgICBpZiAoIGNvbmZpcm0oIFwiU3VwcHJpbWVyIGNlIGNvbW1lbnRhaXJlID9cIiApICkge1xuICAgICAgICAgICAgICAgIHJlbW92ZUFydGljbGVDb21tZW50KGNvbW1lbnRJZCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pXG4gICAgfSk7XG5cbiAgICBmdW5jdGlvbiBBZGRBcnRpY2xlQ29tbWVudCgpIHtcbiAgICAgICAgdmFyIHZpc2l0b3JJZCA9ICQoJyN2aXNpdG9ySWQnKS52YWwoKTtcbiAgICAgICAgdmFyIGFydGljbGVJZCA9ICQoJyNhcnRpY2xlSWQnKS52YWwoKTtcbiAgICAgICAgdmFyIG5ld0NvbW1lbnRUZXh0ID0gJCgnI3NlbmQtY29tbWVudC1pbnB1dCcpLnZhbCgpO1xuXG4gICAgICAgIGlmICh2aXNpdG9ySWQgPT09IFwiXCIpIHtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCdubyB1c2VyIGlkLyBjYW5ub3QgbGlrZSBBcnRpY2xlJyk7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIHR5cGU6ICdQT1NUJyxcbiAgICAgICAgICAgICAgICBhc3luYzogdHJ1ZSxcbiAgICAgICAgICAgICAgICBkYXRhOiB7XG4gICAgICAgICAgICAgICAgICAgIHZpc2l0b3JJZDogdmlzaXRvcklkLFxuICAgICAgICAgICAgICAgICAgICBuZXdDb21tZW50VGV4dCA6IG5ld0NvbW1lbnRUZXh0XG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICB1cmw6IFJvdXRpbmcuZ2VuZXJhdGUoXCJhcnRpY2xlQ29tbWVudF9hamF4QWRkQ29tbWVudFRvQXJ0aWNsZVwiLCB7XG4gICAgICAgICAgICAgICAgICAgIGlkQXJ0aWNsZTogYXJ0aWNsZUlkXG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgLmRvbmUoZnVuY3Rpb24ocmVzcG9uc2UpIHtcbiAgICAgICAgICAgICAgICAgICAgbGV0IGNvbW1lbnRBdXRob3IgPSByZXNwb25zZS5jb21tZW50QXV0aG9yO1xuICAgICAgICAgICAgICAgICAgICBsZXQgaXNBdXRob3IgPSByZXNwb25zZS5pc0F1dGhvcjtcbiAgICAgICAgICAgICAgICAgICAgbGV0IGF1dGhvclVzZXJuYW1lID0gcmVzcG9uc2UuYXV0aG9yVXNlcm5hbWU7XG4gICAgICAgICAgICAgICAgICAgIGxldCBjb21tZW50SWQgPSByZXNwb25zZS5jb21tZW50SWQ7XG4gICAgICAgICAgICAgICAgICAgIGxldCBocmVmUGF0aCA9ICQoJyN2aXNpdG9yLXBpY3R1cmUnKS5hdHRyKFwiZGF0YS1ocmVmXCIpO1xuICAgICAgICAgICAgICAgICAgICBsZXQgaW1nUGF0aCA9ICQoJyN2aXNpdG9yLXBpY3R1cmUnKS5hdHRyKFwic3JjXCIpO1xuICAgICAgICAgICAgICAgICAgICBpZiAoY29tbWVudEF1dGhvciAhPT0gbnVsbCAmJiBhdXRob3JVc2VybmFtZSAhPT0gbnVsbCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgLy8gY2xvbmUgYSB0ZW1wbGF0ZSBvZiBodG1sIGJsb2NrIGhpZGRlbiBpbiBET01cbiAgICAgICAgICAgICAgICAgICAgICAgIGxldCBjbG9uZWRIdG1sID0gJChcIiNqcXVlcnktaGlkZGVuLWNvbW1lbnQtYmxvY2tcIikuY2xvbmUoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIC8vIGFuZCBjb21wbGV0ZSBpbmZvIG9mIHRoaXMgdGVtcGxhdGUgd2l0aCB0aGUgY3JlYXRlIENvbW1lbnQgYWN0aW9uXG4gICAgICAgICAgICAgICAgICAgICAgICBjbG9uZWRIdG1sLnJlbW92ZUF0dHIoJ2lkJykuYXR0cignZGF0YS1pZCcsIGNvbW1lbnRJZCk7XG4gICAgICAgICAgICAgICAgICAgICAgICBjbG9uZWRIdG1sLmZpbmQoJy5jb21tZW50LXVzZXJuYW1lJykuYXR0cihcImhyZWZcIiwgaHJlZlBhdGgpLmh0bWwoYXV0aG9yVXNlcm5hbWUpO1xuICAgICAgICAgICAgICAgICAgICAgICAgY2xvbmVkSHRtbC5hZGRDbGFzcyhpc0F1dGhvciA9PT0gZmFsc2UgPyAndXNlci1jb21tZW50JyA6IFwiYXV0aG9yLWNvbW1lbnRcIik7XG4gICAgICAgICAgICAgICAgICAgICAgICBjbG9uZWRIdG1sLmZpbmQoJy5jb21tZW50LWJvZHknKS5odG1sKGNvbW1lbnRBdXRob3IpO1xuICAgICAgICAgICAgICAgICAgICAgICAgY2xvbmVkSHRtbC5maW5kKCcuY29tbWVudC1hdmF0YXInKS5hdHRyKFwiaHJlZlwiLCBocmVmUGF0aCk7XG4gICAgICAgICAgICAgICAgICAgICAgICBjbG9uZWRIdG1sLmZpbmQoJy51c2VyLXBpY3R1cmUnKS5hdHRyKFwic3JjXCIsIGltZ1BhdGgpLmF0dHIoXCJ0aXRsZVwiLCBhdXRob3JVc2VybmFtZSk7XG4gICAgICAgICAgICAgICAgICAgICAgICBjbG9uZWRIdG1sLmZpbmQoJy5kZWxldGUtY29tbWVudC1hY3Rpb24nKS5hdHRyKFwiZGF0YS1pZFwiLCBjb21tZW50SWQpO1xuICAgICAgICAgICAgICAgICAgICAgICAgJCgnI3NlbmQtY29tbWVudC1pbnB1dCcpLnZhbCgnJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBjbG9uZWRIdG1sLmluc2VydEJlZm9yZSgnLndyaXRlLW5ldycpO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgICAgICAuZmFpbChmdW5jdGlvbihyZXNwb25zZSwgc3RhdHVzLCB4aHIpe1xuICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhcIlVuZSBlcnJldXIgZXN0IHN1cnZlbnVlLCBhY3Rpb24gbm9uIGVucmVnaXN0csOpZVwiKTtcbiAgICAgICAgICAgICAgICB9KVxuICAgICAgICB9XG4gICAgfVxuXG4gICAgZnVuY3Rpb24gcmVtb3ZlQXJ0aWNsZUNvbW1lbnQoaWRDb21tZW50KSB7XG4gICAgICAgIHZhciB2aXNpdG9ySWQgPSAkKCcjdmlzaXRvcklkJykudmFsKCk7XG4gICAgICAgIHZhciBhcnRpY2xlSWQgPSAkKCcjYXJ0aWNsZUlkJykudmFsKCk7XG5cbiAgICAgICAgaWYgKHZpc2l0b3JJZCA9PT0gXCJcIikge1xuICAgICAgICAgICAgY29uc29sZS5sb2coJ25vIHVzZXIgaWQvIGNhbm5vdCBsaWtlIEFydGljbGUnKTtcbiAgICAgICAgfVxuICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICAgICAgdHlwZTogJ1BPU1QnLFxuICAgICAgICAgICAgICAgIGFzeW5jOiB0cnVlLFxuICAgICAgICAgICAgICAgIGRhdGE6IHtcbiAgICAgICAgICAgICAgICAgICAgdmlzaXRvcklkOiB2aXNpdG9ySWQsXG4gICAgICAgICAgICAgICAgICAgIGFydGljbGVJZCA6IGFydGljbGVJZFxuICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgdXJsOiBSb3V0aW5nLmdlbmVyYXRlKFwiYXJ0aWNsZUNvbW1lbnRfYWpheFJlbW92ZUNvbW1lbnRGcm9tQXJ0aWNsZVwiLCB7XG4gICAgICAgICAgICAgICAgICAgIGlkQ29tbWVudDogaWRDb21tZW50XG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgLmRvbmUoZnVuY3Rpb24ocmVzcG9uc2UpIHtcbiAgICAgICAgICAgICAgICAgICAgbGV0IGRlbGV0ZWRDb21tZW50SWQgPSByZXNwb25zZS5kZWxldGVkQ29tbWVudElkO1xuXG4gICAgICAgICAgICAgICAgICAgIGlmIChkZWxldGVkQ29tbWVudElkICE9PSBudWxsICkge1xuICAgICAgICAgICAgICAgICAgICAgICAgLy8gZmluZCBieSBkYXRhLWlkIHRoZSBjb21tZW50IGFuZCByZW1vdmUgdGhlIGVudGlyZSBibG9jayBmcm9tIHRoZSBET01cbiAgICAgICAgICAgICAgICAgICAgICAgICQoJ2xpW2RhdGEtaWQgPScrIGRlbGV0ZWRDb21tZW50SWQgKycgXScpLmhpZGUoKTtcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgLmZhaWwoZnVuY3Rpb24ocmVzcG9uc2UsIHN0YXR1cywgeGhyKXtcbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coXCJVbmUgZXJyZXVyIGVzdCBzdXJ2ZW51ZSwgYWN0aW9uIG5vbiBlbnJlZ2lzdHLDqWVcIik7XG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgfVxuICAgIH1cblxuXG59KSIsIid1c2Ugc3RyaWN0JztcbnZhciAkID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2V4cG9ydCcpO1xudmFyICRmaW5kID0gcmVxdWlyZSgnLi4vaW50ZXJuYWxzL2FycmF5LWl0ZXJhdGlvbicpLmZpbmQ7XG52YXIgYWRkVG9VbnNjb3BhYmxlcyA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9hZGQtdG8tdW5zY29wYWJsZXMnKTtcbnZhciBhcnJheU1ldGhvZFVzZXNUb0xlbmd0aCA9IHJlcXVpcmUoJy4uL2ludGVybmFscy9hcnJheS1tZXRob2QtdXNlcy10by1sZW5ndGgnKTtcblxudmFyIEZJTkQgPSAnZmluZCc7XG52YXIgU0tJUFNfSE9MRVMgPSB0cnVlO1xuXG52YXIgVVNFU19UT19MRU5HVEggPSBhcnJheU1ldGhvZFVzZXNUb0xlbmd0aChGSU5EKTtcblxuLy8gU2hvdWxkbid0IHNraXAgaG9sZXNcbmlmIChGSU5EIGluIFtdKSBBcnJheSgxKVtGSU5EXShmdW5jdGlvbiAoKSB7IFNLSVBTX0hPTEVTID0gZmFsc2U7IH0pO1xuXG4vLyBgQXJyYXkucHJvdG90eXBlLmZpbmRgIG1ldGhvZFxuLy8gaHR0cHM6Ly90YzM5LmdpdGh1Yi5pby9lY21hMjYyLyNzZWMtYXJyYXkucHJvdG90eXBlLmZpbmRcbiQoeyB0YXJnZXQ6ICdBcnJheScsIHByb3RvOiB0cnVlLCBmb3JjZWQ6IFNLSVBTX0hPTEVTIHx8ICFVU0VTX1RPX0xFTkdUSCB9LCB7XG4gIGZpbmQ6IGZ1bmN0aW9uIGZpbmQoY2FsbGJhY2tmbiAvKiAsIHRoYXQgPSB1bmRlZmluZWQgKi8pIHtcbiAgICByZXR1cm4gJGZpbmQodGhpcywgY2FsbGJhY2tmbiwgYXJndW1lbnRzLmxlbmd0aCA+IDEgPyBhcmd1bWVudHNbMV0gOiB1bmRlZmluZWQpO1xuICB9XG59KTtcblxuLy8gaHR0cHM6Ly90YzM5LmdpdGh1Yi5pby9lY21hMjYyLyNzZWMtYXJyYXkucHJvdG90eXBlLUBAdW5zY29wYWJsZXNcbmFkZFRvVW5zY29wYWJsZXMoRklORCk7XG4iXSwic291cmNlUm9vdCI6IiJ9