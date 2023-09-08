<?php
	include ('../Controller/CategorieController.php');
	$categoriecontroller=new categoriecontroller();
	$categoriecontroller->supprimercategorie($_GET["nom_categorie"]);
	header('Location:affichercategorie.php');
?>