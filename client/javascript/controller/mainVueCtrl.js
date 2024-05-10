// Charger serviceHttp.js avant d'instancier MainVue
$.getScript("javascript/services/serviceHttp.js", function () {
    console.log("servicesHttp.js chargé !");
});
// Attendre que le script soit chargé avant de créer MainVue
$().ready(function () {
    const mainVue = new MainVueCtrl();
    $("#disconnect").click(() => {
        const UserConnected = sessionStorage.getItem('username');
        mainVue. disconnect(UserConnected);
    });
});
class MainVueCtrl {
    constructor() {
        this.serviceHttp = new ServiceHttp();
    }
    disconnect(nom) {

        this.serviceHttp.disconnect(nom, function (response) {

            let success = response.success;
            let message = response.message;
            if (success) {
                alert("Vous être à présent déconnecté");
                window.location.href = "https://delatenam01.emf-informatique.ch/151/client/connexion.html"
            } else {
                alert("Problème lors de la déconnexion  => " + reponse);
            }

        }, function (response) {
            console.log(response);
            let reponse = response.error;
            alert("Déconnexion impossible: " + reponse);
        });


    }

}