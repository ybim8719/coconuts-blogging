const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

$(function () {
    $(document).ready(function() {
        RemoveUnreadStatusFromNotifications();

        function RemoveUnreadStatusFromNotifications() {
            let userId = $('#userId').val();
            let visitorId = $('#visitorId').val();
            if (visitorId === "" || userId === "") {
                console.log('no user id. access shouldnt be valid');
            }
            else {
                var ajaxPath = "notification_ajaxRemoveUnreadFromNotificationForUser";
                var arrayOfIds = [];
                $('.unread-notification').each(function () {
                    arrayOfIds.push((this).getAttribute('data-id'));
                })}

            $.ajax({
                    type: 'POST',
                    async: true,
                    data: {
                        visitorId: visitorId,
                        arrayOfIds: arrayOfIds
                    },
                    url: Routing.generate(ajaxPath, {
                        idUser : userId
                    })
                })
                    .done(function(response) {
                        console.log(response.message);
                    })
                    .fail(function(response, status, xhr){
                        console.log("Une erreur est survenue, action non enregistrée");
                    })
            }
        })
})