<?php

class ArticleController extends MyFct{
      public function __construct(){

            $action='list';
            extract($_GET);
            switch($action){
                  case 'list':
                        $am=new ArticleManager();
                        $articles=$am->findAll();
                        $file="View/article/list.html.php";
                        /*
                        $variables=[
                              'articles'=>json_encode($article),
                        ];
                        $this->generatePage($file,$variables)
                        */
                        $this->generatePage($file,['articles'=>json_encode($articles)]);
                        break;
            }
            // $file="View/accueil/accueil.html.php";
            // $myFct=new MyFct();
            // $myFct->generatePage($file);
      }
      // ----- Mes méthodes -----
      
}