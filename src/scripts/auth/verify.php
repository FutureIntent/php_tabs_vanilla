<?php 

namespace root\src\scripts\auth;

if(!isset($_SESSION['auth']) || !$_SESSION['auth']){
    header("Location: http://localhost/light/src/pages/user/login.php");
    die();
}
