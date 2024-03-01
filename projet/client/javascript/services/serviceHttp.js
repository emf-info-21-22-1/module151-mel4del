

function envoieDonneeUser(data) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "http://localhost:8081/server/userEndPoint.php",
        data: JSON.stringify(data),
        contentType: "application/json; charset=utf-8",
        //success: function 

    

    });
};
function recoitDonneeUser(data){
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "http://localhost:8081/server/userEndPoint.php",
        data: JSON.stringify(data),
        contentType: "application/json; charset=utf-8"
    });
}
