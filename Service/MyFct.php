<?php

require_once("./Config/parametre.php");

class MyFct{

    function crypter($password,$iteration=127){
        for($i=0;$i<=$iteration;$i++){
            $password=sha1($password);
        }
        return $password;
    }
    static function isGranted($role_libelle){
        $user_roles=$_SESSION['roles'];          //format JSON
        $user_roles=json_decode($user_roles);   //transformation en php
        // echo printr($user_roles)
        if(in_array($role_libelle,$user_roles)){//in_array — Checks if a value exists in an array
            return true;
        }else{
            return false;
        }
    }

    function generatePage($file,$variables=[],$base="View/base-bs.html.php"){
        //$variables  : une variable en tableau qui contnient comme indices les noms des variables utilisées par $file  
        if(file_exists($file)){
            extract($variables);    // Exemple ['x'=>2,'y'=>5,'z'=>10]   . avec extract($variables) , on a $x=2;  $y=5 et $z=10
            ob_start();             // Ouvrir   la memoire tampon pour contenir lfichier $file à transformer en texte
            require_once($file);
            $content=ob_get_clean();
            ob_start();             // Ouvrir à nouveau la memoire tampon pour recevoir le fichier $base avec la variable $content
            require_once($base);
            $page=ob_get_clean();
            echo $page;
        }else{
            echo "<h1>Desolé! Le fichier $file n'existe pas!</h1>"; 
            die;
        }
    }
    public function printr($tableau){
        echo "<pre>";
        print_r($tableau);
        echo "</pre>";
    }
    static function sprintr($tableau){
        echo "<pre>";
        print_r($tableau);
        echo "</pre>";
    }
}
?>