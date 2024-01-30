<?php

require_once("Service/extra.php");

spl_autoload_register('charger');

$m=new Manager();
$dataCondition=[
      'nomclient'=>'Jamel Azouhri',
];
$client1=$m->findAllByConditionTable('client');
printr($client1);
// $client2=$m->findOneByConditionTable('client');
// printr($client2);
