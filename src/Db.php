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
}
