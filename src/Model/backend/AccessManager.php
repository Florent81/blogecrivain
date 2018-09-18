<?php

namespace App\Model\backend;

use App\Model\frontend\Login;
use App\Model\backend\Access;

Class AccessManager extends Login

{
    protected $db;

    public function __construct()
    {
       $this->db = self::dbConnect();
    }

    public function controlMember()
    {

        $member = $_POST['pseudo'];
        $pass = $_POST['pass'];
         //  Récupération de l'utilisateur et de son pass hashé
         $req = $this->db->prepare('SELECT pseudo, pass FROM user WHERE pseudo = :pseudo');
     		 $req->execute(array(
     		'pseudo' => $member->getPseudo()));

     		$result = $req->fetch(PDO::FETCH_ASSOC);

        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['pass'], $result['pass']);

        if (!$result)
        {
             echo 'Mauvais identifiant  !';
        }
        else
        {
          if ($isPasswordCorrect) {
         session_start();
         $_SESSION['id'] = $result['id'];
         $_SESSION['pseudo'] = $pseudo;
         echo 'Vous êtes connecté !';
        }
        else {
            echo 'Mauvais identifiant ou mot de passe !';
        }

    }
 }
}
