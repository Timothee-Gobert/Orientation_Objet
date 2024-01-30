<?php

class ArticleManager extends Manager{
      public function findAllByCondition($dataCondition = [],$order='',$type = 'obj'){
            return $this->findAllByConditionTable('article',$dataCondition,$order,$type);
        }
      public function findOneByCondition($dataCondition = [], $type = 'obj'){
            return $this->findOneByConditionTable('article',$dataCondition,$type);
        }
      public function getDescribe(){
            $resultat=$this->getDescribeTable('article');
            return $resultat;
      }
            //  Version 1
      // public function findById($id){
      //       $resultat=$this->findByIdTable('article',$id);
      //       return $resultat;
      // }
      public function findById($id,$type='array'){
            $resultat=$this->findByIdTable('article',$id);
            if($type!='array'){
                  $obj=new Article($resultat);
                  return $obj;
            }else{
                  return $resultat;
            }
      }
      public function find($id,$type='obj'){
            $resultat=$this->findByIdTable('article',$id);
            if($type=='obj'){
                  $obj=new Article($resultat);
                  return $obj;
            }else{
                  return $resultat;
            }
      }
      public function deleteById($id){
            $this->deleteByIdTable('article',$id);
      }
      public function findAll(){
            $resultat=$this->listTable('article');
            return $resultat;
      }
      public function statisticVente(){

      }
}