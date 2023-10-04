<?php

namespace root\src\actions\users;

include __DIR__.'./../../scripts/auth/session.php';
include __DIR__.'./../../models/User.php';

use root\src\models\User;

$email = strtolower($_POST['email']);
$name = $_POST['name'];
$password = $_POST['password'];
$role = 'user';

$user = new User();

$user->setEmail($email);
$user->setName($name);
$user->setPassword($password);
$user->setRole($role);

try{
    $user->storeUser();
    $user->getDB()->close();
}
catch(\Exception $err){
    echo $err->getMessage();
    die();
}

header("Location: http://localhost/light/src/pages/user/login.php");
die();