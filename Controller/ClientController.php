<?php

class ClientController{
      function __construct(){
            $action='list';
            extract($_GET);
            switch($action){
                  case 'list':
                        $this->listerClient();
                        break;
                  case 'show':
                        $this->afficherClient($id);
                        break;
            }
      }

      function listerClient(){
            $cm=new ClientManager();
            $clients=$cm->findAll();
            $variables=[
                  'lignes'=>$clients,
                  'nbre'=>count($clients),
            ];
            $file="view/client/list.html.php";
            $myFct=new MyFct();
            $myFct->generatePage($file,$variables);
      }
      function afficherClient($id){

      }
}