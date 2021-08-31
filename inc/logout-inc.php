<?php

use App\Session;

require('../vendor/autoload.php');
$session = new Session();
$session->init();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $session->destroy();
    header('location: ../login.php');
    echo 'ok';
}
