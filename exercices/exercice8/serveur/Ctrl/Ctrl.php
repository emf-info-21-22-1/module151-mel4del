<?php
require_once("Wrk/Connexion.php");
require_once("Wrk/EquipesDBManager.php");
require_once("Wrk/JoueursDBManager.php");
class Ctrl
{
    public $wrkEquipe = null;
    public $wrkJoueur = null;
    public function __construct()
    {
        $this->wrkEquipe = new EquipesDBManager();
        $this->wrkJoueur = new JoueursDBManager();

    }


   /* public function getJoueur($pkEquipe)
    {
        $listeJoueur = $this->wrk->getJoueursFromDB($pkEquipe);
        echo json_encode($listeJoueur);

    }*/
    public function getEquipe()
    {
        $listeEquipe = $this->wrkEquipe->getEquipes();
        //echo ($listeEquipe);

        echo json_encode($listeEquipe);
    }
    public function getJoueur($equipeID){
        $listeJoueur = $this->wrkJoueur->getJoueurs($equipeID);
        echo json_encode($listeJoueur);
    }
}





?>