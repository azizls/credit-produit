<?php  
 
class wishlist{
    // table fields 
    private $id=null;
    private $id_event=null; 
    private $nom_event=null; 
    private $image=null;
    private $date_event=null;
    private $time=null;  
    private $nom_categorie=null;
    private $id_organisteur=null;  
    
    // message string  
      
    // constructor set default value  
    function __construct($id_event,$nom_event,$image,$date_event,$time,$nom_categorie)  
    {  
        $this->id_event=$id_event;
            $this->nom_event=$nom_event;
            $this->image=$image;
			$this->date_event=$date_event;
            $this->time=$time;
			$this->nom_categorie=$nom_categorie;
			
    }  

    function getid(){
        return $this->id;
    }

    function getid_event(){
        return $this->id_event;
    }
    function getnom_event(){
        return $this->nom_event;
    }
    function getimage(){
        return $this->image;
    }
    function getdate_event(){
        return $this->date_event;
    }
    function gettime(){
        return $this->time;
    }
    function getnom_categorie(){
        return $this->nom_categorie;
    }
    function getid_organisteur(){
        return $this->id_user;
    }
   
    
    
    function setid(string $id){
        $this->id=$id;
    }

    function setid_event(string $id_event){
        $this->id_event=$id_event;
    }
    function setnom_event(string $nom_event){
        $this->nom_event=$nom_event;
    }
    function setimage(string $image){
        $this->image=$image;
    }
    function setdate_event(string $date_event){
        $this->date_event=$date_event;
    }
    function settime(string $time){
        $this->time=$time;
    }
    
    function setnom_categorie(string $nom_categorie){
        $this->nom_categorie=$nom_categorie;
    } 
  
    
    
}
?>