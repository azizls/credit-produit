<?php
	include ('../controller/ProduitController.php');
	$ProduitController=new ProduitController();
	$ProduitController->supprimerProduit($_GET["id_produit"]);
	header('Location:afficherProduit.php');
?>