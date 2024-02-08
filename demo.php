<?php

$class="App\Controller\Article"; // fichier correspondant à cette classe: src/Controller/ArticleController.php
$fileClass=str_replace("App\\", "", $class); // a cette effet on a : Controller\Article
$fileClass=str_replace("\\", "/", $fileClass); // a cette effet on a : Controller/Article
$fileClass="src/$fileClass"."Controller.php"; //
echo $fileClass;die("<br> demo.php ligne 7");

$path="src/Controller/Article/";
$path=str_replace("\\", "/", $path);
echo $path;


// require_once("Service/extra.php");

// spl_autoload_register('charger');

// $m=new Manager();
// $dataCondition=[
//       'nomclient'=>'Jamel Azouhri',
// ];
// $client1=$m->findAllByConditionTable('client');
// printr($client1);
// $client2=$m->findOneByConditionTable('client');
// printr($client2);
