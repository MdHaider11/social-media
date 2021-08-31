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
                if ($this->conn->query($verify)) {
                    $this->set('user_id', $row['id']);
                    header('location: ../index.php');
                }
            } else {
                $this->set('pass_not_matching', 'Your email & password wrong !');
                header('location: ../login.php');
            }
        }
    }
}
