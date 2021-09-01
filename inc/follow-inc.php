<?php

use App\Db;

require('../vendor/autoload.php');
$db = new Db();

if (isset($_GET['follower_id']) && isset($_GET['following_id'])) {
    $follwer_id = $_GET['follower_id'];
    $following_id = $_GET['following_id'];
    $db->friends($follwer_id, $following_id);
}
