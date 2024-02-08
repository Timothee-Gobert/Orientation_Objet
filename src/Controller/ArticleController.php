<?php

namespace App\Controller;
use App\Service\MyFct; 
use App\Model\ArticleManager; 

class ArticleController extends MyFct{
      public function __construct(){

            $action='list';
            extract($_GET);
            switch($action){
                  case 'list':
                        $am=new ArticleManager();
                        $articles=$am->findAll();
                        $file="View/article/list.html.php";
                        $this->generatePage($file,['articles'=>json_encode($articles)]);
                        break;
            }
      }
      // ----- Mes méthodes -----
      
}