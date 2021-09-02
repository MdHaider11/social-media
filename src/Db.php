<?php

namespace App;

use mysqli;

class Db extends Session
{
    public $conn;
    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'social_media');
        if ($this->conn->connect_error) {
            die('Connection Error :' . $this->conn->connect_error);
        }
    }

    public function signup($full_name, $user_name, $user_email, $user_pass)
    {
        $this->init();
        $select_email = "SELECT * from users WHERE email='$user_email'";
        $query = $this->conn->query($select_email);
        if (0 < $query->num_rows) {
            $this->set('exist_email', 'The email already registered ');
            header('location: ../signup.php');
        } else {
            $insert = "INSERT INTO `users` (`name`, `user_name`, `email`, `password`) VALUES ('$full_name', '$user_name', '$user_email', '$user_pass')";

            $this->set('signup_created', 'Your account successfully created!');
            $this->conn->query($insert);
            header('location: ../login.php');
        }
    }

    public function login($login_email, $login_password)
    {
        $select_users = "SELECT * FROM users WHERE email='$login_email'";
        $query = $this->conn->query($select_users);
        if ($query) {
            $row = $query->fetch_assoc();
            $current_password = $row['password'];
            $user_id = $row['id'];
            if (password_verify($login_password, $current_password)) {
                $checked_password = password_verify($login_password, $current_password);
                $verify = "SELECT * FROM users WHERE email='$login_email' && password='$checked_password'";
                if ($row['status'] == 1) {
                    if ($this->conn->query($verify)) {
                        $this->set('user_id', $user_id);
                        $this->set('login', true);
                        header('location: ../index.php');
                    }
                } else {
                    $this->set('deactive_id', 'Your id deactivated !');
                    header('location: ../login.php');
                }
            } else {
                $this->set('pass_not_matching', 'Your email & password wrong !');
                header('location: ../login.php');
            }
        }
    }

    public function upload($user_id, $img, $caption)
    {
        $this->init();
        $img_name = $img['name'];
        $img_type = $img['type'];
        $img_size = $img['size'];
        if ($img_type == 'image/png' || $img_type == 'image/jpeg') {
            if ($img_size <= 1000000) {
                $main_img  = rand(0, 100000) . $img_name;
                $insert = "INSERT INTO posts (user_id, user_img, body) VALUES ('$user_id', '$main_img', '$caption')";
                $this->conn->query($insert);
                move_uploaded_file($img['tmp_name'], '../media/' . $main_img);
                $this->set('post_upload', 'You posted a photo !');
                header('location: ../index.php?id=1');
            } else {
                $this->set('img_big', 'Image size is to big');
                header('location: ../index.php');
            }
        }
    }

    public function  friends($follower, $followig)
    {
        $checking = "SELECT * FROM `friends` WHERE follower_id='$follower' AND following_id='$followig'";
        $run = $this->conn->query($checking);
        if (0 == $run->num_rows) {
            $insert = "INSERT INTO friends (follower_id, following_id) VALUES ('$follower', '$followig')";
            $query = $this->conn->query($insert);
            header('location: ../people.php');
        } else {
            header('location: ../people.php');
        }
    }

    public function unfriend($follower, $followig)
    {
        $delete = "DELETE from friends WHERE follower_id='$follower' AND following_id='$followig'";
        $query = $this->conn->query($delete);
        if ($query) {
            header('location: ../people.php');
        }
    }
}
