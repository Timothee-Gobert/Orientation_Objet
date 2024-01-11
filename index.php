<?php

require_once("./Service/extra.php");

spl_autoload_register('charger'); // charge automatiqument la fonction indiqué en paramètre (ici la fonction 'charger')

$path='accueil';
extract($_GET); // generation de variable via les indices de la variable global $_GET (ex : $path, $action, ...)
$nameController=ucfirst($path)."Controller";
$fileController="Controller/$nameController.php";
if(file_exists($fileController)){
      $page=new $nameController();
}else{
      echo "Le fichier $nameController n'existe pas. ";
}

//// Partie test 5

// $am=new ArticleManager();
// $id=2;
// $article_assoc=$am->find($id,'array');
// $article_obj=$am->find($id,'obj');
// printr($article_assoc);
// printr($article_obj);
// // aficher la designation de $article_assoc
// echo $article_assoc['designation'] . '<br>';
// // afficher la designation de $article_obj
// echo $article_obj->getDesignation(); // c'est faux d'écrire article_obj['designation']

/////// Partie test 4

// $article=new Article();
// $articles=$article->findAll();

/////////// print ////////

//// Version simple
// printr($articles); // extra

//// Version dans myFCT classique
//$myFct=new MyFct;
//$myFct->cprintr($articles);

//// Version dans myFct sans instancier
//MyFct::sprintr($articles); // les deux deux point font appelle a une fonction static

/////// partie test 3
// $manager=new Manager();
// $article=$manager->findByIdTable("article",2);
// printr($article);
// $art=new Article();
// $art=$art->findByIdTable("article",4);
// printr($art);

////// partie test 2
// $myFct=new MyFct();
// $article=$myFct->findByIdTable('article',2);
// $articles=$myFct->listTable('article');
// $myFct->printr($article);

////// partie test
// $art=[
//       'id'=>2,
//       'NumArticle'=>'BB20002',
//       'Designation'=>'binouze',
//       'PrixUnitaire'=>2.5,
// ];
// $article=new Article($art); 
// $client=new Client();

// printr($article);
// printr($client);

// $myFct->printr($article);
// die;