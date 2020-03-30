(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["toggleWriterFollow"],{

/***/ "./assets/js/toggleWriterFollow.js":
/*!*****************************************!*\
  !*** ./assets/js/toggleWriterFollow.js ***!
  \*****************************************/
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
    $(document).on('click', '.coconuts-toggle-follow', function () {
      operateAddOrRemoveFollowOnWriter();
    });
  });

  function operateAddOrRemoveFollowOnWriter() {
    var visitorId = $('#visitorId').val();
    var writerId = $('#writerId').val();
    var isFollowing = $('#isFollowing').val();
    var ajaxPath = "follow_ajaxAddFollowToWriter";

    if (visitorId === "") {
      console.log('no user id/ visitor cannot follow a writer Article');
    } else {
      if (isFollowing === "1") {
        ajaxPath = "follow_ajaxRemoveFollowFromWriter";
      }

      console.log(ajaxPath);
      $.ajax({
        type: 'POST',
        async: true,
        data: {
          visitorId: visitorId
        },
        url: _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_0___default.a.generate(ajaxPath, {
          idWriter: writerId
        })
      }).done(function (response) {
        var isFollowedCurrentStatus = response.isFollowedCurrentStatus;
        var followButtonSelector = $('.coconuts-toggle-follow');

        if (isFollowedCurrentStatus === true) {
          $('#isFollowing').attr('value', '1');
          followButtonSelector.removeClass('follow');
          followButtonSelector.addClass('unfollow');
          followButtonSelector.html('UnFollow');
        } else if (isFollowedCurrentStatus === false) {
          $('#isFollowing').attr('value', '0');
          followButtonSelector.removeClass('unfollow');
          followButtonSelector.addClass('follow');
          followButtonSelector.html('Follow');
        }
      }).fail(function (response, status, xhr) {
        console.log("Une erreur est survenue, action non enregistrée");
      });
    }
  }
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},[["./assets/js/toggleWriterFollow.js","runtime","vendors~app~manageArticleComment~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow","vendors~manageArticleComment~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow","manageArticleComment~toggleArticleBookmark~toggleArticleLike~toggleWriterFollow"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvdG9nZ2xlV3JpdGVyRm9sbG93LmpzIl0sIm5hbWVzIjpbInJvdXRlcyIsInJlcXVpcmUiLCJSb3V0aW5nIiwic2V0Um91dGluZ0RhdGEiLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsIm9uIiwib3BlcmF0ZUFkZE9yUmVtb3ZlRm9sbG93T25Xcml0ZXIiLCJ2aXNpdG9ySWQiLCJ2YWwiLCJ3cml0ZXJJZCIsImlzRm9sbG93aW5nIiwiYWpheFBhdGgiLCJjb25zb2xlIiwibG9nIiwiYWpheCIsInR5cGUiLCJhc3luYyIsImRhdGEiLCJ1cmwiLCJnZW5lcmF0ZSIsImlkV3JpdGVyIiwiZG9uZSIsInJlc3BvbnNlIiwiaXNGb2xsb3dlZEN1cnJlbnRTdGF0dXMiLCJmb2xsb3dCdXR0b25TZWxlY3RvciIsImF0dHIiLCJyZW1vdmVDbGFzcyIsImFkZENsYXNzIiwiaHRtbCIsImZhaWwiLCJzdGF0dXMiLCJ4aHIiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7QUFBQTtBQUFBO0FBQUE7QUFBQSxJQUFNQSxNQUFNLEdBQUdDLG1CQUFPLENBQUMsMEVBQUQsQ0FBdEI7O0FBQ0E7QUFFQUMsa0hBQU8sQ0FBQ0MsY0FBUixDQUF1QkgsTUFBdkI7QUFFQUksQ0FBQyxDQUFDLFlBQVk7QUFDVkEsR0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFXO0FBQ3pCRixLQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZRSxFQUFaLENBQWUsT0FBZixFQUF1Qix5QkFBdkIsRUFBa0QsWUFBVTtBQUN4REMsc0NBQWdDO0FBQ25DLEtBRkQ7QUFHSCxHQUpEOztBQU1BLFdBQVNBLGdDQUFULEdBQTRDO0FBQ3hDLFFBQUlDLFNBQVMsR0FBR0wsQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQk0sR0FBaEIsRUFBaEI7QUFDQSxRQUFJQyxRQUFRLEdBQUdQLENBQUMsQ0FBQyxXQUFELENBQUQsQ0FBZU0sR0FBZixFQUFmO0FBQ0EsUUFBSUUsV0FBVyxHQUFHUixDQUFDLENBQUMsY0FBRCxDQUFELENBQWtCTSxHQUFsQixFQUFsQjtBQUNBLFFBQUlHLFFBQVEsR0FBRyw4QkFBZjs7QUFFQSxRQUFJSixTQUFTLEtBQUssRUFBbEIsRUFBc0I7QUFDbEJLLGFBQU8sQ0FBQ0MsR0FBUixDQUFZLG9EQUFaO0FBQ0gsS0FGRCxNQUlLO0FBQ0QsVUFBSUgsV0FBVyxLQUFLLEdBQXBCLEVBQXlCO0FBQ3JCQyxnQkFBUSxHQUFHLG1DQUFYO0FBQ0g7O0FBQ0RDLGFBQU8sQ0FBQ0MsR0FBUixDQUFZRixRQUFaO0FBRUFULE9BQUMsQ0FBQ1ksSUFBRixDQUFPO0FBQ0hDLFlBQUksRUFBRSxNQURIO0FBRUhDLGFBQUssRUFBRSxJQUZKO0FBR0hDLFlBQUksRUFBRTtBQUFFVixtQkFBUyxFQUFFQTtBQUFiLFNBSEg7QUFJSFcsV0FBRyxFQUFFbEIsa0hBQU8sQ0FBQ21CLFFBQVIsQ0FBaUJSLFFBQWpCLEVBQTJCO0FBQzVCUyxrQkFBUSxFQUFFWDtBQURrQixTQUEzQjtBQUpGLE9BQVAsRUFRS1ksSUFSTCxDQVFVLFVBQVNDLFFBQVQsRUFBbUI7QUFDckIsWUFBSUMsdUJBQXVCLEdBQUdELFFBQVEsQ0FBQ0MsdUJBQXZDO0FBQ0EsWUFBSUMsb0JBQW9CLEdBQUd0QixDQUFDLENBQUMseUJBQUQsQ0FBNUI7O0FBQ0EsWUFBSXFCLHVCQUF1QixLQUFLLElBQWhDLEVBQXNDO0FBQ2xDckIsV0FBQyxDQUFDLGNBQUQsQ0FBRCxDQUFrQnVCLElBQWxCLENBQXVCLE9BQXZCLEVBQWdDLEdBQWhDO0FBQ0FELDhCQUFvQixDQUFDRSxXQUFyQixDQUFpQyxRQUFqQztBQUNBRiw4QkFBb0IsQ0FBQ0csUUFBckIsQ0FBOEIsVUFBOUI7QUFDQUgsOEJBQW9CLENBQUNJLElBQXJCLENBQTBCLFVBQTFCO0FBQ0gsU0FMRCxNQU1LLElBQUlMLHVCQUF1QixLQUFLLEtBQWhDLEVBQXVDO0FBQ3hDckIsV0FBQyxDQUFDLGNBQUQsQ0FBRCxDQUFrQnVCLElBQWxCLENBQXVCLE9BQXZCLEVBQWdDLEdBQWhDO0FBQ0FELDhCQUFvQixDQUFDRSxXQUFyQixDQUFpQyxVQUFqQztBQUNBRiw4QkFBb0IsQ0FBQ0csUUFBckIsQ0FBOEIsUUFBOUI7QUFDQUgsOEJBQW9CLENBQUNJLElBQXJCLENBQTBCLFFBQTFCO0FBQ0g7QUFDSixPQXZCTCxFQXdCS0MsSUF4QkwsQ0F3QlUsVUFBU1AsUUFBVCxFQUFtQlEsTUFBbkIsRUFBMkJDLEdBQTNCLEVBQStCO0FBQ2pDbkIsZUFBTyxDQUFDQyxHQUFSLENBQVksaURBQVo7QUFDSCxPQTFCTDtBQTJCSDtBQUNKO0FBQ0osQ0FwREEsQ0FBRCxDIiwiZmlsZSI6InRvZ2dsZVdyaXRlckZvbGxvdy5qcyIsInNvdXJjZXNDb250ZW50IjpbImNvbnN0IHJvdXRlcyA9IHJlcXVpcmUoJy4uLy4uL3B1YmxpYy9qcy9mb3NfanNfcm91dGVzLmpzb24nKTtcbmltcG9ydCBSb3V0aW5nIGZyb20gJy4uLy4uL3ZlbmRvci9mcmllbmRzb2ZzeW1mb255L2pzcm91dGluZy1idW5kbGUvUmVzb3VyY2VzL3B1YmxpYy9qcy9yb3V0ZXIubWluLmpzJztcblxuUm91dGluZy5zZXRSb3V0aW5nRGF0YShyb3V0ZXMpO1xuXG4kKGZ1bmN0aW9uICgpIHtcbiAgICAkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcbiAgICAgICAgJChkb2N1bWVudCkub24oJ2NsaWNrJywnLmNvY29udXRzLXRvZ2dsZS1mb2xsb3cnLCBmdW5jdGlvbigpe1xuICAgICAgICAgICAgb3BlcmF0ZUFkZE9yUmVtb3ZlRm9sbG93T25Xcml0ZXIoKTtcbiAgICAgICAgfSlcbiAgICB9KTtcblxuICAgIGZ1bmN0aW9uIG9wZXJhdGVBZGRPclJlbW92ZUZvbGxvd09uV3JpdGVyKCkge1xuICAgICAgICB2YXIgdmlzaXRvcklkID0gJCgnI3Zpc2l0b3JJZCcpLnZhbCgpO1xuICAgICAgICB2YXIgd3JpdGVySWQgPSAkKCcjd3JpdGVySWQnKS52YWwoKTtcbiAgICAgICAgdmFyIGlzRm9sbG93aW5nID0gJCgnI2lzRm9sbG93aW5nJykudmFsKCk7XG4gICAgICAgIHZhciBhamF4UGF0aCA9IFwiZm9sbG93X2FqYXhBZGRGb2xsb3dUb1dyaXRlclwiO1xuXG4gICAgICAgIGlmICh2aXNpdG9ySWQgPT09IFwiXCIpIHtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCdubyB1c2VyIGlkLyB2aXNpdG9yIGNhbm5vdCBmb2xsb3cgYSB3cml0ZXIgQXJ0aWNsZScpO1xuICAgICAgICB9XG5cbiAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICBpZiAoaXNGb2xsb3dpbmcgPT09IFwiMVwiKSB7XG4gICAgICAgICAgICAgICAgYWpheFBhdGggPSBcImZvbGxvd19hamF4UmVtb3ZlRm9sbG93RnJvbVdyaXRlclwiO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgY29uc29sZS5sb2coYWpheFBhdGgpO1xuXG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIHR5cGU6ICdQT1NUJyxcbiAgICAgICAgICAgICAgICBhc3luYzogdHJ1ZSxcbiAgICAgICAgICAgICAgICBkYXRhOiB7IHZpc2l0b3JJZDogdmlzaXRvcklkIH0sXG4gICAgICAgICAgICAgICAgdXJsOiBSb3V0aW5nLmdlbmVyYXRlKGFqYXhQYXRoLCB7XG4gICAgICAgICAgICAgICAgICAgIGlkV3JpdGVyOiB3cml0ZXJJZFxuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgIC5kb25lKGZ1bmN0aW9uKHJlc3BvbnNlKSB7XG4gICAgICAgICAgICAgICAgICAgIGxldCBpc0ZvbGxvd2VkQ3VycmVudFN0YXR1cyA9IHJlc3BvbnNlLmlzRm9sbG93ZWRDdXJyZW50U3RhdHVzO1xuICAgICAgICAgICAgICAgICAgICBsZXQgZm9sbG93QnV0dG9uU2VsZWN0b3IgPSAkKCcuY29jb251dHMtdG9nZ2xlLWZvbGxvdycpO1xuICAgICAgICAgICAgICAgICAgICBpZiAoaXNGb2xsb3dlZEN1cnJlbnRTdGF0dXMgPT09IHRydWUpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICQoJyNpc0ZvbGxvd2luZycpLmF0dHIoJ3ZhbHVlJywgJzEnKVxuICAgICAgICAgICAgICAgICAgICAgICAgZm9sbG93QnV0dG9uU2VsZWN0b3IucmVtb3ZlQ2xhc3MoJ2ZvbGxvdycpXG4gICAgICAgICAgICAgICAgICAgICAgICBmb2xsb3dCdXR0b25TZWxlY3Rvci5hZGRDbGFzcygndW5mb2xsb3cnKVxuICAgICAgICAgICAgICAgICAgICAgICAgZm9sbG93QnV0dG9uU2VsZWN0b3IuaHRtbCgnVW5Gb2xsb3cnKVxuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIGVsc2UgaWYgKGlzRm9sbG93ZWRDdXJyZW50U3RhdHVzID09PSBmYWxzZSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgJCgnI2lzRm9sbG93aW5nJykuYXR0cigndmFsdWUnLCAnMCcpXG4gICAgICAgICAgICAgICAgICAgICAgICBmb2xsb3dCdXR0b25TZWxlY3Rvci5yZW1vdmVDbGFzcygndW5mb2xsb3cnKVxuICAgICAgICAgICAgICAgICAgICAgICAgZm9sbG93QnV0dG9uU2VsZWN0b3IuYWRkQ2xhc3MoJ2ZvbGxvdycpXG4gICAgICAgICAgICAgICAgICAgICAgICBmb2xsb3dCdXR0b25TZWxlY3Rvci5odG1sKCdGb2xsb3cnKVxuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgICAgICAuZmFpbChmdW5jdGlvbihyZXNwb25zZSwgc3RhdHVzLCB4aHIpe1xuICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhcIlVuZSBlcnJldXIgZXN0IHN1cnZlbnVlLCBhY3Rpb24gbm9uIGVucmVnaXN0csOpZVwiKTtcbiAgICAgICAgICAgICAgICB9KVxuICAgICAgICB9XG4gICAgfVxufSkiXSwic291cmNlUm9vdCI6IiJ9