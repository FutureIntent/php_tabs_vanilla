<?php

namespace root\src\actions\users;

include __DIR__.'./../../scripts/auth/session.php';
include __DIR__.'./../../models/User.php';

use root\src\models\User;
use function root\src\scripts\auth\authenticate;

session_start();

$email = strtolower($_POST['email']);
$password = $_POST['password'];

$user = new User();

$user->setEmail($email);
$user->setPassword($password);

$result;

try{
    $result = $user->getByEmailAndPassword();
    $user->getDB()->close();
}
catch(\Exception $err){
    echo $err->getMessage();
    die();
}

if($result){
    authenticate($result);
    header("Location: http://localhost/light/src/pages/tabs/tabs.php");
    die();
}

echo 'Credentials are wrong';
die();