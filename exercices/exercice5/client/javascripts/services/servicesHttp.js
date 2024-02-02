/*
 * Couche de services HTTP (worker).
 *
 * @author Olivier Neuhaus
 * @version 1.0 / 20-SEP-2013
 */

var BASE_URL = "https://delatenam01.emf-informatique.ch/151/ex5/joueurs.php";

/**
 * Fonction permettant de charger les données d'équipe.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function chargerTeam(successCallback, errorCallback) {
    $.ajax({
        type: "GET",
        dataType: "xml",
        url: BASE_URL,
        data: 'action=equipe',
        success: successCallback,
        error: errorCallback
    });
}


/**
 * Fonction permettant de charger les données d'équipe.
 * @param {type} teamid, id de l'équipe dans laquelle trouver les joueurs
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function chargerPlayers(teamid, successCallback, errorCallback) {
    $.ajax({
        type: "GET",
        dataType: "xml",
        url: BASE_URL,
        data: 'action=joueur&equipeId=' + teamid,
        success: successCallback,
        error: errorCallback
    });
}