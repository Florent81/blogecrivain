<?php

namespace App\Model\frontend;

use App\Model\frontend\User;

Class UserManager extends Login

{
    protected $db;
    
    public function __construct()
    {
       $this->db = self::dbConnect(); 
    }


    public function update(User $user)

    {
      $request = $this->db->prepare('UPDATE user SET title = :title, content = :content, 
      date_publication = :date_publication WHERE title = :title, content = :content, 
      date_publication = :date_publication ');
      $request->execute([
          'title'=>$chapter->getTitle(),
          'content'=>$chapter->getContent(),
          'date_publication'=>$chapter->getDatePublication()
      ]);
    }
