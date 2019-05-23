<?php
/**
 * Created by PhpStorm.
 * User: Lubin
 * Date: 21/05/2019
 * Time: 12:08
 */

class Security
{
    public function __construct()
    {
    }

    public function crypt_password($password) {

        $crypted_password = password_hash($password, PASSWORD_DEFAULT);
        return $crypted_password;
    }
}



