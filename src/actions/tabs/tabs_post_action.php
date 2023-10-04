<?php

namespace root\src\actions\tabs;

include __DIR__.'./../../models/Tab.php';
include __DIR__.'./../../helpers/helpers.php';

use function root\src\helpers\stringToArray;
use root\src\models\Tab;

session_start();

function storeTab($id){
    $tab = new Tab();

    $tab->setHeader('Temporary Header');
    $tab->setContent('Temporary Content');
    $tab->setParentId($id);
    $tab->setUserId($_SESSION['id']);

    try{
        $tab->storeTab();
        $tab->getDB()->close();
    }
    catch(\Exception $err){
        echo $err->getMessage();
        die();
    }
}

function updateTab($id, $header, $content){
    $tab = new Tab();

    $tab->setId($id);
    $tab->setHeader($header);
    $tab->setContent($content);
    $tab->setUserId($_SESSION['id']);

    try{
        $tab->updateTab();
        $tab->getDB()->close();
    }
    catch(\Exception $err){
        echo $err->getMessage();
        die();
    }
}

function deleteTab($id){
    $tab = new Tab();

    $tab->setId($id);
    $tab->setUserId($_SESSION['id']);

    try{
        $tab->deleteTab();
        $tab->getDB()->close();
    }
    catch(\Exception $err){
        echo $err->getMessage();
        die();
    }
}

function dispatchAction($dispatch){
    $keys = array_keys($dispatch);
    $data = stringToArray('_', end($keys));

    $action = $data[0];
    $id = $data[1];

    switch($action){
        case 'new':
            storeTab(null);
            break;
        case 'add':
            storeTab($id);
            break;
        case 'refresh':
            $header = $_POST["header_{$id}"];
            $content = $_POST["content_{$id}"];
            updateTab($id, $header, $content);
            break;
        case 'delete':
            deleteTab($id);
            break;
    }

    header("Location: http://localhost/light/src/pages/tabs/tabs.php");
    die();
}

dispatchAction($_POST);