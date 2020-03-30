const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

$(function () {
    $(document).ready(function() {
        $(document).on('click','.toggle-like-article', function(){
            operateAddOrRemoveLikeOnArticle();
        })
    });

    function operateAddOrRemoveLikeOnArticle() {
        var visitorId = $('#visitorId').val();
        var articleId = $('#articleId').val();
        var hasLiked = $('#hasLiked').val();
        var ajaxPath = "userLike_ajaxAddLikeToArticle";
        console.log(visitorId)

        if (visitorId === "") {
            console.log('no user id/ cannot like Article');
        }

        else {
            if (hasLiked === "1") {
                ajaxPath = "userLike_ajaxRemoveLikeOfArticle";
            }
            console.log(ajaxPath);

            $.ajax({
                type: 'POST',
                async: true,
                data: { visitorId: visitorId },
                url: Routing.generate(ajaxPath, {
                    idArticle: articleId
                })
            })
                .done(function(response) {
                    let currentNbOfLikes = response.currentNbOfLikes;
                    let hasLikedCurrentStatus = response.hasLikedCurrentStatus;
                    if (currentNbOfLikes !== null) {
                        $('.dynamic-likes-counter-of-article').text(currentNbOfLikes);
                    }
                    if (hasLikedCurrentStatus === true) {
                        $('#hasLiked').attr('value', '1')
                    }
                    else if (hasLikedCurrentStatus === false) {
                        $('#hasLiked').attr('value', '0')
                    }
                    console.log(response.message);
                })
                .fail(function(response, status, xhr){
                    console.log("Une erreur est survenue, action non enregistrée");
                })
        }
    }
})