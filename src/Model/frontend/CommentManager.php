<?php
namespace App\Model\frontend;

use App\Model\frontend\Comment;

Class CommentManager extends Login

{
    protected $db;

    public function __construct()
    {
       $this->db = self::dbConnect();
    }

    public function add(Comment $comment)

    {
      $request = $this->db->prepare('INSERT INTO comment(id_chapter, pseudo, content, date_publication)
      VALUES (:id_chapter, :pseudo, :content, :date_publication)');
      $request = execute([
          'id_chapter'=>$comment->getIdChapter(),
          'pseudo'=>$comment->getPseudo(),
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
