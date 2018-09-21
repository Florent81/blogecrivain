<?php

namespace App\Model\backend;

use App\Model\frontend\Login;
use App\Model\backend\AdminChapter;

Class AdminChapterManager extends Login

{
    protected $db;

    public function __construct()
    {
       $this->db = self::dbConnect();
    }

    public function addNewChapter(AdminChapter $adminChapter)

    {
      $request = $this->db->prepare('INSERT INTO chapter (title, content, date_publication)
      VALUES (:title, :content, :date_publication)');
      $data = $request->execute([
          'title'=>$adminChapter->getTitle(),
          'content'=>$adminChapter->getContent(),
          'date_publication' => ( new \Datetime() )->format('Y-m-d'),
      ]);

      return $data;
    }

    public function getAdminAllChapters()

    {
          $req= $this->db->query('SELECT id, title, content, date_publication
          FROM chapter ORDER BY date_publication ASC');
          $adminallChapters = $req->fetchAll();
          return $adminallChapters;
    }

    public function deleteChapter(int $id)
{
      var_dump($id);
      return $this->db->query("DELETE * FROM chapter WHERE id={$id}");
}


    public function update(Chapter $chapter)

    {
      $request = $this->db->prepare('UPDATE chapter SET title = :title, content = :content,
      date_publication = :date_publication WHERE title = :title, content = :content,
      date_publication = :date_publication ');
      $request->execute([
          'title'=>$chapter->getTitle(),
          'content'=>$chapter->getContent(),
          'date_publication'=>$chapter->getDatePublication()
      ]);
    }
    public function getAllChapters()

    {
          $req= $this->db->query('SELECT id, title, content, date_publication
          FROM chapter ORDER BY date_publication DESC');
          $allChapters = $req->fetchAll();
          return $allChapters;
    }
  }
