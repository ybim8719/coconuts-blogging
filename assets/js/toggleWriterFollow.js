const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

$(function () {
    $(document).ready(function() {
        $(document).on('click','.coconuts-toggle-follow', function(){
            operateAddOrRemoveFollowOnWriter();
        })
    });

    function operateAddOrRemoveFollowOnWriter() {
        var visitorId = $('#visitorId').val();
        var writerId = $('#writerId').val();
        var isFollowing = $('#isFollowing').val();
        var ajaxPath = "follow_ajaxAddFollowToWriter";

        if (visitorId === "") {
            console.log('no user id/ visitor cannot follow a writer Article');
        }

        else {
            if (isFollowing === "1") {
                ajaxPath = "follow_ajaxRemoveFollowFromWriter";
            }
            console.log(ajaxPath);

            $.ajax({
                type: 'POST',
                async: true,
                data: { visitorId: visitorId },
                url: Routing.generate(ajaxPath, {
                    idWriter: writerId
                })
            })
                .done(function(response) {
                    let isFollowedCurrentStatus = response.isFollowedCurrentStatus;
                    let followButtonSelector = $('.coconuts-toggle-follow');
                    if (isFollowedCurrentStatus === true) {
                        $('#isFollowing').attr('value', '1')
                        followButtonSelector.removeClass('follow')
                        followButtonSelector.addClass('unfollow')
                        followButtonSelector.html('UnFollow')
                    }
                    else if (isFollowedCurrentStatus === false) {
                        $('#isFollowing').attr('value', '0')
                        followButtonSelector.removeClass('unfollow')
                        followButtonSelector.addClass('follow')
                        followButtonSelector.html('Follow')
                    }
                })
                .fail(function(response, status, xhr){
                    console.log("Une erreur est survenue, action non enregistrée");
                })
        }
    }
})