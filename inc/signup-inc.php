<?php

use App\Helper;
use App\Session;
use App\Db;

require('../vendor/autoload.php');
$session = new Session();
$session->init();
$helper = new Helper();
$db = new Db();

if (isset($_POST['signup'])) {
    $full_name = $helper->input_protect($_POST['full_name']);
    $user_name = $helper->input_protect($_POST['user_name']);
    $user_email = $helper->input_protect($_POST['user_email']);
    $user_pass = $helper->pwd_hash($helper->input_protect($_POST['user_pass']));
    if (empty($full_name)) {
        $session->set('full_name_empty', 'Full name empty');
        header('location: ../signup.php');
    }
    if (empty($user_name)) {
        $session->set('name_empty', 'User name empty');
        header('location: ../signup.php');
    }
    if (empty($user_email)) {
        $session->set('email_empty', 'User email empty');
        header('location: ../signup.php');
    }
    if (empty($user_pass)) {
        $session->set('pass_empty', 'User password empty');
        header('location: ../signup.php');
    }
    if (!empty($full_name) && !empty($user_name) && !empty($user_email) && !empty($user_pass)) {
        $db->signup($full_name, $user_name, $user_email, $user_pass);
    }
}
