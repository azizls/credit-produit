<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};
?>

<?php
@include 'config1.php';
 include ('../controller/crudreclamation.php');	

	$reclamationController=new reclamationController();
	$listereclamation = $reclamationController->afficherid($user_id); 	


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
            <div class="col-lg-20 grid-margin stretch-card">
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
				<th>id_recl</th>
				<th>type</th>
				<th>texte_recl</th>
				<th>date</th>
				<th>user id</th>
				
			</tr>
    </thead>
			<?php
      
				foreach($listereclamation as  $reclamation){
			?>
			<tr>
				<td><?php echo  $reclamation['id_recl']; ?></td>
				<td><?php echo  $reclamation['type']; ?></td>
				<td><?php echo  $reclamation['texte_recl']; ?></td>
				<td><?php echo  $reclamation['date']; ?></td>
                <td><?php echo  $reclamation['user_id']; ?></td>
				
			</tr>
			<?php
        }
			?>
		</table>
  

</section>








<?php include 'footer.php'; ?>

<script src="../../js/script.js"></script>

</body>
</html>