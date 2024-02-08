<?php

class Article extends ArticleManager{
      private $id;
      private $numArticle;
      private $designation;
      private $prixUnitaire;

      public function __construct($data=[]){
            if($data){ // if($data!=[])
                  foreach($data as $key=>$valeur){
                        $set="set".ucfirst($key); // creation de fonction set (cas où $key='numArticle' alors $set="setNumArticle")
                        if(method_exists($this,$set)){
                              $this->$set($valeur);
                        }
                  }
            }
      }    

      // public function __construct($data){
      //       if($data){ // if($data!=[])  // pour eviter une erreur si tableau vide
      //             $this->setId($data['id']);
      //             $this->setNumArticle($data['NumArticle']);
      //             $this->setDesignation($data['Designation']);
      //             $this->setPrixUnitaire($data['PrixUnitaire']);
      //       }
      // }      

      // ----------sans $data ----------
      // public function __construct(){
            // $this->setId(1);
            // $this->setNumArticle('BB20001');
            // $this->setDesignation("biere");
            // $this->setPrixUnitaire(3.6);
      //}

      /**
       * Get the value of numArticle
       */ 
      public function getNumArticle()
      {
            return $this->numArticle;
      }

      /**
       * Set the value of numArticle
       *
       * @return  self
       */ 
      public function setNumArticle($numArticle)
      {
            $this->numArticle = $numArticle;

            return $this;
      }

      /**
       * Get the value of designation
       */ 
      public function getDesignation()
      {
            return $this->designation;
      }

      /**
       * Set the value of designation
       *
       * @return  self
       */ 
      public function setDesignation($designation)
      {
            $this->designation = $designation;

            return $this;
      }

      /**
       * Get the value of prixUnitaire
       */ 
      public function getPrixUnitaire()
      {
            return $this->prixUnitaire;
      }

      /**
       * Set the value of prixUnitaire
       *
       * @return  self
       */ 
      public function setPrixUnitaire($prixUnitaire)
      {
            $this->prixUnitaire = $prixUnitaire;

            return $this;
      }

      /**
       * Get the value of id
       */ 
      public function getId()
      {
            return $this->id;
      }

      /**
       * Set the value of id
       *
       * @return  self
       */ 
      public function setId($id)
      {
            $this->id = $id;

            return $this;
      }
}