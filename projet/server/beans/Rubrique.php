<?php

class Rubrique
{
    public $id;


    public $nom;




    public function __construct($id, $nom)
    {
        $this->id = $id;
        $this->nom = $nom;
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
}