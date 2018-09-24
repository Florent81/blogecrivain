<?php

namespace App\Model\backend;

use App\Model\frontend\Login;
use App\Model\backend\AdminCommentsReport;

Class AdminCommentsReportManager extends Login

{
    protected $db;

    public function __construct() {
        $this->db = self::dbConnect();
    }

    public function deleteComment(int $id) {
        return $this->db->query("DELETE FROM comment WHERE id={$id}");
    }

    public function update(Comment $comment) {
        $request = $this->db->prepare('UPDATE chapter SET title = :title, content = :content,
        date_publication = :date_publication WHERE title = :title, content = :content,
        date_publication = :date_publication ');
        $request->execute([
            'title'=>$chapter->getTitle(),
            'content'=>$chapter->getContent(),
            'date_publication'=>$chapter->getDatePublication()
        ]);
    }

    public function getAllCommentsReport() {
      $request = $this->db->prepare('UPDATE comment SET report = true
       WHERE id = :id');
      $isSignaled = $request->execute([
          'id'=>$comment->getId(),
      ]);
      var_dump($isSignaled);die;
      return $isSignaled;
    }
}
