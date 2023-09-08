
<?php

@include 'config.php';
include 'Controller/crudwishlist.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['add_to_wishlist'])){

   $id_event = $_POST['id_event'];
   $id_event = filter_var($id_event, FILTER_SANITIZE_STRING);
   //$nom_event = $_POST['nom_event'];
   //$nom_event = filter_var($nom_event, FILTER_SANITIZE_STRING);
   $nom_categorie = $_POST['nom_categorie'];
   $nom_categorie = filter_var($nom_categorie, FILTER_SANITIZE_STRING);
   //$nom_event = $_POST['nom_event'];
   //$nom_event = filter_var($nom_event, FILTER_SANITIZE_STRING);
   $image = $_POST['image'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
  // $nom_categorie = $_POST['nom_categorie'];
   //$nom_categorie = filter_var($nom_categorie, FILTER_SANITIZE_STRING);


   $check_wishlist_numbers = $conn->prepare("SELECT * FROM `evenement` WHERE nom_event = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$nom_event, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE nom_event = ? AND user_id = ?");
   $check_cart_numbers->execute([$nom_event, $user_id]);

   if($check_wishlist_numbers->rowCount() > 0){
      $message[] = 'already added to wishlist!';
   }elseif($check_cart_numbers->rowCount() > 0){
      $message[] = 'already added to cart!';
   }else{
      $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, id_event, nom_event, nom_categorie,nom_event,nom_categorie, image) VALUES(?,?,?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $id_event, $nom_categorie, $nom_categorie,$nom_event,$nom_categorie, $image]);
      $message[] = 'added to wishlist!';
   }

}

if(isset($_POST['add_to_cart'])){
  
   include 'model/cart.php';
   include 'Controller/crudcart.php';
   include 'model/evenement.php';

   
   $error = "";

   // create reponse
   $cartcontroller = null;

   // create an instance of the controller
   $cartcontroller = new cartcontroller();
   if (
       
      
     isset($_POST["nom_event"]) && isset($_POST["date_event"] )) 		
    
     
   
    {
       if (
            
          
        !empty($_POST["nom_event"]) && !empty($_POST["date_event"]) 
            
         
       
       ) {
           $cart = new cart(
              
           
           $_POST['nom_event'],
               $_POST['date_event']
                   
           );
           $cartcontroller-> ajoutercart($evenement);
           header('Location:afficherevenement.php');
       }}
       else{

           $error = "Missing information";
   }

   


   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$nom_event, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'already added to cart!';
   }else{

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE nom_event = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$nom_event, $user_id]);

      if($check_wishlist_numbers->rowCount() > 0){
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE nom_event = ? AND user_id = ?");
         $delete_wishlist->execute([$nom_event, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, id_event, nom_event,date_event,time,image , nom_categorie) VALUES(?,?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $id_event, $nom_event,$date_event,$time,$image , $nom_categorie]);
      $message[] = 'added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shop</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>



<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

   <?php
      $select_evenement = $conn->prepare("SELECT * FROM `evenement`");
      $select_evenement->execute();
      if($select_evenement->rowCount() > 0){
         while($fetch_evenement = $select_evenement->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" class="box" method="POST">
      <div class="price"><span><?= $fetch_evenement['nom_categorie']; ?></span>/-</div>
      <a href="view_page.php?pid=<?= $fetch_evenement['nom_categorie']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_evenement['image']; ?>" alt="">
      <div class="name"><?= $fetch_evenement['nom_event']; ?></div>
      <input type="hidden" name="id_event" value="<?= $fetch_evenement['nom_categorie']; ?>">
      <input type="hidden" name="nom_categorie" value="<?= $fetch_evenement['nom_categorie']; ?>">
      <input type="hidden" name="nom_categorie" value="<?= $fetch_evenement['nom_event']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_evenement['image']; ?>">
      <input type="number" min="1" value="1" name="qty" class="qty">
      <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

</section>








<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>