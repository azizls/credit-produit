<?php
// Inclure le fichier config.php qui gère la connexion à la base de données
include_once '../config3.php';


    session_start();


if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);

    // Filtrer et valider les données
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    // Préparer la requête SQL
    $sql = "SELECT * FROM `users` WHERE email = ? AND password = ?";
    
    // Établir une connexion à la base de données en utilisant la méthode statique de config.php
    $conn = config3::getConnexion();

    // Préparer et exécuter la requête SQL
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email, $pass]);

    // Obtenir le nombre de lignes affectées par la requête
    $rowCount = $stmt->rowCount();

    // Récupérer les données de l'utilisateur
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($rowCount > 0) {
        if ($row['user_type'] == 'admin') {
            // Si l'utilisateur est un admin, définir admin_id dans la session
            $_SESSION['admin_id'] = $row['id'];
            header('Location: http://localhost/projet/projet%202A/view/back/pages/tables/tableU.php');
            exit();
        } elseif ($row['user_type'] == 'fournisseur') {
            // Si l'utilisateur est un utilisateur standard, définir user_id dans la session
            $_SESSION['fournisseur'] = $row['id'];
            // Rediriger vers la page d'accueil des utilisateurs, ajustez l'URL selon votre structure de fichiers
             header('Location: http://localhost/projet/projet%202A/view/back/pages/forms/ajoutertempproduit.php');
            // exit();
        } else {
            $message[] = 'Aucun utilisateur trouvé !';
        }
    } else {
        $message[] = 'Adresse e-mail ou mot de passe incorrect !';
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>
   
<section class="form-container">

   <form action="" method="POST">
      <h3>login now</h3>
      <input type="email" name="email" class="box" placeholder="enter your email" required>
      <input type="password" name="pass" class="box" placeholder="enter your password" required>
      <input type="submit" value="login now" class="btn" name="submit">

   </form>

</section>


</body>
</html>