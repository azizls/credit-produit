<?php
include '../config.php';
include_once '../Model/Produit.php';

class ProduitC {
    function afficherproduit() {
        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerProduit($id) {
        $sql = "DELETE FROM produit WHERE id_produit=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function ajouterProduit($produit) {
        $sql = "INSERT INTO produit (id_produit, nom_produit, prix, id_categorie) 
        VALUES (:id_produit, :nom_produit, :prix, :id_categorie)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_produit' => $produit->getIdProduit(),
                'nom_produit' => $produit->getNomProduit(),
                'prix' => $produit->getPrix(),
                'nom_categorie' => $produit->getNom_Categorie()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function recupererProduit($id) {
        $sql = "SELECT * FROM produit WHERE id_produit=:id";
        $db = config::getConnexion();
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

    function modifierProduit($produit, $id) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE produit SET 
                    nom_produit = :nom_produit,
                    prix = :prix,
                    id_categorie = :id_categorie
                WHERE id_produit = :id'
            );
            $query->execute([
                'nom_produit' => $produit->getNomProduit(),
                'prix' => $produit->getPrix(),
                'id_categorie' => $produit->getIdCategorie(),
                'id' => $id
            ]);
            echo $query->rowCount() . " enregistrements mis à jour avec succès <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>
