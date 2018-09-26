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

    public function update() {
        $request = $this->db->prepare('UPDATE chapter SET title = :title, content = :content,
        date_publication = :date_publication, report = :true, moderation = :moderation
        WHERE title = :title, content = :content, date_publication = :date_publication report = :true,
        moderation = :true ');
        $req = $request->execute([
            'title'=>$chapter->getTitle(),
            'content'=>$chapter->getContent(),
            'date_publication'=>$chapter->getDatePublication()
        ]);
        return $req;
    }

    public function getAllCommentsReport() {
      $req = $this->db->query('SELECT id, pseudo, content, date_publication, report, moderation
      FROM comment  WHERE report = true ORDER BY date_publication DESC');
      $data = $req->fetchAll();
      return $data;
    }
}
