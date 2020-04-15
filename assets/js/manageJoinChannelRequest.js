const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

$(function () {
    $(document).ready(function() {
        $(document).on('click', '.label-join-channel', function(){
            if  ($('#visitorId').val() === "") {
                console.log('no user id/ visitor can send request for channel');
            }
            else {
                if($(this).attr("data-id") !== "") {
                    sendRequestForChannelSubscription($(this).attr("data-id"), $('#visitorId').val());
                };
            }
        })

        function sendRequestForChannelSubscription(channelId, visitorId) {
            var ajaxPath = "channelSubscriptionRequest_ajaxSaveChannelSubscriptionRequest";
            $.ajax({
                type: 'POST',
                async: true,
                data: { visitorId: visitorId },
                url: Routing.generate(ajaxPath, {
                    idChannel: channelId
                })
            })
            .done(function(response) {
                let idChannel = response.channelId;
                let selector = $('.label-join-channel[data-id=' + idChannel + ']');
                selector.removeClass('label-join-channel');
                selector.addClass('label-awaiting-channel');
                selector.html('En attente');
                alert('Votre demande a été envoyée aux administateurs de la chaîne, vous recevrez une réponse sous peu.');
            })
            .fail(function(response, status, xhr){
                console.log("Une erreur est survenue, action non enregistrée");
            })
        }
    });
})