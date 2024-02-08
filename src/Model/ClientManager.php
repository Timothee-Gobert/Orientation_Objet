<?php

namespace App\Model;
use App\Model\Manager;

class ClientManager extends Manager{
      public function findAllByCondition($dataCondition = [],$order='',$type = 'obj'){
            return $this->findAllByConditionTable('client',$dataCondition,$order,$type);
        }
      public function findOneByCondition($dataCondition = [], $type = 'obj'){
            return $this->findOneByConditionTable('client',$dataCondition,$type);
        }
      public function search($columnLikes,$mot){
            return $this->searchTable('client',$columnLikes,$mot);
      }
      public function update($data,$id){
            $this->updateTable('client',$data,$id);                      
      }
      public function insert($data){
            $this->insertTable('client',$data);
      }
      public function getDescribe(){
            $resultat=$this->getDescribeTable('client');
            return $resultat;
      }
            //  Version 1
      // public function findById($id){
      //       $resultat=$this->findByIdTable('client',$id);
      //       return $resultat;
      // }

            //  Version 2
      // public function findById($id,$type='array'){
      //       $resultat=$this->findByIdTable('client',$id);
      //       if($type!='array'){
      //             $obj=new client($resultat);
      //             return $obj;
      //       }else{
      //             return $resultat;
      //       }
      // }

      public function findById($id,$type='obj'){
            $resultat=$this->findByIdTable('client',$id);
            if($type=="obj"){
                  $objet=new Client($resultat);
                  return $objet;
            }else{
                  return $resultat;
            }
      }
      public function find($id,$type='obj'){
            $resultat=$this->findByIdTable('client',$id);
            if($type=='obj'){
                  $obj=new Client($resultat);
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