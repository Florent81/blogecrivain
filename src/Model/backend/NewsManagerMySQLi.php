<?php

namespace App\Model\backend;

use App\Model\frontend\Login;
use App\Model\backend\Crud;

class NewsManagerMySQLi extends Crud


{

  protected $db;

  public function __construct(MySQLi $db)
  {
    $this->db = $db;
  }

  protected function add(Chapter $chapter)

  {

    $request = $this->db->prepare('INSERT INTO chapter(title, content, date_publication,
    ) VALUES(?, ?, ?, NOW(),)');
    $request->bind_param('sss', $chapter->title(), $chapter->content());
    $request->execute();

  }

  public function count()

  {
    return $this->db->query('SELECT id FROM chapter')->num_rows;
  }

  public function delete($id)

  {
    $id = (int) $id;
    $request = $this->db->prepare('DELETE FROM chapter WHERE id = ?');
    $request->bind_param('i', $id);
    $request->execute();

  }

  public function getList($debut = -1, $limite = -1)

  {
    $listChapters = [];
    $sql = 'SELECT id, title, content, date_publication FROM chapter
    ORDER BY id DESC';

    // On vérifie l'intégrité des paramètres fournis.

    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
    $request = $this->db->query($sql);

    while ($chapter = $request->fetch_object('chapter'))

    {
      $chapter->setDateAjout(new DateTime($chapter->dateAjout()));
      $chapter->setDateModif(new DateTime($chapter->dateModif()));
      $listChapters[] = $chapter;

    }
    return $listChapters;
  }

  public function getUnique($id)

  {
    $id = (int) $id;
    $request = $this->db->prepare('SELECT id, title, content, date_publication 
     FROM chapter WHERE id = ?');
    $request->bind_param('i', $id);
    $request->execute();
    $request->bind_result($id, $title, $content, $date_publication);    
    $request->fetch();

    return new Chapters([

      'id' => $id,
      'title' => $title,
      'titre' => $titre,
      'content' => $content,
      'date_publication' =>  $date_publication,
    ]);

  }

  protected function update(Chapter $chapter)

  {
    $request = $this->db->prepare('UPDATE chapter SET title = ?,
     content = ?, date_publication = ?, WHERE id = ?');
    $request->bind_param('sssi', $chapter->title(), 
    $chapter->content(), $chapter->datePublication(), $chapter->id());
    $request->execute();

  }

}