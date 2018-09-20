<?php

namespace App\Model\frontend;

use App\Model\frontend\Chapter;

Class ChapterManager extends Login

{
    protected $db;

    public function __construct()
    {
       $this->db = self::dbConnect();
    }

    public function getLastChapter()

    {
        $req= $this->db->query('SELECT id, title, content, DATE_FORMAT(date_publication,
       \'%d-%m-%Y\') AS date_publication_fr FROM chapter ORDER BY id DESC LIMIT 1');
        $lastchapter = $req->fetch();
        return $lastchapter;
    }

    public function getAllChapters()

    {
          $req= $this->db->query('SELECT id, title, content, date_publication
          FROM chapter ORDER BY date_publication DESC');
          $allChapters = $req->fetchAll();
          return $allChapters;
    }

    public function getChapter($id)

    {
      $request = $this->db->prepare('SELECT id, title, content, date_publication
      FROM chapter WHERE id = ?');
      $request->execute([
        $id,
      ]);
      $chapter= $request->fetch();
      return $chapter;
    }
}
