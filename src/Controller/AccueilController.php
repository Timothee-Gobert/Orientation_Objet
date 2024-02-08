<?php

namespace App\Controller;
use App\Service\MyFct;       // use App\Service\MyFct pour instancier MyFct. Sans cette ligne on aurai du ecrire $myFct=new App\Service\MyFct

class AccueilController{
      public function __construct(){
            $file="View/accueil/accueil.html.php";
            $myFct=new MyFct();
            $myFct->generatePage($file);
      }
      // ----- Mes méthodes -----

}