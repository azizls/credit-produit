<?php
class Produit {
    private $id_produit;
    private $nom_produit;
    private $description;
    private $image;
    private $prix;
    private $nom_categorie;
    private $user_id;

    public function __construct($id_produit, $nom_produit, $description, $image, $prix, $nom_categorie, $user_id) {
        $this->id_produit = $id_produit;
        $this->nom_produit = $nom_produit;
        $this->description = $description;
        $this->image = $image;
        $this->prix = $prix;
        $this->nom_categorie = $nom_categorie;
        $this->user_id = $user_id;
    }

    public function __construct1( $nom_produit, $description, $image, $prix, $nom_categorie, $user_id) {
  
        $this->nom_produit = $nom_produit;
        $this->description = $description;
        $this->image = $image;
        $this->prix = $prix;
        $this->nom_categorie = $nom_categorie;
        $this->user_id = $user_id;
    }

    public function getIdProduit() {
        return $this->id_produit;
    }

    public function getNomProduit() {
        return $this->nom_produit;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage() {
        return $this->image;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getNom_Categorie() {
        return $this->nom_categorie;
    }

    public function getUser_Id() {
        return $this->user_id;
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
    // Vous devrez ajouter les méthodes setter appropriées pour définir les valeurs de ces propriétés
}

?>