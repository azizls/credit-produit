<?php

@include 'config.php';
@include 'config1.php';
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};


include '../model/reclamation.php';
    include_once '../controller/crudreclamation.php';
    
    $error = "";

    // create reclamation
    $reclamationController = null;

    // create an instance of the controller
    $reclamationController = new reclamationController();
    if (
        
        isset($_POST["type"]) &&
		isset($_POST["texte_recl"]) 		
     
		
    
    ) {
        if (
           
            !empty($_POST["type"]) && 
			!empty($_POST["texte_recl"]) 
             
			 
        
        ) {
            $reclamation = new reclamation(
            
                $_POST['type'],
				$_POST['texte_recl'],
            $user_id
                    
            );
            $reclamationController-> ajouterreclamation($reclamation);
           // header('Location:../views/affichertemprec.php');
           $message[] = 'sent message successfully!';
        }}
        else{

            $error = "Missing information";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta type="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="contact">

   <h1 class="title">get in touch</h1>

   <form action="" method="POST">
   <select name="type" >
         <option value="probléme technique"  class="box" name="type">probléme technique</option>
         <option value="probléme commercial"  class="box" name="type">probléme commercial</option>
         <option value="autre probléme"  class="box" name="type">autre probléme</option>
      </select>

      
      <input type="texte_recl" name="texte_recl" class="box" required placeholder="enter your texte_recl">
      <input type="submit" value="send message" class="btn" type="send">
   </form>

</section>








<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>