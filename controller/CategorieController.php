<?php
include '../config.php';
include_once '../Model/Categorie.php';

class CategorieController {
    function affichercategorie() {
        $sql = "SELECT * FROM categorie";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerCategorie($id_categorie) {
        $sql = "DELETE FROM categorie WHERE id_categorie=:id_categorie";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_categorie', $id_categorie);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function ajouterCategorie($categorie) {
        $sql = "INSERT INTO categorie (id_categorie, nom_categorie) 
        VALUES (:id_categorie, :nom_categorie)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_categorie' => $categorie->getId_categorie(),
                'nom_categorie' => $categorie->getNom_categorie()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function recupererCategorie($id_categorie) {
        $sql = "SELECT * FROM categorie WHERE id_categorie=:id_categorie";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_categorie', $id_categorie);
            $query->execute();

            $categorie = $query->fetch();
            return $categorie;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierCategorie($categorie, $id_categorie) {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categorie SET 
                    nom_categorie = :nom_categorie
                WHERE id_categorie = :id_categorie'
            );
            $query->execute([
                'nom_categorie' => $categorie->getNom_categorie(),
                'id_categorie' => $id_categorie
            ]);
            echo $query->rowCount() . " enregistrements mis à jour avec succès <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>
