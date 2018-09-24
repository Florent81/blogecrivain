<?php
namespace App\Model\frontend;

use App\Model\frontend\Comment;

Class CommentManager extends Login

{
    protected $db;

    public function __construct() {
        $this->db = self::dbConnect();
    }

    public function addNewComment(Comment $comment) {
      $request = $this->db->prepare('INSERT INTO comment (id_chapter, pseudo, content, date_publication, report)
      VALUES (:id_chapter, :pseudo, :content, NOW(), false)');
      $data = $request->execute([
          'id_chapter'=>$comment->getIdChapter(),
          'pseudo'=>$comment->getPseudo(),
          'content'=>$comment->getContent(),
          ]);
      return $data;
    }

    public function signalComment(Comment $comment)

    {
      $request = $this->db->prepare('UPDATE comment SET report = true
       WHERE id = :id');
      $isSignaled = $request->execute([
          'id'=>$comment->getId(),
      ]);
      return $isSignaled;
    }

    public function getViewComment()

    {
        $request = $this->db->prepare('SELECT id, pseudo, content, date_publication
        FROM comment  WHERE id_chapter = ? ORDER BY date_publication DESC');
        $request->execute([
            $_GET['id'],
        ]);
        return $request;

    }

}
