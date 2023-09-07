<?php
require_once '../config3.php'; // Inclure votre fichier de configuration de base de données
require_once '../model/produit.php'; // Inclure le modèle Produit

class ProduitController {
    public function afficherproduit() {
        $db = config3::getConnexion();
        $sql = "SELECT * FROM produit";
        $result = $db->query($sql);
        return $result;
    }

    public function ajouterProduit($produit) {
        $sql = "INSERT INTO produit (nom_produit, description, image, prix, nom_categorie, user_id) 
                VALUES (:nom_produit, :description, :image, :prix, :nom_categorie, :user_id)";
        $db = config3::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_produit' => $produit->getNomProduit(),
                'description' => $produit->getDescription(),
                'image' => $produit->getImage(),
                'prix' => $produit->getPrix(),
                'nom_categorie' => $produit->getNom_Categorie(),
                'user_id' => $produit->getUser_Id()

            ]);
    
            // Si vous avez besoin de gérer l'upload de l'image, vous pouvez le faire ici.
    
            return true; // Succès
        } catch (PDOException $e) {
            echo 'Erreur PDO : ' . $e->getMessage();
            return false; // Échec
        }
    }
    
    
    function recupererProduit($id) {
        $sql = "SELECT * FROM produit WHERE id_produit=:id";
        $db = config3::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();

            $produit = $query->fetch();
            return $produit;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function recupererProduitAvecCategorie($id) {
        $sql = "SELECT produit.*, categorie.nom_categorie FROM produit
                LEFT JOIN categorie ON produit.nom_categorie = categorie.nom_categorie
                WHERE produit.id_produit = :id";
        $db = config3::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id);
            $query->execute();
    
            $produit = $query->fetch();
            return $produit;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    

    public function modifierProduit($produit, $id_produit) {
        $db = config3::getConnexion();
        $sql = "UPDATE produit 
                SET nom_produit = :nom_produit, description = :description, prix = :prix, image = :image, nom_categorie = :nom_categorie
                WHERE id_produit = :id_produit";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':nom_produit', $produit->getNomProduit());
        $stmt->bindValue(':description', $produit->getDescription());
        $stmt->bindValue(':prix', $produit->getPrix());
        $stmt->bindValue(':image', $produit->getImage());
        $stmt->bindValue(':nom_categorie', $produit->getNomCategorie());
        $stmt->bindValue(':id_produit', $id_produit);

        if ($stmt->execute()) {
            echo "Produit mis à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour du produit.";
        }
    }

    public function supprimerProduit($id) {
        $db = config3::getConnexion();
        $sql = "DELETE FROM produit WHERE id_produit = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id);

        if ($stmt->execute()) {
            echo "Produit supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression du produit.";
        }
    }
}
?>
