<?php

namespace App\Model\backend;

use App\Model\frontend\Login;
use App\Model\backend\Access;

Class AccessManager

{
    protected $db;

    public function __construct() {
       $this->db = self::dbConnect();
    }
//function that manages the authentication of members
    public function controlMember() {
        $member = $_POST['pseudo'];
        $pass = $_POST['pass'];
        $req = $this->db->prepare('SELECT pseudo, pass FROM user WHERE pseudo = :pseudo');
     		$req->execute(array(
     		'pseudo' => $member->getPseudo()));
     		$result = $req->fetch(PDO::FETCH_ASSOC);

    }
}
