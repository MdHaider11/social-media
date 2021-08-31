<?php

/**
 * autload requred
 */

use App\Db;
use App\Session;

require('vendor/autoload.php');

/**
 * stylesheed,img & js
 */
$url_assets = 'https://localhost/social-media/assets';
$session = new Session();
$session->init();
$db = new Db();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social-Media</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= $url_assets ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $url_assets ?>/css/app.css">
</head>

<body>