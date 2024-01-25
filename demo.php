<?php

require_once("Service/extra.php");

spl_autoload_register('charger');

$cm=new ClientManager();
$dataCondition=[
      'nomclient'=>'Jamel Azouhri',
];
$client1=$cm->findOneByCondition($dataCondition,'array');
printr($client1);
$client2=$cm->findOneByCondition([],'array');
printr($client2);
