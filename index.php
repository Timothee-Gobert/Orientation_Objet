<?php
session_start();
if(!$_SESSION){ //On test si la variable global $_SESSION est encore vide ===> $_SESSION=[];
      $_SESSION['username']='user';
      $_SESSION['roles']=json_encode(['ROLE_USER']);
      $_SESSION['bg_navbar']='bg_red';
}
use App\Service\MyFct;

// require_once("src/Service/extra.php");

// spl_autoload_register('charger'); // charge automatiqument la fonction indiqué en paramètre (ici la fonction 'charger')

require_once("vendor/autoload.php");

$path='accueil';
$path=ucfirst($path)."Controller";
extract($_GET); // generation de variable via les indices de la variable global $_GET (ex : $path, $action, ...)
$nameController="App\\Controller\\".ucfirst($path)."Controller";
$fileController="src/Controller/".ucfirst($path)."Controller.php";

if(file_exists($fileController)){
      $page=new $nameController; // ici on vient donner le paramètre de la fonction charger ???? ////HELP
}else{
      $myFct=new MyFct;
      $file="View/erreur/erreur.html.php";
      $message="Le fichier $fileController n'existe pas!";
      $variables=['message'=>$message];
      $myFct->generatePage($file,$variables); 
}