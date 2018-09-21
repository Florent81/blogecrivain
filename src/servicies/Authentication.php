<?php

namespace App\servicies;

use App\Model\frontend\Login;

Class Authentication
{

    public static function authenticate($pseudo = NULL, $pass = NULL) {
        $db = (new Login())->dbConnect();
        $req = $db->query("SELECT * FROM user WHERE pseudo = '{$pseudo}' AND pass = '{$pass}'");
        $res = $req->fetchObject();
        if($res){
            $_SESSION['user'] = $res;
            return true;
        }
        return false;
    }

    public static function isAuthenticated() {
        if(isset($_SESSION['user'])){
            return true;
        }
        return false;
    }
}
