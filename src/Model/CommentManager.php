<?php
namespace App\Controller;

use App\Controller\Comment;

Class CommentManager extends Login

{
    protected $db;
    
    public function __construct()
    {
       $this->db = self::dbConnect(); 
    }

    public function add(Comment $comment)

    {
      $request = $this->db->prepare('INSERT INTO comment(pseudo, title, content, date_publication) 
      VALUES (:pseudo, :title, :content, :date_publication)');
      $request = execute([
          'pseudo'=>$comment->getPseudo(),
          'title'=>$comment->getTitle(),
          'content'=>$comment->getContent(),
          'date_publication'=>$comment->getDatePublication()
      ]);
    }

    public function update(Comment $comment)

    {
      $request = $this->db->prepare('UPDATE comment SET report = :report
       WHERE report= :report ');
      $request = execute([
          'report'=>$report->getReport(),  
      ]);
    }

}

