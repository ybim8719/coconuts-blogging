(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["manageNotificationPage"],{

/***/ "./assets/js/manageNotificationPage.js":
/*!*********************************************!*\
  !*** ./assets/js/manageNotificationPage.js ***!
  \*********************************************/
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
    RemoveUnreadStatusFromNotifications();

    function RemoveUnreadStatusFromNotifications() {
      var userId = $('#userId').val();
      var visitorId = $('#visitorId').val();

      if (visitorId === "" || userId === "") {
        console.log('no user id. access shouldnt be valid');
      } else {
        var ajaxPath = "notification_ajaxRemoveUnreadFromNotificationForUser";
        var arrayOfIds = [];
        $('.unread-notification').each(function () {
          arrayOfIds.push(this.getAttribute('data-id'));
        });
      }

      $.ajax({
        type: 'POST',
        async: true,
        data: {
          visitorId: visitorId,
          arrayOfIds: arrayOfIds
        },
        url: _vendor_friendsofsymfony_jsrouting_bundle_Resources_public_js_router_min_js__WEBPACK_IMPORTED_MODULE_0___default.a.generate(ajaxPath, {
          idUser: userId
        })
      }).done(function (response) {
        console.log(response.message);
      }).fail(function (response, status, xhr) {
        console.log("Une erreur est survenue, action non enregistrée");
      });
    }
  });
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

},[["./assets/js/manageNotificationPage.js","runtime","vendors~app~manageArticleComment~manageChannelSubscription~manageExpandCollapse~manageJoinChannelReq~50916d4e","vendors~manageArticleComment~manageChannelSubscription~manageExpandCollapse~manageJoinChannelRequest~9cfa8c54","manageArticleComment~manageChannelSubscription~manageExpandCollapse~manageJoinChannelRequest~manageJ~47b5ff09"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvbWFuYWdlTm90aWZpY2F0aW9uUGFnZS5qcyJdLCJuYW1lcyI6WyJyb3V0ZXMiLCJyZXF1aXJlIiwiUm91dGluZyIsInNldFJvdXRpbmdEYXRhIiwiJCIsImRvY3VtZW50IiwicmVhZHkiLCJSZW1vdmVVbnJlYWRTdGF0dXNGcm9tTm90aWZpY2F0aW9ucyIsInVzZXJJZCIsInZhbCIsInZpc2l0b3JJZCIsImNvbnNvbGUiLCJsb2ciLCJhamF4UGF0aCIsImFycmF5T2ZJZHMiLCJlYWNoIiwicHVzaCIsImdldEF0dHJpYnV0ZSIsImFqYXgiLCJ0eXBlIiwiYXN5bmMiLCJkYXRhIiwidXJsIiwiZ2VuZXJhdGUiLCJpZFVzZXIiLCJkb25lIiwicmVzcG9uc2UiLCJtZXNzYWdlIiwiZmFpbCIsInN0YXR1cyIsInhociJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7OztBQUFBO0FBQUE7QUFBQTtBQUFBLElBQU1BLE1BQU0sR0FBR0MsbUJBQU8sQ0FBQywwRUFBRCxDQUF0Qjs7QUFDQTtBQUVBQyxrSEFBTyxDQUFDQyxjQUFSLENBQXVCSCxNQUF2QjtBQUVBSSxDQUFDLENBQUMsWUFBWTtBQUNWQSxHQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQVc7QUFDekJDLHVDQUFtQzs7QUFFbkMsYUFBU0EsbUNBQVQsR0FBK0M7QUFDM0MsVUFBSUMsTUFBTSxHQUFHSixDQUFDLENBQUMsU0FBRCxDQUFELENBQWFLLEdBQWIsRUFBYjtBQUNBLFVBQUlDLFNBQVMsR0FBR04sQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQkssR0FBaEIsRUFBaEI7O0FBQ0EsVUFBSUMsU0FBUyxLQUFLLEVBQWQsSUFBb0JGLE1BQU0sS0FBSyxFQUFuQyxFQUF1QztBQUNuQ0csZUFBTyxDQUFDQyxHQUFSLENBQVksc0NBQVo7QUFDSCxPQUZELE1BR0s7QUFDRCxZQUFJQyxRQUFRLEdBQUcsc0RBQWY7QUFDQSxZQUFJQyxVQUFVLEdBQUcsRUFBakI7QUFDQVYsU0FBQyxDQUFDLHNCQUFELENBQUQsQ0FBMEJXLElBQTFCLENBQStCLFlBQVk7QUFDdkNELG9CQUFVLENBQUNFLElBQVgsQ0FBaUIsSUFBRCxDQUFPQyxZQUFQLENBQW9CLFNBQXBCLENBQWhCO0FBQ0gsU0FGRDtBQUVHOztBQUVQYixPQUFDLENBQUNjLElBQUYsQ0FBTztBQUNDQyxZQUFJLEVBQUUsTUFEUDtBQUVDQyxhQUFLLEVBQUUsSUFGUjtBQUdDQyxZQUFJLEVBQUU7QUFDRlgsbUJBQVMsRUFBRUEsU0FEVDtBQUVGSSxvQkFBVSxFQUFFQTtBQUZWLFNBSFA7QUFPQ1EsV0FBRyxFQUFFcEIsa0hBQU8sQ0FBQ3FCLFFBQVIsQ0FBaUJWLFFBQWpCLEVBQTJCO0FBQzVCVyxnQkFBTSxFQUFHaEI7QUFEbUIsU0FBM0I7QUFQTixPQUFQLEVBV1NpQixJQVhULENBV2MsVUFBU0MsUUFBVCxFQUFtQjtBQUNyQmYsZUFBTyxDQUFDQyxHQUFSLENBQVljLFFBQVEsQ0FBQ0MsT0FBckI7QUFDSCxPQWJULEVBY1NDLElBZFQsQ0FjYyxVQUFTRixRQUFULEVBQW1CRyxNQUFuQixFQUEyQkMsR0FBM0IsRUFBK0I7QUFDakNuQixlQUFPLENBQUNDLEdBQVIsQ0FBWSxpREFBWjtBQUNILE9BaEJUO0FBaUJDO0FBQ0osR0FsQ0w7QUFtQ0gsQ0FwQ0EsQ0FBRCxDIiwiZmlsZSI6Im1hbmFnZU5vdGlmaWNhdGlvblBhZ2UuanMiLCJzb3VyY2VzQ29udGVudCI6WyJjb25zdCByb3V0ZXMgPSByZXF1aXJlKCcuLi8uLi9wdWJsaWMvanMvZm9zX2pzX3JvdXRlcy5qc29uJyk7XG5pbXBvcnQgUm91dGluZyBmcm9tICcuLi8uLi92ZW5kb3IvZnJpZW5kc29mc3ltZm9ueS9qc3JvdXRpbmctYnVuZGxlL1Jlc291cmNlcy9wdWJsaWMvanMvcm91dGVyLm1pbi5qcyc7XG5cblJvdXRpbmcuc2V0Um91dGluZ0RhdGEocm91dGVzKTtcblxuJChmdW5jdGlvbiAoKSB7XG4gICAgJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XG4gICAgICAgIFJlbW92ZVVucmVhZFN0YXR1c0Zyb21Ob3RpZmljYXRpb25zKCk7XG5cbiAgICAgICAgZnVuY3Rpb24gUmVtb3ZlVW5yZWFkU3RhdHVzRnJvbU5vdGlmaWNhdGlvbnMoKSB7XG4gICAgICAgICAgICBsZXQgdXNlcklkID0gJCgnI3VzZXJJZCcpLnZhbCgpO1xuICAgICAgICAgICAgbGV0IHZpc2l0b3JJZCA9ICQoJyN2aXNpdG9ySWQnKS52YWwoKTtcbiAgICAgICAgICAgIGlmICh2aXNpdG9ySWQgPT09IFwiXCIgfHwgdXNlcklkID09PSBcIlwiKSB7XG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coJ25vIHVzZXIgaWQuIGFjY2VzcyBzaG91bGRudCBiZSB2YWxpZCcpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAgICAgdmFyIGFqYXhQYXRoID0gXCJub3RpZmljYXRpb25fYWpheFJlbW92ZVVucmVhZEZyb21Ob3RpZmljYXRpb25Gb3JVc2VyXCI7XG4gICAgICAgICAgICAgICAgdmFyIGFycmF5T2ZJZHMgPSBbXTtcbiAgICAgICAgICAgICAgICAkKCcudW5yZWFkLW5vdGlmaWNhdGlvbicpLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICBhcnJheU9mSWRzLnB1c2goKHRoaXMpLmdldEF0dHJpYnV0ZSgnZGF0YS1pZCcpKTtcbiAgICAgICAgICAgICAgICB9KX1cblxuICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICAgICAgdHlwZTogJ1BPU1QnLFxuICAgICAgICAgICAgICAgICAgICBhc3luYzogdHJ1ZSxcbiAgICAgICAgICAgICAgICAgICAgZGF0YToge1xuICAgICAgICAgICAgICAgICAgICAgICAgdmlzaXRvcklkOiB2aXNpdG9ySWQsXG4gICAgICAgICAgICAgICAgICAgICAgICBhcnJheU9mSWRzOiBhcnJheU9mSWRzXG4gICAgICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgICAgIHVybDogUm91dGluZy5nZW5lcmF0ZShhamF4UGF0aCwge1xuICAgICAgICAgICAgICAgICAgICAgICAgaWRVc2VyIDogdXNlcklkXG4gICAgICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICAgICAgfSlcbiAgICAgICAgICAgICAgICAgICAgLmRvbmUoZnVuY3Rpb24ocmVzcG9uc2UpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlc3BvbnNlLm1lc3NhZ2UpO1xuICAgICAgICAgICAgICAgICAgICB9KVxuICAgICAgICAgICAgICAgICAgICAuZmFpbChmdW5jdGlvbihyZXNwb25zZSwgc3RhdHVzLCB4aHIpe1xuICAgICAgICAgICAgICAgICAgICAgICAgY29uc29sZS5sb2coXCJVbmUgZXJyZXVyIGVzdCBzdXJ2ZW51ZSwgYWN0aW9uIG5vbiBlbnJlZ2lzdHLDqWVcIik7XG4gICAgICAgICAgICAgICAgICAgIH0pXG4gICAgICAgICAgICB9XG4gICAgICAgIH0pXG59KSJdLCJzb3VyY2VSb290IjoiIn0=