$.getScript("javascript/services/serviceHttp.js", function () {

    console.log("servicesHttp.js chargé !");
});


$().ready(function () {
    const connexionCtrl = new ConnexionCtrl();  
    $("#login").click(() => {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        connexionCtrl.envoieLogin(username, password);
    });

    $("#register").click(() => {
        const connexionCtrl = new ConnexionCtrl();
        var username = document.getElementById("register_username").value;
        var password = document.getElementById("register_password").value;
        var verifMDP = document.getElementById("confirm_password").value;
        if (verifMDP == password) {
            connexionCtrl.registerUser(username, password);
        } else {
            alert("les mots de passe ne correspondent pas");
        }
    })
});


class ConnexionCtrl {
    constructor() {
        this.serviceHttp = new ServiceHttp();
    }


    envoieLogin(username, password) {

        if (username = ! null && password != null) {
            this.serviceHttp.loginUser(username, password, function (response) {
                console.log(response);
                let success = response.success;
                let message = response.message;
                if (success) {
                    alert("Vous être à présent connecté");
                } else {
                    alert("la connexion a eu un problème voici le problème : " + message);
                }

            }, function (response) {
                let reponse = response.error;
                alert("username ou mot de passe faux => "+reponse);
            });


        }

    }
    registerUser(username, password) {
        if (username = ! null && password != null) {
            this.serviceHttp.enregistrerUser(username, password, function (response) {
                console.log(response);
                let success = response.success;
                let message = response.message;
                if (success) {
                    alert("Vous être à présent connecté");
                } else {
                    alert("la connexion a eu un problème voici le problème : " + message);
                }

            }, function (response) {
                let reponse = response.error;
                alert("username ou mot de passe faux => "+reponse);
            });

        }
    }

}
