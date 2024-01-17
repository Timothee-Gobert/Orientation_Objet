<?php

require_once("Service/extra.php");

spl_autoload_register('charger');

$cm=new ClientManager;
$data=[
      "id"=>5,
      "numClient"=>"CTL66654",
      "nomClient"=>"Dupond de ligogo",
      "adresseClient"=>"Niort"
];
$id=5;
$cm->update($data,$id);