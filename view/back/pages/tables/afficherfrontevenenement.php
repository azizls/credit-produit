<?php
	include 'controller/crudevenement.php';
    
    
    $evenementcontroller=new evenementcontroller();
	$listeevenement=$evenementcontroller->afficherevenement();
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



      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic Table</h4>
                  <p class="card-description">
                    Add class <code>.table</code>
                  </p>

                  <body>
                  <form action="../tables/modifierevenement.php" method="POST">
                  <table border="1" align="center">
                  <button><a href="../forms/ajoutertempevenement1.php">ajouter à la liste des évenements</a></button>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                              <th>id_event</th>
                              <th>nom_event</th>
                              <th>image</th>
                              <th>date_event</th>
                              <th>time</th>
				                      <th>nom_categorie</th>
				                      <th>modifier</th>
				                      <th>supprimer</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach($listeevenement as $evenement){
                      ?>
                      <tr>
                      <td><?php echo $evenement['id_event']; ?></td>
                      <td><?php echo $evenement['nom_event']; ?></td>
                      <td><?php echo $evenement['image']; ?></td>
                      <td><?php echo $evenement['date_event']; ?></td>
                      <td><?php echo $evenement['time']; ?></td>
                        <td><?php echo $evenement['nom_categorie']; ?></td>
                       
                       
                        <td>
					<form method="POST" action="modifierevenement.php">
						<input class="btn btn-primary" type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $evenement['id_event']; ?> name="id_event">
					</form>
				</td>
                        <td>
                        <a class="btn btn-danger" href="supprimerevenement.php?id_event=<?php echo $evenement['id_event']; ?>">Supprimer</a>
                        </td>
                      </tr>
                      <?php
				}
			?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
    