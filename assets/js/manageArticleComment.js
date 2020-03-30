const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

$(function () {
    $(document).ready(function() {
        $(document).on('click','#send-comment-action', function(){
            AddArticleComment();
        })

        $(document).on('click','.delete-comment-action', function(){
            var commentId = $( this ).attr('data-id');
            if ( confirm( "Supprimer ce commentaire ?" ) ) {
                removeArticleComment(commentId);
            }
        })
    });

    function AddArticleComment() {
        var visitorId = $('#visitorId').val();
        var articleId = $('#articleId').val();
        var newCommentText = $('#send-comment-input').val();

        if (visitorId === "") {
            console.log('no user id/ cannot like Article');
        }
        else {
            $.ajax({
                type: 'POST',
                async: true,
                data: {
                    visitorId: visitorId,
                    newCommentText : newCommentText
                },
                url: Routing.generate("articleComment_ajaxAddCommentToArticle", {
                    idArticle: articleId
                })
            })
                .done(function(response) {
                    let commentAuthor = response.commentAuthor;
                    let isAuthor = response.isAuthor;
                    let authorUsername = response.authorUsername;
                    let commentId = response.commentId;
                    let hrefPath = $('#visitor-picture').attr("data-href");
                    let imgPath = $('#visitor-picture').attr("src");

                    if (commentAuthor !== null && authorUsername !== null) {
                        // clone a template of html block hidden in DOM
                        let clonedHtml = $("#jquery-hidden-comment-block").clone();
                        // and complete info of this template with the create Comment action
                        clonedHtml.removeAttr('id').attr('data-id', commentId);
                        clonedHtml.find('.comment-username').attr("href", hrefPath).html(authorUsername);
                        clonedHtml.addClass(isAuthor === "false" ? 'user-comment' : "author-comment");
                        clonedHtml.find('.comment-body').html(commentAuthor);
                        clonedHtml.find('.comment-avatar').attr("href", hrefPath);
                        clonedHtml.find('.user-picture').attr("src", imgPath).attr("title", authorUsername);
                        clonedHtml.insertBefore('.write-new');
                    }
                })
                .fail(function(response, status, xhr){
                    console.log("Une erreur est survenue, action non enregistrée");
                })
        }
    }

    function removeArticleComment(idComment) {
        var visitorId = $('#visitorId').val();
        var articleId = $('#articleId').val();

        if (visitorId === "") {
            console.log('no user id/ cannot like Article');
        }
        else {
            $.ajax({
                type: 'POST',
                async: true,
                data: {
                    visitorId: visitorId,
                    articleId : articleId
                },
                url: Routing.generate("articleComment_ajaxRemoveCommentFromArticle", {
                    idComment: idComment
                })
            })
                .done(function(response) {
                    let deletedCommentId = response.deletedCommentId;

                    if (deletedCommentId !== null ) {
                        // find by data-id the comment and remove the entire block from the DOM
                        $('li[data-id ='+ deletedCommentId +' ]').hide();
                    }
                })
                .fail(function(response, status, xhr){
                    console.log("Une erreur est survenue, action non enregistrée");
                })
        }
    }


})