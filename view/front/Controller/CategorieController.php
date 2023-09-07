<?php
include '../config2.php';
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
        $sql = "DELETE FROM categorie WHERE nom_categorie=:nom_categorie";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':nom_categorie', $nom_categorie);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function ajouterCategorie($categorie) {
        $sql = "INSERT INTO categorie ( nom_categorie) 
        VALUES ( :nom_categorie)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
               
                'nom_categorie' => $categorie->getNom_categorie()
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function recupererCategorie($id_categorie) {
        $sql = "SELECT * FROM categorie WHERE nom_categorie=:nom_categorie";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':nom_categorie', $nom_categorie);
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
                WHERE nom_categorie = :nom_categorie'
            );
            $query->execute([
                'nom_categorie' => $categorie->getNom_categorie(),
              
            ]);
            echo $query->rowCount() . " enregistrements mis à jour avec succès <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }



    
    public function getCategorieByNom($nomCategorie) {
        // Connectez-vous à votre base de données
        // Remplacez "votre_bd", "votre_utilisateur" et "votre_mot_de_passe" par les informations de votre base de données
        $pdo = config::getConnexion();
        // Préparez la requête SQL pour récupérer la catégorie par son nom
        $query = "SELECT * FROM categorie WHERE nom_categorie = :nom_categorie";

        // Préparez la déclaration SQL
        $stmt = $pdo->prepare($query);

        // Exécutez la requête en liant le paramètre :nom_categorie
        $stmt->bindParam(':nom_categorie', $nomCategorie, PDO::PARAM_STR);

        // Exécutez la requête
        $stmt->execute();

        // Récupérez la catégorie sous forme de tableau associatif
        $categorie = $stmt->fetch(PDO::FETCH_ASSOC);

        // Fermez la connexion à la base de données
        $pdo = null;

        // Vérifiez si une catégorie a été trouvée
        if ($categorie) {
            // Créez un objet Categorie à partir des données de la base de données
            return new Categorie( $categorie['nom_categorie']);
        } else {
            return null; // Aucune catégorie trouvée
        }
    }

    public function getAllCategories() {
        $pdo = config::getConnexion();
        $query = "SELECT nom_categorie FROM categorie"; 
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        
        $categories = array();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = $row['nom_categorie'];
        }
        
        return $categories;
    }
    
    
}
?>
