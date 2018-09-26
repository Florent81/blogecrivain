<?php

namespace App\Model\frontend;

use App\Model\frontend\Chapter;

Class ChapterManager extends Login

{
    protected $db;

    public function __construct() {
        $this->db = self::dbConnect();
    }
//function that manages the sql query to display the last chapter on the home page;
    public function getLastChapter() {
        $req= $this->db->query('SELECT id, title, content, DATE_FORMAT(date_publication,
        \'%d-%m-%Y\') AS date_publication_fr FROM chapter ORDER BY id DESC LIMIT 1');
        $lastchapter = $req->fetch();
        return $lastchapter;
    }
//function that handles the sql query to see all chapters on the book page;
    public function getAllChapters() {
        $req= $this->db->query('SELECT id, title, content, date_publication
        FROM chapter ORDER BY date_publication DESC');
        $allChapters = $req->fetchAll();
        return $allChapters;
    }
//function that handles the sql query to see a particular chapter;
    public function getChapter($id) {
        $request = $this->db->prepare('SELECT id, title, content, date_publication
        FROM chapter WHERE id = ?');
        $request->execute([
            $id,
        ]);
        $chapter= $request->fetch();
      return $chapter;
    }
}
