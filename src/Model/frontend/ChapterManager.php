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

    public function add(Chapter $chapter)

    {
      $request = $this->db->prepare('INSERT INTO chapter(title, content, date_publication) 
      VALUES (:title, :content, :date_publication)');
      $request->execute([
          'title'=>$chapter->getTitle(),
          'content'=>$chapter->getContent(),
          'date_publication'=>$chapter->getDatePublication()
      ]);
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

