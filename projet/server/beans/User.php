<?php
class User{
    public $id;
    public $nom;
    public $mdp;
    public $isAdmin;


    public function __construct($id, $nom, $mdp, $isAdmin){
        $this->id = $id;
        $this->nom = $nom;
        $this->mdp = $mdp;
        $this->isAdmin = $isAdmin;
        
    }
}
?>