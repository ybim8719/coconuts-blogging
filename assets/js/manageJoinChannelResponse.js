const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

$(function () {
    $(document).ready(function() {
        const labelAccept = 'label-accept';
        const labelAcceptAnyway = 'label-accept-anyway';
        const labelRefuse = 'label-refuse';
        const labelAccepted = 'label-accepted';
        var visitorId = $('#visitorId').val();
        if  (visitorId === "") {
            console.log('no user id/ visitor can send request for channel');
        }
        $(document).on('click', '.'+ labelAccept , function(){
                if($(this).attr("data-id") !== "") {
                    acceptClientPendingRequest($(this).attr("data-id"), $('#visitorId').val(), labelAccept);
                };
        })

        $(document).on('click', '.'+ labelAcceptAnyway , function(){
                if($(this).attr("data-id") !== "") {
                    acceptClientPendingRequest($(this).attr("data-id"), $('#visitorId').val(), labelAcceptAnyway);
                };
        })

        $(document).on('click', '.'+ labelRefuse , function(){
            if($(this).attr("data-id") !== "") {
                refuseClientPendingRequest($(this).attr("data-id"), $('#visitorId').val(), labelAcceptAnyway);
            };
        })

        function acceptClientPendingRequest(requestId, visitorId, statusLabel) {
            console.log(visitorId)
            console.log(statusLabel)
            console.log(requestId)
            var ajaxPath = "channelSubscriptionRequest_ajaxAcceptChannelSubscriptionRequest";
            $.ajax({
                type: 'POST',
                async: true,
                data: { visitorId : visitorId, statusLabel : statusLabel },
                url: Routing.generate(ajaxPath, {
                    idRequest: requestId
                })
            })
                .done(function(response) {
                    let requestId = response.requestId;
                    let message = response.message;
                    let statusLabel = response.statusLabel;
                    let selector = $('.'+ statusLabel+'[data-id='+requestId+']');
                    let selectorRefuse =  $('.'+ labelRefuse+'[data-id='+requestId+']');
                    if (statusLabel === labelAccept) {
                        selector.hide("fast", "swing");
                        selectorRefuse.hide("fast", "swing");
                    }
                    else {
                        selector.html('Accepté!')
                        selector.removeClass(labelAcceptAnyway)
                        selector.addClass(labelAccepted)
                    }
                    alert(message);
                })
                .fail(function(response, status, xhr){
                    console.log("Une erreur est survenue, action non enregistrée");
                })
        }

        function refuseClientPendingRequest(requestId, visitorId, statusLabel) {
            var ajaxPath = "channelSubscriptionRequest_ajaxRefuseChannelSubscriptionRequest";
            $.ajax({
                type: 'POST',
                async: true,
                data: { visitorId : visitorId, statusLabel : statusLabel },
                url: Routing.generate(ajaxPath, {
                    idRequest: requestId
                })
            })
                .done(function(response) {
                    let requestId = response.requestId;
                    let message = response.message;
                    let selectorAccept = $('.'+ labelAccept+'[data-id='+requestId+']');
                    let selectorRefuse =  $('.'+ labelRefuse+'[data-id='+requestId+']');
                    selectorAccept.hide("fast", "swing");
                    selectorRefuse.hide("fast", "swing");
                    alert(message);
                })
                .fail(function(response, status, xhr){
                    console.log("Une erreur est survenue, action non enregistrée");
                })
        }
    });
})