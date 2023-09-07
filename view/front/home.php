<?php
include 'config.php'; // Assurez-vous que le chemin vers config.php est correct.
include 'controller/ProduitController.php';
session_start();

$user_id = $_SESSION['user_id'];


    
    
    $ProduitController=new ProduitController();
	$listeProduit=$ProduitController->afficherproduit();
  
?>









<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="u-clearfix u-image u-shading u-section-1" id="sec-9e05">
      <div class="u-align-left u-clearfix u-sheet u-sheet-1" align="center"></div>
    </section>
    <section class="u-clearfix u-section-2" id="sec-c1c0">
      <div class="u-clearfix u-sheet u-sheet-1" align="center">
       
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-size-30 u-size-60-md">
                <div class="u-layout-col">
                  <div class="u-container-style u-layout-cell u-left-cell u-size-40 u-layout-cell-1">
                    <div class="u-container-layout">
                      <img class="u-image u-image-1" src="images/R.jpg">
                    </div>
                  </div>
                  
              <div class="u-size-30 u-size-60-md" align="center">
                <div class="u-layout-col">
                  <div class="u-container-style u-layout-cell u-right-cell u-size-20 u-layout-cell-3">
                    
                  </div>
                  <div class="u-container-style u-layout-cell u-right-cell u-size-40 u-layout-cell-4" align="center">
                    
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
              <div class="u-size-30 u-size-60-md" align="center">
                <div class="u-layout-col">
                  <div class="u-container-style u-layout-cell u-left-cell u-size-40 u-layout-cell-3">
                    <div class="u-container-layout">
                      <img class="u-image u-image-3" src="images/events.st.jpg">
                      <img class="u-image u-image-4" src="images/123.jpg">
                    </div>
                  </div>
                  <div class="u-container-style u-layout-cell u-left-cell u-size-20 u-layout-cell-4">
                    <div class="u-container-layout u-container-layout-4">
                      <h2 class="u-custom-font u-font-georgia u-text u-text-2">sports</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="carousel_58f1" class="u-carousel u-slide u-block-b9c3-1" data-u-ride="carousel" data-interval="5000">
      
      
        
       
      
    </section>
    <section class="u-clearfix u-section-7" id="carousel_bfd1">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-20 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-1" align="center">
                <div class="u-container-layout u-container-layout-1">
                  <img class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-1" src="images/123.st.jpg">
                  <img class="u-image u-image-2" src="images/R.st-23.jpg">
                  <h2 class="u-custom-font u-font-georgia u-text u-text-1"></h2>
                  <h5 class="u-text u-text-2"></h5>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-8" id="sec-1bb5">
      <div class="u-clearfix u-expanded-width u-layout-wrap">
        <div class="u-gutter-0 u-layout">
          <div class="u-layout-row">
            <div class="u-container-style u-image u-layout-cell u-left-cell u-size-12 u-size-20-md u-image-1">
              <div class="u-container-layout"></div>
            </div>
            <div class="u-container-style u-image u-layout-cell u-size-12 u-size-20-md u-image-2">
              <div class="u-container-layout"></div>
            </div>
            <div class="u-container-style u-image u-layout-cell u-size-12 u-size-20-md u-image-3">
              <div class="u-container-layout"></div>
            </div>
            <div class="u-container-style u-image u-layout-cell u-size-12 u-size-30-md u-image-4">
              <div class="u-container-layout"></div>
            </div>
            <div class="u-container-style u-image u-layout-cell u-right-cell u-size-12 u-size-30-md u-image-5">
              <div class="u-container-layout"></div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <section class="produit">
   <h1 class="title">Liste des produits</h1>
   <div class="box-container">
      <table>
      <thead>
                        <tr>
                              <th>id_produit</th>
                              <th>nom_produit</th>
                              <th>description</th>
                              <th>image</th>
                              <th>prix</th>
                              <th>categorie</th>
                              <th>user_id</th>
				                     
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach($listeProduit as $produit){
                      ?>
                      <tr>
                      <td><?php echo $produit['nom_produit']; ?></td>
                      <td><?php echo $produit['nom_produit']; ?></td>
                      <td><?php echo $produit['description']; ?></td>
                      <td><?php echo $produit['image']; ?></td>
                      <td><?php echo $produit['prix']; ?></td>
                      <td><?php echo $produit['nom_categorie']; ?></td>
                      <td><?php echo $produit['user_id']; ?></td>
                     <?php } ?>
                       
                      <td>
  
          
         </tbody>
      </table>
   </div>
</section>

<?php include 'footer.php'; ?>








<?php include 'footer.php'; ?>

<script src="../../js/script.js"></script>

</body>







<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>