<?php
$date = new DateTime;
echo $date->format('d/m/Y');
echo '<br>';
echo $date->modify("+1 day")->format('d/m/Y');
echo '<br>';
echo '=====================================nouvelle partie===================================';
echo "<br>";
class Arbre
{
    public int $taille = 0;
    public string $nom = "";

    public function getNom(): string
    {
        return $this->nom;
    }
    public function getTaille(): int
    {
        return $this->taille;
    }

}



echo "<br>";
$arbre = new arbre;
$arbre->nom = "bouleau";
$arbre->taille = 12;
echo ("ceci est un " . $arbre->getNom() . " qui fait " . $arbre->getTaille() . " mètres");

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "===================EXERCICE  6 =======================";


include_once('membre.php');

$membre = new Membre('Théo', 20);
$nom = $membre->getNom();
$numero = $membre->numero;

echo 'Un nouveau membre! Nom: ' . $nom . ', son âge: ' . $numero ."";

?>