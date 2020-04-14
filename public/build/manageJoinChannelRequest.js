(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["manageJoinChannelRequest"],{

/***/ "./assets/js/manageJoinChannelRequest.js":
/*!***********************************************!*\
  !*** ./assets/js/manageJoinChannelRequest.js ***!
  \***********************************************/
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
    $(document).on('click', '.toggle-send-request', function () {
      sendRequestOrRemoveChannelSubscription();
    });

    function sendRequestOrRemoveChannelSubscription(channelId) {
      var visitorId = $('#visitorId').val();
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
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},[["./assets/js/manageJoinChannelRequest.js","runtime","vendors~app~manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageTabs~toggleArti~5918ea3b","vendors~manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageTabs~toggleArticleB~e68393d8","manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageTabs~toggleArticleBookmark~~638521e2"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvbWFuYWdlSm9pbkNoYW5uZWxSZXF1ZXN0LmpzIl0sIm5hbWVzIjpbInJvdXRlcyIsInJlcXVpcmUiLCJSb3V0aW5nIiwic2V0Um91dGluZ0RhdGEiLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsIm9uIiwic2VuZFJlcXVlc3RPclJlbW92ZUNoYW5uZWxTdWJzY3JpcHRpb24iLCJjaGFubmVsSWQiLCJ2aXNpdG9ySWQiLCJ2YWwiLCJhamF4UGF0aCIsImNvbnNvbGUiLCJsb2ciLCJpc0ZvbGxvd2luZyIsImFqYXgiLCJ0eXBlIiwiYXN5bmMiLCJkYXRhIiwidXJsIiwiZ2VuZXJhdGUiLCJpZFdyaXRlciIsIndyaXRlcklkIiwiZG9uZSIsInJlc3BvbnNlIiwiaXNGb2xsb3dlZEN1cnJlbnRTdGF0dXMiLCJmb2xsb3dCdXR0b25TZWxlY3RvciIsImF0dHIiLCJyZW1vdmVDbGFzcyIsImFkZENsYXNzIiwiaHRtbCIsImZhaWwiLCJzdGF0dXMiLCJ4aHIiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7QUFBQTtBQUFBO0FBQUE7QUFBQSxJQUFNQSxNQUFNLEdBQUdDLG1CQUFPLENBQUMsMEVBQUQsQ0FBdEI7O0FBQ0E7QUFFQUMsa0hBQU8sQ0FBQ0MsY0FBUixDQUF1QkgsTUFBdkI7QUFFQUksQ0FBQyxDQUFDLFlBQVk7QUFDVkEsR0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFXO0FBQ3pCRixLQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZRSxFQUFaLENBQWUsT0FBZixFQUF1QixzQkFBdkIsRUFBK0MsWUFBVTtBQUNyREMsNENBQXNDO0FBQ3pDLEtBRkQ7O0FBSUEsYUFBU0Esc0NBQVQsQ0FBZ0RDLFNBQWhELEVBQTJEO0FBQ3ZELFVBQUlDLFNBQVMsR0FBR04sQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQk8sR0FBaEIsRUFBaEI7QUFDQSxVQUFJQyxRQUFRLEdBQUcsOEJBQWY7O0FBRUEsVUFBSUYsU0FBUyxLQUFLLEVBQWxCLEVBQXNCO0FBQ2xCRyxlQUFPLENBQUNDLEdBQVIsQ0FBWSxvREFBWjtBQUNILE9BRkQsTUFJSztBQUNELFlBQUlDLFdBQVcsS0FBSyxHQUFwQixFQUF5QjtBQUNyQkgsa0JBQVEsR0FBRyxtQ0FBWDtBQUNIOztBQUNEQyxlQUFPLENBQUNDLEdBQVIsQ0FBWUYsUUFBWjtBQUVBUixTQUFDLENBQUNZLElBQUYsQ0FBTztBQUNIQyxjQUFJLEVBQUUsTUFESDtBQUVIQyxlQUFLLEVBQUUsSUFGSjtBQUdIQyxjQUFJLEVBQUU7QUFBRVQscUJBQVMsRUFBRUE7QUFBYixXQUhIO0FBSUhVLGFBQUcsRUFBRWxCLGtIQUFPLENBQUNtQixRQUFSLENBQWlCVCxRQUFqQixFQUEyQjtBQUM1QlUsb0JBQVEsRUFBRUM7QUFEa0IsV0FBM0I7QUFKRixTQUFQLEVBUUtDLElBUkwsQ0FRVSxVQUFTQyxRQUFULEVBQW1CO0FBQ3JCLGNBQUlDLHVCQUF1QixHQUFHRCxRQUFRLENBQUNDLHVCQUF2QztBQUNBLGNBQUlDLG9CQUFvQixHQUFHdkIsQ0FBQyxDQUFDLHlCQUFELENBQTVCOztBQUNBLGNBQUlzQix1QkFBdUIsS0FBSyxJQUFoQyxFQUFzQztBQUNsQ3RCLGFBQUMsQ0FBQyxjQUFELENBQUQsQ0FBa0J3QixJQUFsQixDQUF1QixPQUF2QixFQUFnQyxHQUFoQztBQUNBRCxnQ0FBb0IsQ0FBQ0UsV0FBckIsQ0FBaUMsUUFBakM7QUFDQUYsZ0NBQW9CLENBQUNHLFFBQXJCLENBQThCLFVBQTlCO0FBQ0FILGdDQUFvQixDQUFDSSxJQUFyQixDQUEwQixVQUExQjtBQUNILFdBTEQsTUFNSyxJQUFJTCx1QkFBdUIsS0FBSyxLQUFoQyxFQUF1QztBQUN4Q3RCLGFBQUMsQ0FBQyxjQUFELENBQUQsQ0FBa0J3QixJQUFsQixDQUF1QixPQUF2QixFQUFnQyxHQUFoQztBQUNBRCxnQ0FBb0IsQ0FBQ0UsV0FBckIsQ0FBaUMsVUFBakM7QUFDQUYsZ0NBQW9CLENBQUNHLFFBQXJCLENBQThCLFFBQTlCO0FBQ0FILGdDQUFvQixDQUFDSSxJQUFyQixDQUEwQixRQUExQjtBQUNIO0FBQ0osU0F2QkwsRUF3QktDLElBeEJMLENBd0JVLFVBQVNQLFFBQVQsRUFBbUJRLE1BQW5CLEVBQTJCQyxHQUEzQixFQUErQjtBQUNqQ3JCLGlCQUFPLENBQUNDLEdBQVIsQ0FBWSxpREFBWjtBQUNILFNBMUJMO0FBMkJIO0FBQ0o7QUFJSixHQW5ERDtBQW9ESCxDQXJEQSxDQUFELEMiLCJmaWxlIjoibWFuYWdlSm9pbkNoYW5uZWxSZXF1ZXN0LmpzIiwic291cmNlc0NvbnRlbnQiOlsiY29uc3Qgcm91dGVzID0gcmVxdWlyZSgnLi4vLi4vcHVibGljL2pzL2Zvc19qc19yb3V0ZXMuanNvbicpO1xuaW1wb3J0IFJvdXRpbmcgZnJvbSAnLi4vLi4vdmVuZG9yL2ZyaWVuZHNvZnN5bWZvbnkvanNyb3V0aW5nLWJ1bmRsZS9SZXNvdXJjZXMvcHVibGljL2pzL3JvdXRlci5taW4uanMnO1xuXG5Sb3V0aW5nLnNldFJvdXRpbmdEYXRhKHJvdXRlcyk7XG5cbiQoZnVuY3Rpb24gKCkge1xuICAgICQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgICAgICAkKGRvY3VtZW50KS5vbignY2xpY2snLCcudG9nZ2xlLXNlbmQtcmVxdWVzdCcsIGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICBzZW5kUmVxdWVzdE9yUmVtb3ZlQ2hhbm5lbFN1YnNjcmlwdGlvbigpO1xuICAgICAgICB9KVxuXG4gICAgICAgIGZ1bmN0aW9uIHNlbmRSZXF1ZXN0T3JSZW1vdmVDaGFubmVsU3Vic2NyaXB0aW9uKGNoYW5uZWxJZCkge1xuICAgICAgICAgICAgdmFyIHZpc2l0b3JJZCA9ICQoJyN2aXNpdG9ySWQnKS52YWwoKTtcbiAgICAgICAgICAgIHZhciBhamF4UGF0aCA9IFwiZm9sbG93X2FqYXhBZGRGb2xsb3dUb1dyaXRlclwiO1xuXG4gICAgICAgICAgICBpZiAodmlzaXRvcklkID09PSBcIlwiKSB7XG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coJ25vIHVzZXIgaWQvIHZpc2l0b3IgY2Fubm90IGZvbGxvdyBhIHdyaXRlciBBcnRpY2xlJyk7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgICAgIGlmIChpc0ZvbGxvd2luZyA9PT0gXCIxXCIpIHtcbiAgICAgICAgICAgICAgICAgICAgYWpheFBhdGggPSBcImZvbGxvd19hamF4UmVtb3ZlRm9sbG93RnJvbVdyaXRlclwiO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhhamF4UGF0aCk7XG5cbiAgICAgICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgICAgICB0eXBlOiAnUE9TVCcsXG4gICAgICAgICAgICAgICAgICAgIGFzeW5jOiB0cnVlLFxuICAgICAgICAgICAgICAgICAgICBkYXRhOiB7IHZpc2l0b3JJZDogdmlzaXRvcklkIH0sXG4gICAgICAgICAgICAgICAgICAgIHVybDogUm91dGluZy5nZW5lcmF0ZShhamF4UGF0aCwge1xuICAgICAgICAgICAgICAgICAgICAgICAgaWRXcml0ZXI6IHdyaXRlcklkXG4gICAgICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgICAgICAgICAgLmRvbmUoZnVuY3Rpb24ocmVzcG9uc2UpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGxldCBpc0ZvbGxvd2VkQ3VycmVudFN0YXR1cyA9IHJlc3BvbnNlLmlzRm9sbG93ZWRDdXJyZW50U3RhdHVzO1xuICAgICAgICAgICAgICAgICAgICAgICAgbGV0IGZvbGxvd0J1dHRvblNlbGVjdG9yID0gJCgnLmNvY29udXRzLXRvZ2dsZS1mb2xsb3cnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChpc0ZvbGxvd2VkQ3VycmVudFN0YXR1cyA9PT0gdHJ1ZSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICQoJyNpc0ZvbGxvd2luZycpLmF0dHIoJ3ZhbHVlJywgJzEnKVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGZvbGxvd0J1dHRvblNlbGVjdG9yLnJlbW92ZUNsYXNzKCdmb2xsb3cnKVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGZvbGxvd0J1dHRvblNlbGVjdG9yLmFkZENsYXNzKCd1bmZvbGxvdycpXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgZm9sbG93QnV0dG9uU2VsZWN0b3IuaHRtbCgnVW5Gb2xsb3cnKVxuICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICAgICAgZWxzZSBpZiAoaXNGb2xsb3dlZEN1cnJlbnRTdGF0dXMgPT09IGZhbHNlKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJCgnI2lzRm9sbG93aW5nJykuYXR0cigndmFsdWUnLCAnMCcpXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgZm9sbG93QnV0dG9uU2VsZWN0b3IucmVtb3ZlQ2xhc3MoJ3VuZm9sbG93JylcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBmb2xsb3dCdXR0b25TZWxlY3Rvci5hZGRDbGFzcygnZm9sbG93JylcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBmb2xsb3dCdXR0b25TZWxlY3Rvci5odG1sKCdGb2xsb3cnKVxuICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgICAgICAuZmFpbChmdW5jdGlvbihyZXNwb25zZSwgc3RhdHVzLCB4aHIpe1xuICAgICAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coXCJVbmUgZXJyZXVyIGVzdCBzdXJ2ZW51ZSwgYWN0aW9uIG5vbiBlbnJlZ2lzdHLDqWVcIik7XG4gICAgICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICB9XG4gICAgICAgIH1cblxuXG5cbiAgICB9KTtcbn0pIl0sInNvdXJjZVJvb3QiOiIifQ==