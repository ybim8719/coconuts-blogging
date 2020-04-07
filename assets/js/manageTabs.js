const routes = require('../../public/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';

Routing.setRoutingData(routes);

$(function () {
    $(document).ready(function() {
        console.log("manageTabs ok");
        $(document).on('click','.tab-button', function(){
            if ($(this).attr('id') !== "" && $(this).data('type') !== "") {
                modifyTab($(this).attr('id'), $(this).data('type'));
            }
            else {
                console.log("la tab que vous souhaitez afficher n'a pas d'ID ou de type")
            }
        })
    });

    function modifyTab(tabToEnableId, typeOfTab) {
        //tabs buttons are modified
        $('button[data-type='+ typeOfTab +']').each(function() {
            if ($(this).attr('id') === tabToEnableId) {
                $(this).removeClass('coconuts-inactive');
                $(this).addClass('coconuts-active');
            }else {
                $(this).removeClass('coconuts-active');
                $(this).addClass('coconuts-inactive');
            }
        })

        //tabs body are displayed or hidden
        $('div[data-type='+ typeOfTab +']').each(function() {
            $(this).addClass('coconuts-hide');
        })
        $('div #'+tabToEnableId).removeClass('coconuts-hide');
        console.log('tab modified ')
    }
})