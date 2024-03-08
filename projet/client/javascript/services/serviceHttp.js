class ServiceHttp {
      loginUser(username, mdp, successCallBack, errorCallBack) {
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "http://localhost:8081/server/userEndPoint.php",
            data: {
                "usernameChk": username,
                "passwordChk": mdp
            },
            xhrFields: {
                withCredentials: true
            },
            contentType: "application/json; charset=utf-8",
            //success: function 
            success: successCallBack,
            error: errorCallBack



        });
    };
    enregistrerUser(username, mdp, successCallBack, errorCallBack) {
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "http://localhost:8081/server/userEndPoint.php",
            data: {
                "username": username,
                "password": mdp,
                "isAdmin": 0
            },
            xhrFields: {
                withCredentials: true
            },
            contentType: "application/json; charset=utf-8",
            success: successCallBack,
            error: errorCallBack


        });
    };
    recoitDonneeUser(data) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "http://localhost:8081/server/userEndPoint.php",
            data: JSON.stringify(data),
            contentType: "application/json; charset=utf-8"
        });
    }
}