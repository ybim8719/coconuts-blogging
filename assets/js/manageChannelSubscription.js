const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

$(function () {
    $(document).ready(function() {
        console.log('ready')
        $(document).on('click', '.remove-channel-subscription', function(){
            console.log('ready2')

            if  ($('#visitorId').val() === "") {
                console.log('no user id/ visitor can send request for channel');
            }
            else if  ($('#channelId').val() === "") {
                console.log('no user id/ visitor can send request for channel');
            }
            else {
                if($(this).attr("data-id") !== "") {
                    removeChannelSubscription($(this).attr("data-id"), $('#visitorId').val(), $('#channelId').val());
                };
            }
        })

        function removeChannelSubscription(userId, visitorId, channelId) {
            var ajaxPath = "channelSubscription_ajaxRemoveChannelSubscription";
            $.ajax({
                type: 'POST',
                async: true,
                data: { visitorId : visitorId, userId : userId },
                url: Routing.generate(ajaxPath, {
                    idChannel: channelId
                })
            })
                .done(function(response) {
                    let idUser = response.idUser;
                    let message = response.message;
                    let selector = $('.remove-channel-subscription[data-id=' + idUser + ']').parent('div');
                    console.log(selector);
                    selector.hide('fast');
                    alert(message);
                })
                .fail(function(response, status, xhr){
                    console.log( response.message);
                })
        }
    });
})