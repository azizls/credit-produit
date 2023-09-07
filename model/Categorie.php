<?php
	class Categorie{
		private $id_categorie=null;
		private $nom_categorie=null;
		
		
		
		function __construct($id_categorie, $nom_categorie){
			$this->id_categorie=$id_categorie;
			$this->nom_categorie=$nom_categorie;
			
		}
		function getId_categorie(){
			return $this->id_categorie;
		}
		function getNom_categorie(){
			return $this->nom_categorie;
		}
		
		
        
        
        function setNom_categorie(string $nom_categorie){
			$this->nom_categorie=$nom_categorie;
		}
		
		
	}


?>