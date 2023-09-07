<!DOCTYPE html>
<html lang="en">



<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>evenement </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />



 

</head>




          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      
 <!-- Light table -->
   

      <!-- partial:../../partials/_sidebar.html -->
      
  
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="affichertemprec.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>evenement</p>
                </a>
              </li>
              
              
            </ul>
          </li>
          
          
      
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">id_event</th>
                    <th scope="col" class="sort" data-sort="budget">nom_event </th>
                    <th scope="col" class="sort" data-sort="status">image</th>
                    <th scope="col" class="sort" data-sort="status">date_event</th>
                    <th scope="col" class="sort" data-sort="completion">time</th>
                    <th scope="col" class="sort" data-sort="completion">nom_categorie</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
<tbody>
<?php //on inclut notre fichier de connection $pdo = Database::connect(); //on se connecte à la base $sql = 'SELECT * FROM user ORDER BY id DESC'; //on formule notre requete foreach ($pdo->query($sql) as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                           include "../controller/crudevenement.php";
                           $evenement = new evenementController();
                           $resultat=$evenement->trierevenement();


                           echo '
<br />
<tr>';
foreach($resultat as $row) {                         
echo'
<td>' . $row['id_event'] . '</td>
<p>
';
      echo'
	  
	  <td>' . $row['nom_event'] . '</td>
	  <p>
	  ';
								  echo'
                            
    <td>' . $row['date_event'] . '</td>
        <p>';
            echo'
                            
      <td>' . $row['time'] . '</td>
       <p>';

       

      
      

          echo '<td>';
         echo '<a class="btn btn-success" href="modifierevenement.php?id_event=' . $row['id_event'] . '">Update</a>';// un autre td pour le bouton d'update
       
                      echo '<a class="btn btn-primary" href="supprimerevenement.php?id_event=' . $row['id_event'] . ' ">Delete</a>';// un autre td pour le bouton de suppression
     
         echo '</td>
        <p>';
       echo '</tr>
       <p>
          ';
}
      
                                                    ?>  
</tbody>

        </div>
  </div>
 


    <!-- /.sidebar -->
  </aside>
  <section class="col-6 col-lg-10 connectedSortable">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">evenement</li>
            </ol>
          </div><!-- /.col -->
          <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="afficherevenement.php" class="btn btn-sm btn-neutral">Retourner sans tri</a>
            </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">La liste des evenements :</h3>
            </div>
           
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>           