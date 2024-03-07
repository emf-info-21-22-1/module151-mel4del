<?php


class Post
{
    private $pk_post;
    private $texte;
    private $titre;
    private $image;
    private $fk_user;
    private $fk_rubrique;

    public function __construct($pkDuPost, string $texteDuPost, string $titreDuPost, $img, $user, $rubrique)
    {
        $this->pk_post = $pkDuPost;
        $this->texte = $texteDuPost;
        $this->titre = $titreDuPost;
        $this->image = $img;
        $this->fk_user = $user;
        $this->fk_rubrique = $rubrique;
    }

    public function getTexte()
    {
        return $this->texte;
    }
    public function setTexte($texte)
    {
        $this->texte = $texte;
    }

    public function getTitre()
    {
        return $this->titre;
    }
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function getPk_post()
    {
        return $this->pk_post;

    }
    public function getUser()
    {
        return $this->fk_user;
    }
    public function setUser($user)
    {
        $this->fk_user = $user;
    }
    public function getRubrique()
    {
        return $this->fk_rubrique;
    }
    public function setRubrique($rubrique)
    {
        $this->fk_rubrique = $rubrique;
    }

}



