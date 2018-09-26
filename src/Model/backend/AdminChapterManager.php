<?php

namespace App\Model\backend;

use App\Model\frontend\Login;
use App\Model\backend\AdminChapter;

Class AdminChapterManager extends Login

{
    protected $db;

    public function __construct() {
        $this->db = self::dbConnect();
    }
    /**
    * Add New chapitre in the book;
    */
    public function addNewChapter(AdminChapter $adminChapter) {
        $request = $this->db->prepare('INSERT INTO chapter (title, content, date_publication)
        VALUES (:title, :content, :date_publication)');
        $data = $request->execute([
            'title'=>$adminChapter->getTitle(),
            'content'=>$adminChapter->getContent(),
            'date_publication' => ( new \Datetime() )->format('Y-m-d'),
        ]);
        return $data;
    }

    public function getAdminAllChapters() {
        $req= $this->db->query('SELECT id, title, content, date_publication
        FROM chapter ORDER BY date_publication ASC');
        $adminallChapters = $req->fetchAll();
        return $adminallChapters;
    }

    public function delete($id) {
        $req = $this->db->prepare('DELETE FROM chapter WHERE id = ?');
        $del = $req->execute(
            [
             $id
            ]
        );
     return $del;
   }

    public function update(AdminChapter $chapter) {
        $request = $this->db->prepare('UPDATE chapter SET title = :title, content = :content
        WHERE id = :id');
        $update = $request->execute([
            'id' => $chapter->getId(),
            'title' => $chapter->getTitle(),
            'content' => $chapter->getContent(),
        ]);
        return $update;
    }

    public function getChapter() {
        $req= $this->db->query('SELECT id, title, content, date_publication
        FROM chapter ');
        $chapter = $req->fetch();
        return $chapter;
    }

    public function getAllChapters() {
        $req= $this->db->query('SELECT id, title, content, date_publication
        FROM chapter ORDER BY date_publication DESC');
        $allChapters = $req->fetchAll();
        return $allChapters;
    }
}
