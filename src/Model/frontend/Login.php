<?php
namespace App\Model\frontend;

class Login
{
//function that manages the sql query allowing access to the database;
  public function dbConnect() {
      try {
          $bdd = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
      }
      catch(Exception $e) {
          die('Erreur : '.$e->getMessage());
      }
      return $bdd;
  }
}
