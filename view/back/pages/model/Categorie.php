<?php  
 
 class Categorie
 {
     private $nom_categorie;
 
     public function __construct($nom_categorie)
     {
         $this->nom_categorie = $nom_categorie;
     }
 
     public function getNom_categorie()
     {
         return $this->nom_categorie;
     }
 
     public function setNom_categorie($nom_categorie)
     {
         $this->nom_categorie = $nom_categorie;
     }
 }
 
?> 