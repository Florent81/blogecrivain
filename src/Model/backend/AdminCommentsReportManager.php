<?php

namespace App\Model\backend;

use App\Model\frontend\Login;
use App\Model\backend\AdminCommentsReport;
use App\Model\frontend\Comment;

Class AdminCommentsReportManager extends Login

{
    protected $db;

    public function __construct() {
        $this->db = self::dbConnect();
    }
//function that handles the sql query to remove a comment;
    public function deleteComment(int $id) {
        return $this->db->query("DELETE FROM comment WHERE id={$id}");
    }
//function that handles the sql query to moderate a comment posted;
    public function update(Comment $comment) {
        $request = $this->db->prepare('UPDATE comment SET moderation = true
        WHERE id = :id ');
        $req = $request->execute([
            'id'=>$comment->getId(),
        ]);
        return $req;
    }
//function that handles the sql query to display all comments posted;
    public function getAllCommentsReport() {
      $req = $this->db->query('SELECT id, pseudo, content, date_publication, report, moderation
      FROM comment  WHERE report = true ORDER BY date_publication DESC');
      $data = $req->fetchAll();
      return $data;
    }
}
