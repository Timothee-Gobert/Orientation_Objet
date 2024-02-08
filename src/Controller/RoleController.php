<?php
    class RoleController extends MyFct{
        function __construct(){
            $action='list';
            extract($_GET);
            switch($action){
                case 'show':
                    if($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas le droit d'utiliser cette action!");
                    $this->afficherRole($id);
                    break;
                case 'list':
                    if($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas le droit d'utiliser cette action!");
                    $this->listerRole();
                    break;
                case 'insert':
                    if($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas le droit d'utiliser cette action!");
                    $this->insererRole();
                    break;
                case 'update':
                    if($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas le droit d'utiliser cette action!");
                    $this->modifierRole($id);
                    break;
                
                case 'delete':
                    if($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas le droit d'utiliser cette action!");
                    $this->supprimerRole($id);
                    break;
                case 'save' :
                    if($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas le droit d'utiliser cette action!");
                    $this->sauvegarderRole($_POST);
                    break;
                case 'search':
                    if($this->notGranted('ROLE_ADMIN')) $this->throwMessage("Vous n'avez pas le droit d'utiliser cette action!");
                    $this->chercherRole($mot);
                    break;
            }
        }
        /*------------------Les Methods------------------------*/

        function afficherRole($id){
            $um=new RoleManager();  //  Instancier la classe RoleManager
            $role=$um->findById($id);  // Recuperer role corespondant à l'id $id. D'après RoleManager on a ici un objet
            $disabled="disabled";
            //----Role----
            $this->generateFormRole($role,$disabled);
        }   

        function chercherRole($mot){
            $um=new RoleManager();
            $columnLikes=['libelle'];
            $roles=$um->search($columnLikes,$mot);
            $variables=[
                'lignes'=>$roles,
                'nbre'=>count($roles),
            ];
            $file="View/role/listRole.html.php";
            $this->generatePage($file,$variables);        
        }       

        function supprimerRole($id){
            $rm=new RoleManager();
            $rm->deleteById($id);
            header("location:role");
            exit();
        }

        function insererRole(){
            //-----Role-----
            $role=new Role();  // Créer un role à vide
            $disabled="";
            /*------Creation de la page FormRole-----*/
            $this->generateFormRole($role,$disabled);
        } 

        function modifierRole($id){
            //-----Role---
            $um=new RoleManager();  //  Instancier la clasee RoleManager
            $role=$um->findById($id);  // Recuperer role corespondant à l'id $id. D'après RoleManager on a ici un objet
            $disabled="";
            $this->generateFormRole($role,$disabled);
        }  

        function generateFormRole($role,$disabled){
            $rm=new RoleManager();
            //---------prearation variables---
            $variables=[
                'id'=>$role->getId(),
                'rang'=>$role->getRang(),
                'libelle'=>$role->getLibelle(),
                'disabled'=>$disabled
            ];
            //----Ouverture de la page
            $file="View/role/formRole.html.php";
            $base="View/base-bs-vide.html.php";
            $this->generatePage($file,$variables,$base);
        }     

        function sauvegarderRole($data){
            extract($data);
            $rm=new RoleManager();
            $id=(int) $id;  // transformation de $id en entier
            if($id!=0){  // cas d'une modification
                $rm->update($data,$id);
            }else{  //  cas d'une insertion 
                $rm->insert($data);
            }
            //  Redirection vers la page list role
            header("location:role");
        }

        function listerRole(){
            $um=new RoleManager();
            $roles=$um->findAll(" order by rang asc ");
            $lignes=[];
            foreach($roles as $value){
                $lignes[]=[
                    'id'=>$value['id'],
                    'rang'=>$value['rang'],
                    'libelle'=>$value['libelle'],
                ];
            }
            $variables=[
                'lignes'=>$lignes,
                'nbre'=>count($lignes),
            ];
            //------------Evoi page-------------*/
            $file="View/role/listRole.html.php";
            $this->generatePage($file,$variables);
        }
    }