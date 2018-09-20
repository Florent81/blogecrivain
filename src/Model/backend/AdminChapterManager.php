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
      $request = $this->db->prepare('INSERT INTO chapter (id, title, content, date_publication)
      VALUES (:title, :content, NOW())');
      $data =$request->execute([
          'title'=>$adminChapter->getTitle(),
          'content'=>$adminChapter->getContent(),
      ]);
      
      return $data;
    }

    public function delete($chapter)

    {
      $request = $this->db->prepare('DELETE FROM chapter(title, content, date_publication)
      WHERE (:id)');
      $request->execute([
          'title'=>$chapter->getTitle(),
          'content'=>$chapter->getContent(),
          'date_publication'=>$chapter->getDatePublication()
      ]);
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
  }
