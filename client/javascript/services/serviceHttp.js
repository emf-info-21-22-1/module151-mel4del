class ServiceHttp {
    loginUser(username, mdp, successCallBack, errorCallBack) {
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "https://delatenam01.emf-informatique.ch/151/server/userEndPoint.php",
            data: {
                "usernameChk": username,
                "passwordChk": mdp,
                "action": "user"
            },
            // xhrFields: {
            //     withCredentials: true
            // },
            contentType: "application/json; charset=utf-16",
            //success: function 
            success: successCallBack,
            error: errorCallBack



        });
    };
    enregistrerUser(username, mdp, successCallBack, errorCallBack) {
        console.log("----------------")
        console.log("Création méthode ajax");
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "https://delatenam01.emf-informatique.ch/151/server/userEndPoint.php?",
            data: {
                "action": "add",
                "username": username,
                "password": mdp,
                "isAdmin": 0
            },
            xhrFields: {
                withCredentials: true
            },
            success: successCallBack,
            error: errorCallBack


        });
    };
    recoitDonneeUser() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "https://delatenam01.emf-informatique.ch/151/server/userEndPoint.php",
            data: {
                "action": "getAll"
            },
            contentType: "application/json; charset=utf-8"
        });
    }

    crééPost(titre, descriptif, rubrique) {
        console.log("----------------")
        console.log("Création méthode ajax");
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "https://delatenam01.emf-informatique.ch/151/server/postEndPoint.php",
            data: {
                "titre": titre,
                "descriptif": descriptif,
                "rubrique": rubrique
            },
            xhrFields: {
                withCredentials: true
            },
            success: successCallBack,
            error: errorCallBack


        });
    };

    loginAdmin(username, mdp, successCallBack, errorCallBack) {
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "https://delatenam01.emf-informatique.ch/151/server/userEndPoint.php",
            data: {
                "usernameChk": username,
                "passwordChk": mdp,
                "action": "admin"
            },
            // xhrFields: {
            //     withCredentials: true
            // },
            contentType: "application/json; charset=utf-8",
            //success: function 
            success: successCallBack,
            error: errorCallBack



        });
    };

    disconnect(nom, successCallBack, errorCallBack) {
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "https://delatenam01.emf-informatique.ch/151/server/userEndPoint.php",
            data: {
                "action": "disconnect",
                "nom": nom
            },
            // xhrFields: {
            //     withCredentials: true
            // },
            contentType: "application/json; charset=utf-8",
            //success: function 
            success: successCallBack,
            error: errorCallBack



        });
    }
}
