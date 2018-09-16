<?php

namespace App\Model\backend;

use App\Model\backend\Admin;

Class AdminManager extends Login

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
