<?php
class User
{
    public $id;
    public $nom;
    public $mdp;
    public $isAdmin;


    public function __construct($id, $nom, $mdp, $isAdmin)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->mdp = $mdp;
        $this->isAdmin = $isAdmin;

    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($i)
    {
        $this->id = $i;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($n)
    {
        $this->nom = $n;

    }
    public function getmdp()
    {
        return $this->mdp;
    }
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }
    public function setAdmin($admin)
    {
        $this->isAdmin = $admin;
    }
    public function isAdmin()
    {
        return $this->isAdmin;
    }
}
?>