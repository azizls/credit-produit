<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};
?>

<?php
include 'config3.php';
 include ('../controller/crudreponse.php');	

	$reponseController= new reponseController();
	$listereponse = $reponseController->afficherid($user_id); 	


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

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-14 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                  <p class="card-description">
                   
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                    <html>
	<head></head>
	<body>
 
    <thead>
			<tr>
				
				<th>idrep</th>
				<th>texte_rep</th>
				<th>date</th>
                <th>id_recl</th>
				<th>user id</th>
				
			</tr>
    </thead>
			<?php
      
				foreach($listereponse as  $reponse){
			?>
			<tr>
				<td><?php echo  $reponse['idrep']; ?></td>
				<td><?php echo  $reponse['texte_rep']; ?></td>
				<td><?php echo  $reponse['daterep']; ?></td>
				<td><?php echo  $reponse['id_recl']; ?></td>
                <td><?php echo  $reponse['user_id']; ?></td>
				
			</tr>
			<?php
        }
			?>
		</table>
  

</section>








<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>