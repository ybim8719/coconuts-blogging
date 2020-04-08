const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

$(function () {
    $(document).ready(function() {
        $(document).on('click','.toggle-bookmark-article', function(){
            operateAddOrRemoveBookMarkOnArticle($(this).attr('data-article-id'), $(this).attr('data-has-bookmark'));
        })
    });

    function operateAddOrRemoveBookMarkOnArticle(articleId, hasBookmark) {
        var visitorId = $('#visitorId').val();
       // var articleId = $('#articleId').val();
        //var hasBookmark = $('#hasBookmark').val();
        var ajaxPath = "bookmark_ajaxAddBookmarkToArticle";

        if (visitorId === "") {
            console.log('no user id/ cannot bookmark Article');
        }

        else {
            if (hasBookmark === "1") {
                ajaxPath = "bookmark_ajaxRemoveBookmarkFromArticle";
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
                    let isBookmarkedCurrentStatus = response.isBookmarkedCurrentStatus;
                    let modifiedArticleId = response.modifiedArticleId;
                    let bookmarkSelector = $('.toggle-bookmark-article[data-article-id=' + modifiedArticleId + ']');
                    if (isBookmarkedCurrentStatus === true) {
                        //$('#hasBookmark').attr('value', '1')
                        bookmarkSelector.removeClass('far')
                        bookmarkSelector.addClass('fas')
                        bookmarkSelector.attr('data-has-bookmark', '1')
                    }
                    else if (isBookmarkedCurrentStatus === false) {
                        //$('#hasBookmark').attr('value', '0')
                        bookmarkSelector.removeClass('fas')
                        bookmarkSelector.addClass('far')
                        bookmarkSelector.attr('data-has-bookmark', '0')
                    }
                })
                .fail(function(response, status, xhr){
                    console.log("Une erreur est survenue, action non enregistrée");
                })
        }
    }
})