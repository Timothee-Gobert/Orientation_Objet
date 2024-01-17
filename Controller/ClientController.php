<?php

class ClientController extends MyFct{
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
                  case 'update':
                        $this->modifierClient($id);
                        break;
                  case 'save' :
                        $this->sauvegarderClient($_POST);
                        break;
                  case 'insert' :
                        $this->insererClient();
                        break;
                  case 'delete' :
                        $this->supprimerClient($id);
                        break;
            }
      }
      function supprimerClient($id){
            $cm=new ClientManager();
            $cm->deleteById($id);
            header("location:client");
            die;
      }
      function insererClient(){
            $variables=[
                  'id'=>'',
                  'numClient'=>'',
                  'nomClient'=>'',
                  'adresseClient'=>'',
                  'disabled'=>'',
            ];
            $file="View/client/form.html.php";
            $this->generatePage($file,$variables);
      }
      function sauvegarderClient($data){
            $cm=new ClientManager();
            $connexion=$cm->connexion();
            extract($data);
            $id=(int) $id; // tranformation de $id en entier du coup si vide -> 0
            if($id!=0){ // cas modification
                  // --- V2
                  $cm->update($data,$id);
                  // --- V1
                  // $sql="update client set numClient=?,nomClient=?,adresseClient=? where id=?";
                  // $requete=$connexion->prepare($sql);
                  // $requete->execute([$numClient,$nomClient,$adressClient,$id]);
            }else{ // cas d'une nouvelle entrer car id = 0
                  // --- V2
                  $cm->insert($data);
                  // --- V1
                  // $sql="insert into client (numClient,nomClient,adresseClient) values (?,?,?)";
                  // $requete=$connexion->prepare($sql);
                  // $requete->execute([$numClient,$nomClient,$adressClient]);
            }
            // reduction vers la page list client
            header("location:client");
      }
      function modifierClient($id){
            $cm=new ClientManager();
            $client=$cm->findById($id);
            $variables=[
                  'id'=>$client->getId(),
                  'numClient'=>$client->getNumClient(),
                  'nomClient'=>$client->getNomClient(),
                  'adresseClient'=>$client->getAdresseClient(),
                  'disabled'=>'',
            ];
            $file="View/client/form.html.php";
            $this->generatePage($file,$variables);
      }
      function afficherClient($id){
            $cm=new ClientManager();
            $client=$cm->findById($id);
            $variables=[
                  'id'=>$client->getId(),
                  'numClient'=>$client->getNumClient(),
                  'nomClient'=>$client->getNomClient(),
                  'adresseClient'=>$client->getAdresseClient(),
                  'disabled'=>'disabled',
            ];
            $file="View/client/form.html.php";
            $this->generatePage($file,$variables);
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
}