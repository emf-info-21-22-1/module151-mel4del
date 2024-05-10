$.getScript("javascript/services/serviceHttp.js", function () {
    console.log("servicesHttp.js chargé !");
});


$().ready(function () {
    const connexionCtrl = new ConnexionCtrl();
    $("#login").click(() => {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        const adminRadio = document.getElementById("admin");
        const userRadio = document.getElementById("user");
        if (adminRadio.checked) {
            connexionCtrl.envoieLoginAdmin(username, password);
        } else if (userRadio.checked) {
            connexionCtrl.envoieLogin(username, password);
        }

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

        if (username != null && password != null) {
            this.serviceHttp.loginUser(username, password, function (response) {
                console.log(response);
                let success = response.success;
                let message = response.message;
                if (success) {
                    alert("Vous être à présent connecté");
                    window.location.href = "https://delatenam01.emf-informatique.ch/151/client/mainVue.html"
                } else {

                    alert("username ou mot de passe faux => " + reponse);
                }

            }, function (response) {
                console.log(response);
                let reponse = response.error;
                alert("la connexion a eu un problème voici le problème : " + reponse);
            });


        }

    }
    registerUser(username, password) {
        if (username != null && password != null) {
            console.log(username + " " + password)
            this
            this.serviceHttp.enregistrerUser(username, password, function (response) {
                console.log(response);
                let success = response.success;
                let message = response.message;
                if (success) {
                    alert("Vous être à présent connecté");
                    window.location.href = "https://delatenam01.emf-informatique.ch/151/client/mainVue.html"

                } else {
                    alert("la connexion a eu un problème voici le problème : " + message);
                }

            }, function (response) {
                console.log(response);
                let reponse = response.error;
                alert("la connexion a eu un problème voici le problème : " + reponse);

            });

        }
    }

    envoieLoginAdmin(username, password) {
        if (username != null && password != null) {
            this.serviceHttp.loginAdmin(username, password, function (response) {
                console.log(response);
                let success = response.success;
                let message = response.message;
                if (success) {
                    alert("Vous être à présent connecté");
                    window.location.href = "https://delatenam01.emf-informatique.ch/151/client/adminVue.html"
                } else {

                    alert("username ou mot de passe faux => " + reponse);
                }

            }, function (response) {
                console.log(response);
                let reponse = response.error;
                alert("la connexion a eu un problème voici le problème : " + reponse);
            });


        }
    }
}




