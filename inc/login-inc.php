<?php

use App\Helper;
use App\Session;
use App\Db;

require('../vendor/autoload.php');
$session = new Session();
$session->init();
$helper = new Helper();
$db = new Db();

if (isset($_POST['login'])) {
    $login_email = $helper->input_protect($_POST['login_email']);
    $login_pass = $helper->input_protect($_POST['login_password']);
    if (empty($login_email)) {
        $session->set('login_email_empty', 'Email is empty');
        header('location: ../login.php');
    }
    if (empty($login_pass)) {
        $session->set('login_pass_empty', 'Password is empty');
        header('location: ../login.php');
    }

    if (!empty($login_email) && !empty($login_pass)) {
        $db->login($login_email, $login_pass);
    }
}
