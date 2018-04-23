/**
 * Page-specific Javascript file.  Should generally be included as a separate asset bundle in your page template.
 * example: {{ assets.js('js/pages/sign-in-or-register') | raw }}
 *
 * This script depends on validation rules specified in pages/partials/page.js.twig.
 *
 * Target page: dsd/dashboard
 */

var csrf_keyname = site.csrf.name;
var csrf_keysvalue = site.csrf.value;
// Srinivas : adding csrf tokens as Request Params to see if we the POST is validated without a 400 error.
// the chat POST still fails with CSRF error

var botmanWidget = {
    frameEndpoint: '/chat',
    chatServer: '/chat?' + site.csrf.keys.name + '=' + site.csrf.name + '&' + site.csrf.keys.value + '=' + site.csrf.value,
    title: 'BotSevak - BotMan for UF'
};
$("#botSevakForm-main").ufForm({
    validators: {},
    msgTarget: $("#alerts-page")
}).on("submitSuccess.ufForm", function() {
    console.log("Got back from the chat call");
    // Reload the page on success
//    window.location.reload();
});


//    console.log(jQuery('.dataTable').data());
