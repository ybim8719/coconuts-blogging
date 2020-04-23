(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["manageChannelSubscription"],{

/***/ "./assets/js/manageChannelSubscription.js":
/*!************************************************!*\
  !*** ./assets/js/manageChannelSubscription.js ***!
  \************************************************/
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
    console.log('ready');
    $(document).on('click', '.remove-channel-subscription', function () {
      console.log('ready2');

      if ($('#visitorId').val() === "") {
        console.log('no user id/ visitor can send request for channel');
      } else if ($('#channelId').val() === "") {
        console.log('no user id/ visitor can send request for channel');
      } else {
        if ($(this).attr("data-id") !== "") {
          removeChannelSubscription($(this).attr("data-id"), $('#visitorId').val(), $('#channelId').val());
        }

        ;
      }
    });

    function removeChannelSubscription(userId, visitorId, channelId) {
      var ajaxPath = "channelSubscription_ajaxRemoveChannelSubscription";
      $.ajax({
        type: 'POST',
        async: true,
        data: {
          visitorId: visitorId,
          userId: userId
        },
        url: _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_0___default.a.generate(ajaxPath, {
          idChannel: channelId
        })
      }).done(function (response) {
        var idUser = response.idUser;
        var message = response.message;
        var selector = $('.remove-channel-subscription[data-id=' + idUser + ']').parent('div');
        console.log(selector);
        selector.hide('fast');
        alert(message);
      }).fail(function (response, status, xhr) {
        console.log(response.message);
      });
    }
  });
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},[["./assets/js/manageChannelSubscription.js","runtime","vendors~app~manageArticleComment~manageChannelSubscription~manageExpandCollapse~manageJoinChannelReq~50916d4e","vendors~manageArticleComment~manageChannelSubscription~manageExpandCollapse~manageJoinChannelRequest~9cfa8c54","manageArticleComment~manageChannelSubscription~manageExpandCollapse~manageJoinChannelRequest~manageJ~47b5ff09"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvbWFuYWdlQ2hhbm5lbFN1YnNjcmlwdGlvbi5qcyJdLCJuYW1lcyI6WyJyb3V0ZXMiLCJyZXF1aXJlIiwiUm91dGluZyIsInNldFJvdXRpbmdEYXRhIiwiJCIsImRvY3VtZW50IiwicmVhZHkiLCJjb25zb2xlIiwibG9nIiwib24iLCJ2YWwiLCJhdHRyIiwicmVtb3ZlQ2hhbm5lbFN1YnNjcmlwdGlvbiIsInVzZXJJZCIsInZpc2l0b3JJZCIsImNoYW5uZWxJZCIsImFqYXhQYXRoIiwiYWpheCIsInR5cGUiLCJhc3luYyIsImRhdGEiLCJ1cmwiLCJnZW5lcmF0ZSIsImlkQ2hhbm5lbCIsImRvbmUiLCJyZXNwb25zZSIsImlkVXNlciIsIm1lc3NhZ2UiLCJzZWxlY3RvciIsInBhcmVudCIsImhpZGUiLCJhbGVydCIsImZhaWwiLCJzdGF0dXMiLCJ4aHIiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7QUFBQTtBQUFBO0FBQUE7QUFBQSxJQUFNQSxNQUFNLEdBQUdDLG1CQUFPLENBQUMsMEVBQUQsQ0FBdEI7O0FBQ0E7QUFFQUMsa0hBQU8sQ0FBQ0MsY0FBUixDQUF1QkgsTUFBdkI7QUFFQUksQ0FBQyxDQUFDLFlBQVk7QUFDVkEsR0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFXO0FBQ3pCQyxXQUFPLENBQUNDLEdBQVIsQ0FBWSxPQUFaO0FBQ0FKLEtBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlJLEVBQVosQ0FBZSxPQUFmLEVBQXdCLDhCQUF4QixFQUF3RCxZQUFVO0FBQzlERixhQUFPLENBQUNDLEdBQVIsQ0FBWSxRQUFaOztBQUVBLFVBQUtKLENBQUMsQ0FBQyxZQUFELENBQUQsQ0FBZ0JNLEdBQWhCLE9BQTBCLEVBQS9CLEVBQW1DO0FBQy9CSCxlQUFPLENBQUNDLEdBQVIsQ0FBWSxrREFBWjtBQUNILE9BRkQsTUFHSyxJQUFLSixDQUFDLENBQUMsWUFBRCxDQUFELENBQWdCTSxHQUFoQixPQUEwQixFQUEvQixFQUFtQztBQUNwQ0gsZUFBTyxDQUFDQyxHQUFSLENBQVksa0RBQVo7QUFDSCxPQUZJLE1BR0E7QUFDRCxZQUFHSixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFPLElBQVIsQ0FBYSxTQUFiLE1BQTRCLEVBQS9CLEVBQW1DO0FBQy9CQyxtQ0FBeUIsQ0FBQ1IsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRTyxJQUFSLENBQWEsU0FBYixDQUFELEVBQTBCUCxDQUFDLENBQUMsWUFBRCxDQUFELENBQWdCTSxHQUFoQixFQUExQixFQUFpRE4sQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQk0sR0FBaEIsRUFBakQsQ0FBekI7QUFDSDs7QUFBQTtBQUNKO0FBQ0osS0FkRDs7QUFnQkEsYUFBU0UseUJBQVQsQ0FBbUNDLE1BQW5DLEVBQTJDQyxTQUEzQyxFQUFzREMsU0FBdEQsRUFBaUU7QUFDN0QsVUFBSUMsUUFBUSxHQUFHLG1EQUFmO0FBQ0FaLE9BQUMsQ0FBQ2EsSUFBRixDQUFPO0FBQ0hDLFlBQUksRUFBRSxNQURIO0FBRUhDLGFBQUssRUFBRSxJQUZKO0FBR0hDLFlBQUksRUFBRTtBQUFFTixtQkFBUyxFQUFHQSxTQUFkO0FBQXlCRCxnQkFBTSxFQUFHQTtBQUFsQyxTQUhIO0FBSUhRLFdBQUcsRUFBRW5CLGtIQUFPLENBQUNvQixRQUFSLENBQWlCTixRQUFqQixFQUEyQjtBQUM1Qk8sbUJBQVMsRUFBRVI7QUFEaUIsU0FBM0I7QUFKRixPQUFQLEVBUUtTLElBUkwsQ0FRVSxVQUFTQyxRQUFULEVBQW1CO0FBQ3JCLFlBQUlDLE1BQU0sR0FBR0QsUUFBUSxDQUFDQyxNQUF0QjtBQUNBLFlBQUlDLE9BQU8sR0FBR0YsUUFBUSxDQUFDRSxPQUF2QjtBQUNBLFlBQUlDLFFBQVEsR0FBR3hCLENBQUMsQ0FBQywwQ0FBMENzQixNQUExQyxHQUFtRCxHQUFwRCxDQUFELENBQTBERyxNQUExRCxDQUFpRSxLQUFqRSxDQUFmO0FBQ0F0QixlQUFPLENBQUNDLEdBQVIsQ0FBWW9CLFFBQVo7QUFDQUEsZ0JBQVEsQ0FBQ0UsSUFBVCxDQUFjLE1BQWQ7QUFDQUMsYUFBSyxDQUFDSixPQUFELENBQUw7QUFDSCxPQWZMLEVBZ0JLSyxJQWhCTCxDQWdCVSxVQUFTUCxRQUFULEVBQW1CUSxNQUFuQixFQUEyQkMsR0FBM0IsRUFBK0I7QUFDakMzQixlQUFPLENBQUNDLEdBQVIsQ0FBYWlCLFFBQVEsQ0FBQ0UsT0FBdEI7QUFDSCxPQWxCTDtBQW1CSDtBQUNKLEdBeENEO0FBeUNILENBMUNBLENBQUQsQyIsImZpbGUiOiJtYW5hZ2VDaGFubmVsU3Vic2NyaXB0aW9uLmpzIiwic291cmNlc0NvbnRlbnQiOlsiY29uc3Qgcm91dGVzID0gcmVxdWlyZSgnLi4vLi4vcHVibGljL2pzL2Zvc19qc19yb3V0ZXMuanNvbicpO1xuaW1wb3J0IFJvdXRpbmcgZnJvbSAnLi4vLi4vdmVuZG9yL2ZyaWVuZHNvZnN5bWZvbnkvanNyb3V0aW5nLWJ1bmRsZS9SZXNvdXJjZXMvcHVibGljL2pzL3JvdXRlci5taW4uanMnO1xuXG5Sb3V0aW5nLnNldFJvdXRpbmdEYXRhKHJvdXRlcyk7XG5cbiQoZnVuY3Rpb24gKCkge1xuICAgICQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgICAgICBjb25zb2xlLmxvZygncmVhZHknKVxuICAgICAgICAkKGRvY3VtZW50KS5vbignY2xpY2snLCAnLnJlbW92ZS1jaGFubmVsLXN1YnNjcmlwdGlvbicsIGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICBjb25zb2xlLmxvZygncmVhZHkyJylcblxuICAgICAgICAgICAgaWYgICgkKCcjdmlzaXRvcklkJykudmFsKCkgPT09IFwiXCIpIHtcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZygnbm8gdXNlciBpZC8gdmlzaXRvciBjYW4gc2VuZCByZXF1ZXN0IGZvciBjaGFubmVsJyk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBlbHNlIGlmICAoJCgnI2NoYW5uZWxJZCcpLnZhbCgpID09PSBcIlwiKSB7XG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coJ25vIHVzZXIgaWQvIHZpc2l0b3IgY2FuIHNlbmQgcmVxdWVzdCBmb3IgY2hhbm5lbCcpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAgICAgaWYoJCh0aGlzKS5hdHRyKFwiZGF0YS1pZFwiKSAhPT0gXCJcIikge1xuICAgICAgICAgICAgICAgICAgICByZW1vdmVDaGFubmVsU3Vic2NyaXB0aW9uKCQodGhpcykuYXR0cihcImRhdGEtaWRcIiksICQoJyN2aXNpdG9ySWQnKS52YWwoKSwgJCgnI2NoYW5uZWxJZCcpLnZhbCgpKTtcbiAgICAgICAgICAgICAgICB9O1xuICAgICAgICAgICAgfVxuICAgICAgICB9KVxuXG4gICAgICAgIGZ1bmN0aW9uIHJlbW92ZUNoYW5uZWxTdWJzY3JpcHRpb24odXNlcklkLCB2aXNpdG9ySWQsIGNoYW5uZWxJZCkge1xuICAgICAgICAgICAgdmFyIGFqYXhQYXRoID0gXCJjaGFubmVsU3Vic2NyaXB0aW9uX2FqYXhSZW1vdmVDaGFubmVsU3Vic2NyaXB0aW9uXCI7XG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIHR5cGU6ICdQT1NUJyxcbiAgICAgICAgICAgICAgICBhc3luYzogdHJ1ZSxcbiAgICAgICAgICAgICAgICBkYXRhOiB7IHZpc2l0b3JJZCA6IHZpc2l0b3JJZCwgdXNlcklkIDogdXNlcklkIH0sXG4gICAgICAgICAgICAgICAgdXJsOiBSb3V0aW5nLmdlbmVyYXRlKGFqYXhQYXRoLCB7XG4gICAgICAgICAgICAgICAgICAgIGlkQ2hhbm5lbDogY2hhbm5lbElkXG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgLmRvbmUoZnVuY3Rpb24ocmVzcG9uc2UpIHtcbiAgICAgICAgICAgICAgICAgICAgbGV0IGlkVXNlciA9IHJlc3BvbnNlLmlkVXNlcjtcbiAgICAgICAgICAgICAgICAgICAgbGV0IG1lc3NhZ2UgPSByZXNwb25zZS5tZXNzYWdlO1xuICAgICAgICAgICAgICAgICAgICBsZXQgc2VsZWN0b3IgPSAkKCcucmVtb3ZlLWNoYW5uZWwtc3Vic2NyaXB0aW9uW2RhdGEtaWQ9JyArIGlkVXNlciArICddJykucGFyZW50KCdkaXYnKTtcbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coc2VsZWN0b3IpO1xuICAgICAgICAgICAgICAgICAgICBzZWxlY3Rvci5oaWRlKCdmYXN0Jyk7XG4gICAgICAgICAgICAgICAgICAgIGFsZXJ0KG1lc3NhZ2UpO1xuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgLmZhaWwoZnVuY3Rpb24ocmVzcG9uc2UsIHN0YXR1cywgeGhyKXtcbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coIHJlc3BvbnNlLm1lc3NhZ2UpO1xuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgIH1cbiAgICB9KTtcbn0pIl0sInNvdXJjZVJvb3QiOiIifQ==