<?php
class Produit {
  
    protected $nom_produit = null;
    protected $description = null;
    protected $prix = null;
    protected $image = null;
    protected $nom_categorie = null;

    public function __construct( $nom_produit, $prix, $image , $nom_categorie, $description) {
        
        $this->nom_produit = $nom_produit;
        $this->description = $description;
        $this->prix = $prix;
        $this->image = $image;
        $this->nom_categorie = $nom_categorie;
    }

    public function getIdProduit() {
        return $this->id_produit;
    }

    public function getNom_Produit() {
        return $this->nom_produit;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getImage() {
        return $this->image;
    }

    public function getNom_Categorie() {
        return $this->nom_categorie;
    }

    public function setNom_Produit(string $nom_produit) {
        // Ajouter des validations si nécessaire
        $this->nom_produit = $nom_produit;
    }

    public function setDescription(string $description) {
        // Ajouter des validations si nécessaire
        $this->description = $description;
    }

    public function setPrix(float $prix) {
        // Ajouter des validations si nécessaire
        $this->prix = $prix;
    }

    public function setImage(string $image) {
        // Ajouter des validations si nécessaire
        $this->image = $image
        ;
    }

    public function setNom_Categorie(string $nom_categorie) {
        // Ajouter des validations si nécessaire
        $this->nom_categorie = $nom_categorie;
    }
}
?>