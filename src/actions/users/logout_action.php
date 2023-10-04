<?php

namespace root\src\actions\users;

include __DIR__.'./../../scripts/auth/session.php';

use function root\src\scripts\auth\deAuthenticate;

session_start();

deAuthenticate();

header("Location: http://localhost/light/src/pages/user/login.php");
die();