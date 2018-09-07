<?php

namespace Livrable3;

use Livrable3\Chapter;

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
      $request = execute([
          'title'=>$chapter->getTitle(),
          'content'=>$chapter->getContent(),
          'date_publication'=>$chapter->getDatePublication()
      ]);
    }

    public function delete($chapter)

    {
      $request = $this->db->prepare('DELETE FROM chapter(title, content, date_publication) 
      WHERE (:id)');
      $request = execute([
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
      $request = execute([
          'title'=>$chapter->getTitle(),
          'content'=>$chapter->getContent(),
          'date_publication'=>$chapter->getDatePublication()
      ]);
    }

}

