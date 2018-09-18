<?php

namespace App\Model\backend;

use App\Model\backend\AdminManager;
use App\Model\backend\Crud;
use App\Model\backend\DBFactory;
use App\Model\backend\NewsManagerMySQLi;
use App\Model\backend\NewsManagerPDO;
use App\Model\frontend\login;

Class Admin extends Login

{
  protected $db;
  
  public function __construct()
  {
     $this->db = self::dbConnect(); 
  }


  public function update(Access $access)

  {
    $request = $this->db->prepare('UPDATE user SET * WHERE pseudo = :pseudo, 
    mail = :mail, _password = _password ');
    $request->execute([
        'pseudo'=>$user->getPseudo(),
        'mail'=>$user->getMail(),
        '_password'=>$user->get_password()
    ]);
  }
}