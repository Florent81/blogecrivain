<?php

require ('Chapter.php');

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
  return $this->$insertchapter;

    }

    public function update(Chapter $chapter)

    {
  return $this->$insertchapter;

    }

}

