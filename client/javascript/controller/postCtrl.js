$.getScript("javascript/services/serviceHttp.js", function () {

    console.log("servicesHttp.js chargé !");
});


$().ready(function () {
    $("#créé").click(() => {
        var titre = document.getElementById("titre").value;
        var descriptif = document.getElementById("descriptif").value;
        var rubrique = document.getElementById("rubrique").value;
        this.postCtrl.crééPost(titre, descriptif, rubrique);
    });
});

class PostCtrl {
    constructor() {
        this.serviceHttp = new ServiceHttp();

    }
    crééPost(titre, descriptif, rubrique) {
        if (titre != null && descriptif != null && rubrique != null) {
            console.log(titre + " " + descriptif + " " + rubrique)
            this.serviceHttp.crééPost(titre, descriptif, rubrique, function (response) {
                console.log(response);
                let success = response.success;
                let message = response.message;
                if (success) {
                    alert("Vous être à présent connecté");
                } else {
                    alert("la connexion a eu un problème voici le problème : " + message);
                }

            }, function (response) {
                console.log(response);
                let reponse = response.error;
                alert("username ou mot de passe faux => " + reponse);
            });

        }
    }

}