import * as serviceHttp from './services/serviceHttp.js';

function envoyeNouveauUser(data, text, jqXHR){
    var cmbNom = doc
}

$(document).ready(function(){
    var butCo = $("#register");
    var nom = $("#nom");
    var mdp = $("#register_password");
    var user = '';

    $.getScript("javascript/beans/user.js", function (){
        console.log("user.js chargé");
    $.getScript("javascript/services/serviceHttp.js", function(){
        console.log("service chargé")
    })



        butCo.on('click', function(){
            let envoieDonnee = {nom, mdp};
            serviceHttp.envoieDonnee(envoieDonnee);
        });
    })

});