const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

$(function () {
    $(document).ready(function() {
        hideAllArticles();
        $(document).on('click','.trigger-collapse-articles', function(){
            if ($(this).attr('data-id') !== "") {
                toggleContent($(this).attr('data-id'), $(this));
            }
            else {
                console.log("le contenu que vous souhaitez afficher n'a pas d'ID ou de type")
            }
        })
    });

    function hideAllArticles() {
        let allArticles = $('.content-to-collapse');
        allArticles.each(function() {
            $(this).hide();
        })
    }

    function toggleContent(contentToTriggerId, selector) {
        const iconExpand = "/images/icons/iconfinder_expand2_308964.png";
        const iconCollapse = "/images/icons/iconfinder_collapse2_308968.png";
        let element = $('.content-to-collapse[data-id='+ contentToTriggerId + ']');
        if ($(element).is(":visible")) {
            element.hide("fast", "swing");
            selector.attr("src", iconExpand);
        } else {
            element.show("fast", "swing");
            selector.attr("src", iconCollapse);
        }
    }
})