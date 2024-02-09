<?php
class Equipe implements JsonSerializable
{
    private $id;
    private $nom;

    public function __construct($id, $nom)
    {
        $this->id = $id;
        $this->nom = $nom;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function jsonSerialize(): mixed
    {
        return [
            "id" => $this->getId(),
            'nom' => $this->getNom(),
        ];
    }
    public function setPk($pk){
        $pk = $this->id;
    }
    public function setNom($nom){
        $nom = $this->nom;
    }
}
?>