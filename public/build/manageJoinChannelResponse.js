(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["manageJoinChannelResponse"],{

/***/ "./assets/js/manageJoinChannelResponse.js":
/*!************************************************!*\
  !*** ./assets/js/manageJoinChannelResponse.js ***!
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
    var labelAccept = 'label-accept';
    var labelAcceptAnyway = 'label-accept-anyway';
    var labelRefuse = 'label-refuse';
    var labelAccepted = 'label-accepted';
    var visitorId = $('#visitorId').val();

    if (visitorId === "") {
      console.log('no user id/ visitor can send request for channel');
    }

    $(document).on('click', '.' + labelAccept, function () {
      if ($(this).attr("data-id") !== "") {
        acceptClientPendingRequest($(this).attr("data-id"), $('#visitorId').val(), labelAccept);
      }

      ;
    });
    $(document).on('click', '.' + labelAcceptAnyway, function () {
      if ($(this).attr("data-id") !== "") {
        acceptClientPendingRequest($(this).attr("data-id"), $('#visitorId').val(), labelAcceptAnyway);
      }

      ;
    });
    $(document).on('click', '.' + labelRefuse, function () {
      if ($(this).attr("data-id") !== "") {
        refuseClientPendingRequest($(this).attr("data-id"), $('#visitorId').val(), labelAcceptAnyway);
      }

      ;
    });

    function acceptClientPendingRequest(requestId, visitorId, statusLabel) {
      console.log(visitorId);
      console.log(statusLabel);
      console.log(requestId);
      var ajaxPath = "channelSubscriptionRequest_ajaxAcceptChannelSubscriptionRequest";
      $.ajax({
        type: 'POST',
        async: true,
        data: {
          visitorId: visitorId,
          statusLabel: statusLabel
        },
        url: _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_0___default.a.generate(ajaxPath, {
          idRequest: requestId
        })
      }).done(function (response) {
        var requestId = response.requestId;
        var message = response.message;
        var statusLabel = response.statusLabel;
        var selector = $('.' + statusLabel + '[data-id=' + requestId + ']');
        var selectorRefuse = $('.' + labelRefuse + '[data-id=' + requestId + ']');

        if (statusLabel === labelAccept) {
          selector.hide("fast", "swing");
          selectorRefuse.hide("fast", "swing");
        } else {
          selector.html('Accepté!');
          selector.removeClass(labelAcceptAnyway);
          selector.addClass(labelAccepted);
        }

        alert(message);
      }).fail(function (response, status, xhr) {
        console.log("Une erreur est survenue, action non enregistrée");
      });
    }

    function refuseClientPendingRequest(requestId, visitorId, statusLabel) {
      var ajaxPath = "channelSubscriptionRequest_ajaxRefuseChannelSubscriptionRequest";
      $.ajax({
        type: 'POST',
        async: true,
        data: {
          visitorId: visitorId,
          statusLabel: statusLabel
        },
        url: _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_0___default.a.generate(ajaxPath, {
          idRequest: requestId
        })
      }).done(function (response) {
        var requestId = response.requestId;
        var message = response.message;
        var selectorAccept = $('.' + labelAccept + '[data-id=' + requestId + ']');
        var selectorRefuse = $('.' + labelRefuse + '[data-id=' + requestId + ']');
        selectorAccept.hide("fast", "swing");
        selectorRefuse.hide("fast", "swing");
        alert(message);
      }).fail(function (response, status, xhr) {
        console.log("Une erreur est survenue, action non enregistrée");
      });
    }
  });
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},[["./assets/js/manageJoinChannelResponse.js","runtime","vendors~app~manageArticleComment~manageChannelSubscription~manageExpandCollapse~manageJoinChannelReq~0c61dbcd","vendors~manageArticleComment~manageChannelSubscription~manageExpandCollapse~manageJoinChannelRequest~913969f7","manageArticleComment~manageChannelSubscription~manageExpandCollapse~manageJoinChannelRequest~manageJ~fa029cbd"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvbWFuYWdlSm9pbkNoYW5uZWxSZXNwb25zZS5qcyJdLCJuYW1lcyI6WyJyb3V0ZXMiLCJyZXF1aXJlIiwiUm91dGluZyIsInNldFJvdXRpbmdEYXRhIiwiJCIsImRvY3VtZW50IiwicmVhZHkiLCJsYWJlbEFjY2VwdCIsImxhYmVsQWNjZXB0QW55d2F5IiwibGFiZWxSZWZ1c2UiLCJsYWJlbEFjY2VwdGVkIiwidmlzaXRvcklkIiwidmFsIiwiY29uc29sZSIsImxvZyIsIm9uIiwiYXR0ciIsImFjY2VwdENsaWVudFBlbmRpbmdSZXF1ZXN0IiwicmVmdXNlQ2xpZW50UGVuZGluZ1JlcXVlc3QiLCJyZXF1ZXN0SWQiLCJzdGF0dXNMYWJlbCIsImFqYXhQYXRoIiwiYWpheCIsInR5cGUiLCJhc3luYyIsImRhdGEiLCJ1cmwiLCJnZW5lcmF0ZSIsImlkUmVxdWVzdCIsImRvbmUiLCJyZXNwb25zZSIsIm1lc3NhZ2UiLCJzZWxlY3RvciIsInNlbGVjdG9yUmVmdXNlIiwiaGlkZSIsImh0bWwiLCJyZW1vdmVDbGFzcyIsImFkZENsYXNzIiwiYWxlcnQiLCJmYWlsIiwic3RhdHVzIiwieGhyIiwic2VsZWN0b3JBY2NlcHQiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7QUFBQTtBQUFBO0FBQUE7QUFBQSxJQUFNQSxNQUFNLEdBQUdDLG1CQUFPLENBQUMsMEVBQUQsQ0FBdEI7O0FBQ0E7QUFFQUMsa0hBQU8sQ0FBQ0MsY0FBUixDQUF1QkgsTUFBdkI7QUFFQUksQ0FBQyxDQUFDLFlBQVk7QUFDVkEsR0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFXO0FBQ3pCLFFBQU1DLFdBQVcsR0FBRyxjQUFwQjtBQUNBLFFBQU1DLGlCQUFpQixHQUFHLHFCQUExQjtBQUNBLFFBQU1DLFdBQVcsR0FBRyxjQUFwQjtBQUNBLFFBQU1DLGFBQWEsR0FBRyxnQkFBdEI7QUFDQSxRQUFJQyxTQUFTLEdBQUdQLENBQUMsQ0FB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Q0EsWUFBSWMsY0FBYyxHQUFJN0IsQ0FBQyxDQUFDLE1BQUtLLFdBQUwsR0FBaUIsV0FBakIsR0FBNkJVLFNBQTdCLEdBQXVDLEdBQXhDLENBQXZCO0FBQ0F1QixzQkFBYyxDQUFDUixJQUFmLENBQW9CLE1BQXBCLEVBQTRCLE9BQTVCO0FBQ0FELHNCQUFjLENBQUNDLElBQWYsQ0FBb0IsTUFBcEIsRUFBNEIsT0FBNUI7QUFDQUksYUFBSyxDQUFDUCxPQUFELENBQUw7QUFDSCxPQWhCTCxFQWlCS1EsSUFqQkwsQ0FpQlUsVUFBU1QsUUFBVCxFQUFtQlUsTUFBbkIsRUFBMkJDLEdBQTNCLEVBQStCO0FBQ2pDNUIsZUFBTyxDQUFDQyxHQUFSLENBQVksaURBQVo7QUFDSCxPQW5CTDtBQW9CSDtBQUNKLEdBckZEO0FBc0ZILENBdkZBLENBQUQsQyIsImZpbGUiOiJtYW5hZ2VKb2luQ2hhbm5lbFJlc3BvbnNlLmpzIiwic291cmNlc0NvbnRlbnQiOlsiY29uc3Qgcm91dGVzID0gcmVxdWlyZSgnLi4vLi4vcHVibGljL2pzL2Zvc19qc19yb3V0ZXMuanNvbicpO1xuaW1wb3J0IFJvdXRpbmcgZnJvbSAnLi4vLi4vdmVuZG9yL2ZyaWVuZHNvZnN5bWZvbnkvanNyb3V0aW5nLWJ1bmRsZS9SZXNvdXJjZXMvcHVibGljL2pzL3JvdXRlci5taW4uanMnO1xuXG5Sb3V0aW5nLnNldFJvdXRpbmdEYXRhKHJvdXRlcyk7XG5cbiQoZnVuY3Rpb24gKCkge1xuICAgICQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgICAgICBjb25zdCBsYWJlbEFjY2VwdCA9ICdsYWJlbC1hY2NlcHQnO1xuICAgICAgICBjb25zdCBsYWJlbEFjY2VwdEFueXdheSA9ICdsYWJlbC1hY2NlcHQtYW55d2F5JztcbiAgICAgICAgY29uc3QgbGFiZWxSZWZ1c2UgPSAnbGFiZWwtcmVmdXNlJztcbiAgICAgICAgY29uc3QgbGFiZWxBY2NlcHRlZCA9ICdsYWJlbC1hY2NlcHRlZCc7XG4gICAgICAgIHZhciB2aXNpdG9ySWQgPSAkKCcjdmlzaXRvcklkJykudmFsKCk7XG4gICAgICAgIGlmICAodmlzaXRvcklkID09PSBcIlwiKSB7XG4gICAgICAgICAgICBjb25zb2xlLmxvZygnbm8gdXNlciBpZC8gdmlzaXRvciBjYW4gc2VuZCByZXF1ZXN0IGZvciBjaGFubmVsJyk7XG4gICAgICAgIH1cbiAgICAgICAgJChkb2N1bWVudCkub24oJ2NsaWNrJywgJy4nKyBsYWJlbEFjY2VwdCAsIGZ1bmN0aW9uKCl7XG4gICAgICAgICAgICAgICAgaWYoJCh0aGlzKS5hdHRyKFwiZGF0YS1pZFwiKSAhPT0gXCJcIikge1xuICAgICAgICAgICAgICAgICAgICBhY2NlcHRDbGllbnRQZW5kaW5nUmVxdWVzdCgkKHRoaXMpLmF0dHIoXCJkYXRhLWlkXCIpLCAkKCcjdmlzaXRvcklkJykudmFsKCksIGxhYmVsQWNjZXB0KTtcbiAgICAgICAgICAgICAgICB9O1xuICAgICAgICB9KVxuXG4gICAgICAgICQoZG9jdW1lbnQpLm9uKCdjbGljaycsICcuJysgbGFiZWxBY2NlcHRBbnl3YXkgLCBmdW5jdGlvbigpe1xuICAgICAgICAgICAgICAgIGlmKCQodGhpcykuYXR0cihcImRhdGEtaWRcIikgIT09IFwiXCIpIHtcbiAgICAgICAgICAgICAgICAgICAgYWNjZXB0Q2xpZW50UGVuZGluZ1JlcXVlc3QoJCh0aGlzKS5hdHRyKFwiZGF0YS1pZFwiKSwgJCgnI3Zpc2l0b3JJZCcpLnZhbCgpLCBsYWJlbEFjY2VwdEFueXdheSk7XG4gICAgICAgICAgICAgICAgfTtcbiAgICAgICAgfSlcblxuICAgICAgICAkKGRvY3VtZW50KS5vbignY2xpY2snLCAnLicrIGxhYmVsUmVmdXNlICwgZnVuY3Rpb24oKXtcbiAgICAgICAgICAgIGlmKCQodGhpcykuYXR0cihcImRhdGEtaWRcIikgIT09IFwiXCIpIHtcbiAgICAgICAgICAgICAgICByZWZ1c2VDbGllbnRQZW5kaW5nUmVxdWVzdCgkKHRoaXMpLmF0dHIoXCJkYXRhLWlkXCIpLCAkKCcjdmlzaXRvcklkJykudmFsKCksIGxhYmVsQWNjZXB0QW55d2F5KTtcbiAgICAgICAgICAgIH07XG4gICAgICAgIH0pXG5cbiAgICAgICAgZnVuY3Rpb24gYWNjZXB0Q2xpZW50UGVuZGluZ1JlcXVlc3QocmVxdWVzdElkLCB2aXNpdG9ySWQsIHN0YXR1c0xhYmVsKSB7XG4gICAgICAgICAgICBjb25zb2xlLmxvZyh2aXNpdG9ySWQpXG4gICAgICAgICAgICBjb25zb2xlLmxvZyhzdGF0dXNMYWJlbClcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlcXVlc3RJZClcbiAgICAgICAgICAgIHZhciBhamF4UGF0aCA9IFwiY2hhbm5lbFN1YnNjcmlwdGlvblJlcXVlc3RfYWpheEFjY2VwdENoYW5uZWxTdWJzY3JpcHRpb25SZXF1ZXN0XCI7XG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIHR5cGU6ICdQT1NUJyxcbiAgICAgICAgICAgICAgICBhc3luYzogdHJ1ZSxcbiAgICAgICAgICAgICAgICBkYXRhOiB7IHZpc2l0b3JJZCA6IHZpc2l0b3JJZCwgc3RhdHVzTGFiZWwgOiBzdGF0dXNMYWJlbCB9LFxuICAgICAgICAgICAgICAgIHVybDogUm91dGluZy5nZW5lcmF0ZShhamF4UGF0aCwge1xuICAgICAgICAgICAgICAgICAgICBpZFJlcXVlc3Q6IHJlcXVlc3RJZFxuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgIC5kb25lKGZ1bmN0aW9uKHJlc3BvbnNlKSB7XG4gICAgICAgICAgICAgICAgICAgIGxldCByZXF1ZXN0SWQgPSByZXNwb25zZS5yZXF1ZXN0SWQ7XG4gICAgICAgICAgICAgICAgICAgIGxldCBtZXNzYWdlID0gcmVzcG9uc2UubWVzc2FnZTtcbiAgICAgICAgICAgICAgICAgICAgbGV0IHN0YXR1c0xhYmVsID0gcmVzcG9uc2Uuc3RhdHVzTGFiZWw7XG4gICAgICAgICAgICAgICAgICAgIGxldCBzZWxlY3RvciA9ICQoJy4nKyBzdGF0dXNMYWJlbCsnW2RhdGEtaWQ9JytyZXF1ZXN0SWQrJ10nKTtcbiAgICAgICAgICAgICAgICAgICAgbGV0IHNlbGVjdG9yUmVmdXNlID0gICQoJy4nKyBsYWJlbFJlZnVzZSsnW2RhdGEtaWQ9JytyZXF1ZXN0SWQrJ10nKTtcbiAgICAgICAgICAgICAgICAgICAgaWYgKHN0YXR1c0xhYmVsID09PSBsYWJlbEFjY2VwdCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0b3IuaGlkZShcImZhc3RcIiwgXCJzd2luZ1wiKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIHNlbGVjdG9yUmVmdXNlLmhpZGUoXCJmYXN0XCIsIFwic3dpbmdcIik7XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBzZWxlY3Rvci5odG1sKCdBY2NlcHTDqSEnKVxuICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0b3IucmVtb3ZlQ2xhc3MobGFiZWxBY2NlcHRBbnl3YXkpXG4gICAgICAgICAgICAgICAgICAgICAgICBzZWxlY3Rvci5hZGRDbGFzcyhsYWJlbEFjY2VwdGVkKVxuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIGFsZXJ0KG1lc3NhZ2UpO1xuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgLmZhaWwoZnVuY3Rpb24ocmVzcG9uc2UsIHN0YXR1cywgeGhyKXtcbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coXCJVbmUgZXJyZXVyIGVzdCBzdXJ2ZW51ZSwgYWN0aW9uIG5vbiBlbnJlZ2lzdHLDqWVcIik7XG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgfVxuXG4gICAgICAgIGZ1bmN0aW9uIHJlZnVzZUNsaWVudFBlbmRpbmdSZXF1ZXN0KHJlcXVlc3RJZCwgdmlzaXRvcklkLCBzdGF0dXNMYWJlbCkge1xuICAgICAgICAgICAgdmFyIGFqYXhQYXRoID0gXCJjaGFubmVsU3Vic2NyaXB0aW9uUmVxdWVzdF9hamF4UmVmdXNlQ2hhbm5lbFN1YnNjcmlwdGlvblJlcXVlc3RcIjtcbiAgICAgICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICAgICAgdHlwZTogJ1BPU1QnLFxuICAgICAgICAgICAgICAgIGFzeW5jOiB0cnVlLFxuICAgICAgICAgICAgICAgIGRhdGE6IHsgdmlzaXRvcklkIDogdmlzaXRvcklkLCBzdGF0dXNMYWJlbCA6IHN0YXR1c0xhYmVsIH0sXG4gICAgICAgICAgICAgICAgdXJsOiBSb3V0aW5nLmdlbmVyYXRlKGFqYXhQYXRoLCB7XG4gICAgICAgICAgICAgICAgICAgIGlkUmVxdWVzdDogcmVxdWVzdElkXG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgLmRvbmUoZnVuY3Rpb24ocmVzcG9uc2UpIHtcbiAgICAgICAgICAgICAgICAgICAgbGV0IHJlcXVlc3RJZCA9IHJlc3BvbnNlLnJlcXVlc3RJZDtcbiAgICAgICAgICAgICAgICAgICAgbGV0IG1lc3NhZ2UgPSByZXNwb25zZS5tZXNzYWdlO1xuICAgICAgICAgICAgICAgICAgICBsZXQgc2VsZWN0b3JBY2NlcHQgPSAkKCcuJysgbGFiZWxBY2NlcHQrJ1tkYXRhLWlkPScrcmVxdWVzdElkKyddJyk7XG4gICAgICAgICAgICAgICAgICAgIGxldCBzZWxlY3RvclJlZnVzZSA9ICAkKCcuJysgbGFiZWxSZWZ1c2UrJ1tkYXRhLWlkPScrcmVxdWVzdElkKyddJyk7XG4gICAgICAgICAgICAgICAgICAgIHNlbGVjdG9yQWNjZXB0LmhpZGUoXCJmYXN0XCIsIFwic3dpbmdcIik7XG4gICAgICAgICAgICAgICAgICAgIHNlbGVjdG9yUmVmdXNlLmhpZGUoXCJmYXN0XCIsIFwic3dpbmdcIik7XG4gICAgICAgICAgICAgICAgICAgIGFsZXJ0KG1lc3NhZ2UpO1xuICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgLmZhaWwoZnVuY3Rpb24ocmVzcG9uc2UsIHN0YXR1cywgeGhyKXtcbiAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coXCJVbmUgZXJyZXVyIGVzdCBzdXJ2ZW51ZSwgYWN0aW9uIG5vbiBlbnJlZ2lzdHLDqWVcIik7XG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgfVxuICAgIH0pO1xufSkiXSwic291cmNlUm9vdCI6IiJ9