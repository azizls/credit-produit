<?php
	include '../controller/UserC.php';
	$userC=new UserC();
	$userC->supprimerUser($_GET["id"]);
	header('Location:tableU.php');
?>