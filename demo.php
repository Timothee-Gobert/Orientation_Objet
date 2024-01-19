<?php

require_once("Service/extra.php");

spl_autoload_register('charger');

$cm=new ClientManager;
$columnLike=['numClient','nomClient','adresseClient'];
$mot='er';
$clients=$cm->search($columnLike,$mot);
MyFct::sprintr($clients);