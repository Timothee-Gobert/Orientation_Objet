<?php

class ClientManager extends Manager{
      public function getDescribe(){
            $resultat=$this->getDescribeTable('client');
            return $resultat;
      }
            //  Version 1
      // public function findById($id){
      //       $resultat=$this->findByIdTable('client',$id);
      //       return $resultat;
      // }
      public function findById($id,$type='array'){
            $resultat=$this->findByIdTable('client',$id);
            if($type!='array'){
                  $obj=new client($resultat);
                  return $obj;
            }else{
                  return $resultat;
            }
      }
      public function find($id,$type='obj'){
            $resultat=$this->findByIdTable('client',$id);
            if($type=='obj'){
                  $obj=new client($resultat);
                  return $obj;
            }else{
                  return $resultat;
            }
      }
      public function deleteById($id){
            $this->deleteByIdTable('client',$id);
      }
      public function findAll(){
            $resultat=$this->listTable('client');
            return $resultat;
      }
      public function statisticVente(){

      }
}