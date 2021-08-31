<?php

namespace App;

class Helper
{
    public function input_protect($input)
    {
        if ($input) {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }
    }

    public function pwd_hash($input)
    {
        if (isset($input)) {
            return password_hash($input, PASSWORD_BCRYPT);
        }
    }
}
