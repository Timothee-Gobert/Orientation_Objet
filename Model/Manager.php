<?php

require_once("./Config/parametre.php");

class Manager{
    public function searchTable($table,$columnLikes,$mot){
        $connexion=$this->connexion();
        $condition="";
        $values=[];
        foreach($columnLikes as $value){
            $condition.=($condition=="")  ?  "$value like ? "  :  " or $value like ?";
            $values[]="%$mot%";
        }
        $sql="select * from $table where $condition";
        // --- test
        // echo $sql;
        // MyFct::sprintr($values);
        // die;
        // ---
        $requete=$connexion->prepare($sql);
        $requete->execute($values);
        $resultat=$requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
    function updateTable($table,$data,$id){
        $connexion=$this->connexion();
        $setColumn="";
        $values=[];
        foreach($data as $key=>$value){
            if($key!='id'){
                $setColumn.=($setColumn=="")  ?  "$key=?"  :  ",$key=?"; // if ternaire
                $values[]=$value;
            }
        }
        $sql="update $table set $setColumn where id=?";
        $values[]=$id;
        // --- test
        // echo $sql;
        // MyFct::sprintr($values);
        // die;
        // ---
        $requete=$connexion->prepare($sql);
        $requete->execute($values);
    }
    function insertTable($table,$data){
        $connexion=$this->connexion();
        $column="";
        $pi=""; // point d'interrogation
        $values=[];// tableau pour la method execute
        // ----- geneeration de la requete
        foreach($data as $key=>$value){
            if($key!='id'){
                if($column==''){
                    $column.=$key;
                    $pi.="?";
                }else{
                    $column.=",$key";
                    $pi.=",?";
                }
                $values[]=$value;
            }
        }
        $sql="insert into $table ($column) values ($pi)";
        // --- test
        // echo $sql;
        // MyFct::sprintr($values);
        // die;
        // ---
        $requete=$connexion->prepare($sql);
        $requete->execute($values);
    }

    function connexion($host=HOST,$dbname=DBNAME,$user=USER,$password=PASSWORD){
        $dns="mysql:host=$host;dbname=$dbname;charset=utf8";
        try{
            $connexion=new PDO($dns,$user,$password);
        }catch(Exception $e){
            echo "<h1> Connexion impossible ! Verifiez les paramètres !</h1>";
            die;
    }
            return $connexion;
        }
    
    function getDescribeTable($table){
        $connexion=$this->connexion();
        $sql="desc $table";  // requete pour affichage de la structure la table collaborateur
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $colonnes=$requete->fetchAll(PDO::FETCH_COLUMN);// recuperation de tous les noms de colonne de la table collaborateur
        /* sans avoir une bonne methode on devait initialiser la variavle tableau en :
        $variables=[
            'id'=>'',
            'civilite'=>'',
            'nom'=>'',
        ];*/
        $variables=[];
        foreach($colonnes as $valeur){
            $variables[$valeur]='';
        }  
        return $variables;  
    }
    
    function findByIdTable($nomTable,$id){
        $connexion=$this->connexion(); // valeur retourner par la fonction $this->connexion() du fichier myFct
        $sql="select * from $nomTable where id=?"; // ecrire la requete sql correspondante
        $requete=$connexion->prepare($sql); // dire à PHP de préparer la requete sql
        $requete->execute([$id]); // executer la requete avec id = $id
        ///$resultat=$requete->fetch(); // Mettre dans $ article l'article trouvé
        $resultat=$requete->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    }
    
    function deleteByIdTable($nomTable,$id){
        $connexion=$this->connexion();
        $sql="delete from $nomTable where id=?";
        $requete=$connexion->prepare($sql);
        $requete->execute([$id]);
        return true;
    }
    
    function listTable($nomTable){
        $sql="select * from $nomTable";
        $connexion=$this->connexion();
        $requete=$connexion->prepare($sql);
        $requete->execute();
        $tables=$requete->fetchAll(PDO::FETCH_ASSOC); // quand on rajoute PDO::FETCH_ASSOC les articles ne sont pas doublées
        return $tables;
    }
    
    function testDelete($id){
        $connexion=$this->connexion();
        $sql="select * from ligneCommande where article_id=?";
        $requete=$connexion->prepare($sql);
        $requete->execute([$id]);
        $resultat=$requete->fetch();
        if($resultat){
            return false;
        }else{
            return true;
        }
    }
}