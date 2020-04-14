const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

$(function () {
    $(document).ready(function() {
        $(document).on('click','.toggle-like-article', function(){
            console.log($(this).attr('data-has-liked'));
            operateAddOrRemoveLikeOnArticle($(this).attr('data-article-id'), $(this).attr('data-has-liked'));
        })
    });

    function operateAddOrRemoveLikeOnArticle(articleId, hasLiked) {
        console.log("article id : " + articleId );
        console.log("has liked is : " + hasLiked );
        console.log(typeof hasLiked);

        var visitorId = $('#visitorId').val();
        //var articleId = $('#articleId').val();
        //var hasLiked = $('#hasLiked').val();
        var ajaxPath = "userLike_ajaxAddLikeToArticle";
        console.log('visitor id is ' + visitorId)

        if (visitorId === "") {
            console.log('no user id/ cannot like Article');
        }

        else {
            if (hasLiked === "true") {
                console.log('changed for remove like')
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
                    let modifiedArticleId = response.modifiedArticleId;
                    let heartSelector = $('.toggle-like-article[data-article-id=' + modifiedArticleId + ']');
                    if (currentNbOfLikes !== null) {
                        $('.dynamic-likes-counter-of-article[data-article-id=' + modifiedArticleId + ']').text(currentNbOfLikes);
                    }
                    console.log(heartSelector);
                    if (hasLikedCurrentStatus === true) {
                        //$('#hasLiked').attr('value', '1')
                        console.log("output is true")
                        heartSelector.removeClass('far')
                        heartSelector.addClass('fas')
                        heartSelector.attr('data-has-liked', 'true')
                    }
                    else if (hasLikedCurrentStatus === false) {
                        console.log("output is false")

                        //$('#hasLiked').attr('value', '0')
                        heartSelector.addClass('far')
                        heartSelector.removeClass('fas')
                        heartSelector.attr('data-has-liked', 'false')

                    }
                    console.log(response.message);
                })
                .fail(function(response, status, xhr){
                    console.log("Une erreur est survenue, action non enregistrée");
                })
        }
    }
})