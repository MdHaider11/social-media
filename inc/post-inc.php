<?php
require('../vendor/autoload.php');

use App\Db;
use App\Helper;
use App\Session;

$helper = new Helper;
$db = new Db();
$session = new Session();
$session->init();

if (isset($_POST['post_contest'])) {
    $img = $_FILES['photo_img'];
    $caption = $helper->input_protect($_POST['caption']);
    $user_id = $_POST['user_uniqe_id'];
    if (!empty($img) && !empty($caption)) {
        $db->upload($user_id, $img, $caption);
    } else {
        $session->set('upload_empty', 'Image & Caption is empty !');
        header('location: ../index.php');
    }
}
