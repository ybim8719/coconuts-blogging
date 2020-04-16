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
    $(document).on('click', '.label-join-channel', function () {
      if ($('#visitorId').val() === "") {
        console.log('no user id/ visitor can send request for channel');
      } else {
        if ($(this).attr("data-id") !== "") {
          sendRequestForChannelSubscription($(this).attr("data-id"), $('#visitorId').val());
        }

        ;
      }
    });

    function sendRequestForChannelSubscription(channelId, visitorId) {
      var ajaxPath = "channelSubscriptionRequest_ajaxSaveChannelSubscriptionRequest";
      $.ajax({
        type: 'POST',
        async: true,
        data: {
          visitorId: visitorId
        },
        url: _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_0___default.a.generate(ajaxPath, {
          idChannel: channelId
        })
      }).done(function (response) {
        var idChannel = response.channelId;
        var selector = $('.label-join-channel[data-id=' + idChannel + ']');
        selector.removeClass('label-join-channel');
        selector.addClass('label-awaiting-channel');
        selector.html('En attente');
        alert('Votre demande a été envoyée aux administateurs de la chaîne, vous recevrez une réponse sous peu.');
      }).fail(function (response, status, xhr) {
        console.log("Une erreur est survenue, action non enregistrée");
      });
    }
  });
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},[["./assets/js/manageJoinChannelRequest.js","runtime","vendors~app~manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageJoinChannelResp~5458eb26","vendors~manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageJoinChannelResponse~a488265d","manageArticleComment~manageExpandCollapse~manageJoinChannelRequest~manageJoinChannelResponse~manageT~ca96a805"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvbWFuYWdlSm9pbkNoYW5uZWxSZXF1ZXN0LmpzIl0sIm5hbWVzIjpbInJvdXRlcyIsInJlcXVpcmUiLCJSb3V0aW5nIiwic2V0Um91dGluZ0RhdGEiLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsIm9uIiwidmFsIiwiY29uc29sZSIsImxvZyIsImF0dHIiLCJzZW5kUmVxdWVzdEZvckNoYW5uZWxTdWJzY3JpcHRpb24iLCJjaGFubmVsSWQiLCJ2aXNpdG9ySWQiLCJhamF4UGF0aCIsImFqYXgiLCJ0eXBlIiwiYXN5bmMiLCJkYXRhIiwidXJsIiwiZ2VuZXJhdGUiLCJpZENoYW5uZWwiLCJkb25lIiwicmVzcG9uc2UiLCJzZWxlY3RvciIsInJlbW92ZUNsYXNzIiwiYWRkQ2xhc3MiLCJodG1sIiwiYWxlcnQiLCJmYWlsIiwic3RhdHVzIiwieGhyIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBQUE7QUFBQTtBQUFBO0FBQUEsSUFBTUEsTUFBTSxHQUFHQyxtQkFBTyxDQUFDLDBFQUFELENBQXRCOztBQUNBO0FBRUFDLGtIQUFPLENBQUNDLGNBQVIsQ0FBdUJILE1BQXZCO0FBRUFJLENBQUMsQ0FBQyxZQUFZO0FBQ1ZBLEdBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVztBQUN6QkYsS0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUUsRUFBWixDQUFlLE9BQWYsRUFBd0IscUJBQXhCLEVBQStDLFlBQVU7QUFDckQsVUFBS0gsQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQkksR0FBaEIsT0FBMEIsRUFBL0IsRUFBbUM7QUFDL0JDLGVBQU8sQ0FBQ0MsR0FBUixDQUFZLGtEQUFaO0FBQ0gsT0FGRCxNQUdLO0FBQ0QsWUFBR04sQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRTyxJQUFSLENBQWEsU0FBYixNQUE0QixFQUEvQixFQUFtQztBQUMvQkMsMkNBQWlDLENBQUNSLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU8sSUFBUixDQUFhLFNBQWIsQ0FBRCxFQUEwQlAsQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQkksR0FBaEIsRUFBMUIsQ0FBakM7QUFDSDs7QUFBQTtBQUNKO0FBQ0osS0FURDs7QUFXQSxhQUFTSSxpQ0FBVCxDQUEyQ0MsU0FBM0MsRUFBc0RDLFNBQXRELEVBQWlFO0FBQzdELFVBQUlDLFFBQVEsR0FBRywrREFBZjtBQUNBWCxPQUFDLENBQUNZLElBQUYsQ0FBTztBQUNIQyxZQUFJLEVBQUUsTUFESDtBQUVIQyxhQUFLLEVBQUUsSUFGSjtBQUdIQyxZQUFJLEVBQUU7QUFBRUwsbUJBQVMsRUFBRUE7QUFBYixTQUhIO0FBSUhNLFdBQUcsRUFBRWxCLGtIQUFPLENBQUNtQixRQUFSLENBQWlCTixRQUFqQixFQUEyQjtBQUM1Qk8sbUJBQVMsRUFBRVQ7QUFEaUIsU0FBM0I7QUFKRixPQUFQLEVBUUNVLElBUkQsQ0FRTSxVQUFTQyxRQUFULEVBQW1CO0FBQ3JCLFlBQUlGLFNBQVMsR0FBR0UsUUFBUSxDQUFDWCxTQUF6QjtBQUNBLFlBQUlZLFFBQVEsR0FBR3JCLENBQUMsQ0FBQyxpQ0FBaUNrQixTQUFqQyxHQUE2QyxHQUE5QyxDQUFoQjtBQUNBRyxnQkFBUSxDQUFDQyxXQUFULENBQXFCLG9CQUFyQjtBQUNBRCxnQkFBUSxDQUFDRSxRQUFULENBQWtCLHdCQUFsQjtBQUNBRixnQkFBUSxDQUFDRyxJQUFULENBQWMsWUFBZDtBQUNBQyxhQUFLLENBQUMsa0dBQUQsQ0FBTDtBQUNILE9BZkQsRUFnQkNDLElBaEJELENBZ0JNLFVBQVNOLFFBQVQsRUFBbUJPLE1BQW5CLEVBQTJCQyxHQUEzQixFQUErQjtBQUNqQ3ZCLGVBQU8sQ0FBQ0MsR0FBUixDQUFZLGlEQUFaO0FBQ0gsT0FsQkQ7QUFtQkg7QUFDSixHQWxDRDtBQW1DSCxDQXBDQSxDQUFELEMiLCJmaWxlIjoibWFuYWdlSm9pbkNoYW5uZWxSZXF1ZXN0LmpzIiwic291cmNlc0NvbnRlbnQiOlsiY29uc3Qgcm91dGVzID0gcmVxdWlyZSgnLi4vLi4vcHVibGljL2pzL2Zvc19qc19yb3V0ZXMuanNvbicpO1xuaW1wb3J0IFJvdXRpbmcgZnJvbSAnLi4vLi4vdmVuZG9yL2ZyaWVuZHNvZnN5bWZvbnkvanNyb3V0aW5nLWJ1bmRsZS9SZXNvdXJjZXMvcHVibGljL2pzL3JvdXRlci5taW4uanMnO1xuXG5Sb3V0aW5nLnNldFJvdXRpbmdEYXRhKHJvdXRlcyk7XG5cbiQoZnVuY3Rpb24gKCkge1xuICAgICQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgICAgICAkKGRvY3VtZW50KS5vbignY2xpY2snLCAnLmxhYmVsLWpvaW4tY2hhbm5lbCcsIGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICBpZiAgKCQoJyN2aXNpdG9ySWQnKS52YWwoKSA9PT0gXCJcIikge1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKCdubyB1c2VyIGlkLyB2aXNpdG9yIGNhbiBzZW5kIHJlcXVlc3QgZm9yIGNoYW5uZWwnKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICAgIGVsc2Uge1xuICAgICAgICAgICAgICAgIGlmKCQodGhpcykuYXR0cihcImRhdGEtaWRcIikgIT09IFwiXCIpIHtcbiAgICAgICAgICAgICAgICAgICAgc2VuZFJlcXVlc3RGb3JDaGFubmVsU3Vic2NyaXB0aW9uKCQodGhpcykuYXR0cihcImRhdGEtaWRcIiksICQoJyN2aXNpdG9ySWQnKS52YWwoKSk7XG4gICAgICAgICAgICAgICAgfTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSlcblxuICAgICAgICBmdW5jdGlvbiBzZW5kUmVxdWVzdEZvckNoYW5uZWxTdWJzY3JpcHRpb24oY2hhbm5lbElkLCB2aXNpdG9ySWQpIHtcbiAgICAgICAgICAgIHZhciBhamF4UGF0aCA9IFwiY2hhbm5lbFN1YnNjcmlwdGlvblJlcXVlc3RfYWpheFNhdmVDaGFubmVsU3Vic2NyaXB0aW9uUmVxdWVzdFwiO1xuICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICB0eXBlOiAnUE9TVCcsXG4gICAgICAgICAgICAgICAgYXN5bmM6IHRydWUsXG4gICAgICAgICAgICAgICAgZGF0YTogeyB2aXNpdG9ySWQ6IHZpc2l0b3JJZCB9LFxuICAgICAgICAgICAgICAgIHVybDogUm91dGluZy5nZW5lcmF0ZShhamF4UGF0aCwge1xuICAgICAgICAgICAgICAgICAgICBpZENoYW5uZWw6IGNoYW5uZWxJZFxuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICB9KVxuICAgICAgICAgICAgLmRvbmUoZnVuY3Rpb24ocmVzcG9uc2UpIHtcbiAgICAgICAgICAgICAgICBsZXQgaWRDaGFubmVsID0gcmVzcG9uc2UuY2hhbm5lbElkO1xuICAgICAgICAgICAgICAgIGxldCBzZWxlY3RvciA9ICQoJy5sYWJlbC1qb2luLWNoYW5uZWxbZGF0YS1pZD0nICsgaWRDaGFubmVsICsgJ10nKTtcbiAgICAgICAgICAgICAgICBzZWxlY3Rvci5yZW1vdmVDbGFzcygnbGFiZWwtam9pbi1jaGFubmVsJyk7XG4gICAgICAgICAgICAgICAgc2VsZWN0b3IuYWRkQ2xhc3MoJ2xhYmVsLWF3YWl0aW5nLWNoYW5uZWwnKTtcbiAgICAgICAgICAgICAgICBzZWxlY3Rvci5odG1sKCdFbiBhdHRlbnRlJyk7XG4gICAgICAgICAgICAgICAgYWxlcnQoJ1ZvdHJlIGRlbWFuZGUgYSDDqXTDqSBlbnZvecOpZSBhdXggYWRtaW5pc3RhdGV1cnMgZGUgbGEgY2hhw65uZSwgdm91cyByZWNldnJleiB1bmUgcsOpcG9uc2Ugc291cyBwZXUuJyk7XG4gICAgICAgICAgICB9KVxuICAgICAgICAgICAgLmZhaWwoZnVuY3Rpb24ocmVzcG9uc2UsIHN0YXR1cywgeGhyKXtcbiAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhcIlVuZSBlcnJldXIgZXN0IHN1cnZlbnVlLCBhY3Rpb24gbm9uIGVucmVnaXN0csOpZVwiKTtcbiAgICAgICAgICAgIH0pXG4gICAgICAgIH1cbiAgICB9KTtcbn0pIl0sInNvdXJjZVJvb3QiOiIifQ==