
<?php
include 'config.php'; // Assurez-vous que le chemin vers config.php est correct.
include 'controller/ProduitController.php';
session_start();

$user_id = $_SESSION['user_id'];


    
    
    $ProduitController=new ProduitController();
	$listeProduit=$ProduitController->afficherproduit();
   

$panier = array();
?>

<html lang="en">
<head>
</head>
<body>
<?php
// Inclure les fichiers nécessaires
require_once 'Controller/ProduitController.php';
require_once 'Controller/PanierController.php';

// Initialiser les contrôleurs
$produitController = new ProduitController();
$panierController = new PanierController();


$error = "";
$success = 0;


session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['quantite']) && !empty($_POST['id_produit'])) {
            $id_produit = $_POST['id_produit'];
            $quantite = $_POST['quantite'];

           
            $produit_panier = array(
                'id_produit' => $id_produit,
                'quantite' => $quantite,
                'user_id' => $user_id // Inclure le user_id ici
            );


            $panierController->ajouterAuPanier($produit_panier);

            $success = 1;
        } else {
            $error = "Veuillez remplir tous les champs.";
        }
    }
} else {
    $error = "Session utilisateur non définie. Vous devez être connecté pour ajouter un produit au panier.";
}

?>



<!DOCTYPE html>
<html lang="en">

  <head>

  <script>
    function ajouterAuPanier() {
        var form = document.getElementById('ajouterAuPanierForm');
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajouterpanier.php', true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                // Gérer la réponse du serveur si nécessaire
                alert('Produit ajouté au panier avec succès !');
            } else {
                alert('Erreur lors de l\'ajout au panier.');
            }
        };

        xhr.send(formData);
    }
</script>

<script>
    // Récupérez la référence au menu déroulant
    var triSelect = document.getElementById('tri');

    // Ajoutez un gestionnaire d'événements pour détecter les changements de sélection
    triSelect.addEventListener('change', function() {
        // Récupérez la valeur de l'option sélectionnée
        var selectedOption = triSelect.value;

        // Effectuez une redirection vers trierproduit.php en incluant le critère de tri
        window.location.href = 'trierproduit.php?tri=' + selectedOption;
    });
</script>




    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>shop</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
                           
                            <li class="scroll-to-section"><a href="logout.php">logout</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li> 
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- Ajoutez ceci où vous voulez afficher le champ de recherche et le bouton -->



    <!-- ***** Menu Area Starts ***** -->


    

    <section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="search-box">
                    <form action="chercherproduit.php" method="post">
                        <div class="input-group">
                            <input type="text" name="key" class="form-control" placeholder="Rechercher un produit...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" name="submit">Rechercher</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Menu déroulant pour le tri -->
                <form action="trierproduit.php" method="get">
                    <label for="tri">Trier par :</label>
                    <select id="tri" name="tri" onchange="this.form.submit()">
                        <option value="prix_asc">Prix Croissant</option>
                        <option value="prix_desc">Prix Décroissant</option>
                        <option value="categorie">Catégorie</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php
            $count = 0;
            foreach ($listeProduit as $produit) {
                $image = $produit['image'];
                $chemin_image = '/projet/projet 2A/view/front/image/' . $image;
            ?>
                <div class="col-lg-4">
                    <div class='menu-card'>
                        <div class="menu-card-header">
                            <img src="<?php echo $chemin_image; ?>" alt="<?php echo $produit['nom_produit']; ?>" width="300" height="200" />
                        </div>
                        <div class="menu-card-body">
                            <h3 class="menu-card-title"><?php echo $produit['nom_produit']; ?></h3>
                            <p class="menu-card-description"><?php echo $produit['description']; ?></p>
                            <p class="menu-card-description"><?php echo $produit['nom_categorie']; ?></p>
                            <div class="menu-card-price">$<?php echo $produit['prix']; ?></div>
                        </div>
                        <div class="menu-card-footer">
                            <form method="post" id="ajouterAuPanierForm">
                                <input type="hidden" name="id_produit" value="<?php echo $produit['id_produit']; ?>">
                                <div class="form-group">
                                    <label for="quantite">Quantité:</label>
                                    <input type="number" name="quantite" id="quantite" value="1" min="1">
                                </div>
                                <button type="button" class="btn btn-primary" onclick="ajouterAuPanier()">Ajouter Au Panier</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
                $count++;
                if ($count % 3 == 0) {
                    echo '</div><div class="row">'; // Fermez la ligne actuelle et commencez une nouvelle ligne après chaque troisième produit
                }
            }
            ?>
        </div>
    </div>
</section>







    <!-- ***** Menu Area Ends ***** -->

   

    <!-- ***** Reservation Us Area Starts ***** -->
   
    <!-- ***** Reservation Area Ends ***** -->

    <!-- ***** Menu Area Starts ***** -->
    
    <!-- ***** Chefs Area Ends ***** --> 
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.
                        
                        <br>Design: TemplateMo</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>