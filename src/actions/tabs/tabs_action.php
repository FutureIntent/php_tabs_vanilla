<?php

namespace root\src\actions\tabs;

include __DIR__.'./../../models/Tab.php';

use root\src\models\Tab;

$user_id = $_SESSION['id'];
$dataSet = array();

$tab = new Tab();

$tab->setUserId($_SESSION['id']);

try{
    $dataSet = $tab->showTabs();
    $tab->getDB()->close();
}
catch(\Exception $err){
    echo $err->getMessage();
    die();
}
        
return $dataSet;