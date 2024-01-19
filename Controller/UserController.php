<?php

class UserController extends MyFct{
      function __construct(){
            $action='list';
            extract($_GET);
            switch($action){
                  case 'list' :
                        $this->listerUser();
                        break;
                  case 'update' :
                        $this->modifierUser($id);
                        break;
                  case 'show' :
                        $this->afficherUser($id);
                        break;
                  case 'delete' :
                        break;
                  case 'save' :
                        break;
                  case 'search' :
                        break;
                  case 'insert' :
                        break;
            }
      }

      /* --- My Methods --- */
      function sauvegarderUser($data){

            $this->printr($data);

            $um=new UserManager();
            $connexion=$um->connexion();
            $data['roles']=json_encode($data['roles']); // transformer le contenue de $data['roles'] en json
            $data['password']=sha1($data['password']); // crypter le mot de passe

            $this->printr($data);
            
            $id=(int) $id; // tranformation de $id en entier du coup si vide -> 0
            if($id!=0){ // cas modification
                  $um->update($data,$id);
            }else{ // cas d'une nouvelle entrer car id = 0
                  $um->insert($data);
            }
            // reduction vers la page list user
            header("location:user");
      }
      function listerUser(){
            /* --- Préparation des variables à envyer à la page --- */
            $um=new UserManager();
            $users=$um->findAll();
            $lignes=[];
            foreach($users as $value){
                  $user=new User($value);
                  $dateCreation=$user->getDateCreation();
                  $dateCreation=new DateTime($dateCreation);
                  $dateCreation=$dateCreation->format('d/m/Y');
                  /* --- Afficher roles en menu deroulant --- */
                  $roles=json_decode($user->getRoles()); // transformer un json en tableau php
                  $user_roles="<select>";
                  foreach($roles as $role){
                        $user_roles.="<option>$role</option>";
                  }
                  $user_roles.="</select>";
                  /* ---------------------------------------- */
                  $lignes[]=[
                        'id'=>$user->getId(),
                        'username'=>$user->getUsername(),
                        'dateCreation'=>$dateCreation,
                        'roles'=>$user_roles,
                  ];
            }
            $variables=[
                  'lignes'=>$lignes,
                  'nbre'=>count($lignes),
            ];
            /* --- Envoi page --- */
            $file="View/user/list.html.php";
            $this->generatePage($file,$variables);
      }
      function modifierUser($id){
            // --- User ---
            $um=new UserManager();        // Instancier la classe user manager
            $user=$um->findById($id);     // Recuperer user correpondant a l'id $id. d'apres UserManager on a un objet
            $user_roles=json_decode($user->getRoles()); // Recuperation de roles dans user 
            // --- la ligne du dessus en deux ligne ---
            //$user_roles=$user->getRoles();          // recuperation de roles (json) dans user
            //$user_roles=json_encode($user_roles);   // transformation de json en tableau php
            // ----------------------------------------
            // ------------
            // --- Role ---
            $rm=new RoleManager();
            $myRoles=$rm->findAll();      // recuperation de la totalité de la table role
            $roles=[];                    // variable $roles à envoyer vers la page form.html.php
            foreach($myRoles as $role){
                  $libelle=$role['libelle'];
                  if(in_array($libelle,$user_roles)){
                        $selected="selected";
                  }else{
                        $selected="";
                  }
                  $roles[]=['libelle'=>$libelle,'selected'=>$selected];
            }
            // ------------
            /* --- Préparation des variables --- */
            $variables=[
                  'id'=>$user->getId(),
                  'username'=>$user->getUsername(),
                  'password'=>'',
                  'email'=>$user->getEmail(),
                  'roles'=>$roles,
                  'disabled'=>'',
            ];
            $file="View/user/form.html.php";
            $this->generatePage($file,$variables);
      }
      function afficherUser($id){
            // --- User ---
            $um=new UserManager();        // Instancier la classe user manager
            $user=$um->findById($id);     // Recuperer user correpondant a l'id $id. d'apres UserManager on a un objet
            $user_roles=json_decode($user->getRoles()); // Recuperation de roles dans user 
            // --- la ligne du dessus en deux ligne ---
            //$user_roles=$user->getRoles();          // recuperation de roles (json) dans user
            //$user_roles=json_encode($user_roles);   // transformation de json en tableau php
            // ----------------------------------------
            // ------------
            // --- Role ---
            $rm=new RoleManager();
            $myRoles=$rm->findAll();      // recuperation de la totalité de la table role
            $roles=[];                    // variable $roles à envoyer vers la page form.html.php
            foreach($myRoles as $role){
                  $libelle=$role['libelle'];
                  if(in_array($libelle,$user_roles)){
                        $selected="selected";
                  }else{
                        $selected="";
                  }
                  $roles[]=['libelle'=>$libelle,'selected'=>$selected];
            }
            // ------------
            /* --- Préparation des variables --- */
            $variables=[
                  'id'=>$user->getId(),
                  'username'=>$user->getUsername(),
                  'password'=>'*************',
                  'email'=>$user->getEmail(),
                  'roles'=>$roles,
                  'disabled'=>'',
            ];
            $file="View/user/form.html.php";
            $this->generatePage($file,$variables);
      }
}
