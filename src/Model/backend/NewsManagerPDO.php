<?php

namespace App\Model\backend;

use App\Model\frontend\Login;
use App\Model\backend\Crud;

class NewsManagerPDO extends Crud

{

  protected function add(Chapter $chapter)

  {

    $request = $this->db->prepare('INSERT INTO 
    chapter(title, content, date_publication,) 
    VALUES(:title, :content, NOW(), NOW())');

    $request->bindValue(':title', $chapter->title());

    $request->bindValue(':content', $chapter->content());

    $request->execute();

  }

  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM chapter')->fetchColumn();
  }

  public function delete($id)
  {
    $this->db->exec('DELETE FROM chapter WHERE id = '.(int) $id);
  }

  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, title, content, date_publication 
    FROM chapter ORDER BY id DESC';
    // On vérifie l'intégrité des paramètres fournis.
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }

    $request = $this->db->query($sql);
    $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Chapter');
    $listChapters = $requete->fetchAll();


    // On parcourt notre liste de news pour pouvoir placer des instances de DateTime en guise de dates d'ajout et de modification.

    foreach ($listChapters as $chapter)

    {
      $chapter->setDateAjout(new DateTime($chapter->dateAjout()));
      $chapter->setDateModif(new DateTime($chapter->dateModif()));
    }

    $request->closeCursor();

    return $listChapters;

  }

  public function getUnique($id)

  {

    $request = $this->db->prepare('SELECT id, title, content, date_publication
    FROM chapter WHERE id = :id');
    $request->bindValue(':id', (int) $id, PDO::PARAM_INT);
    $request->execute();

    $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'chapter');
    $chapter = $request->fetch();

    $chapter->setDateAjout(new DateTime($chapter->dateAjout()));
    $chapter->setDateModif(new DateTime($chapter->dateModif()));

    return $chapter;

  }

  protected function update(Chapter $chapter)

  {

    $request = $this->db->prepare('UPDATE chapter 
    SET title = :title, content = :content, 
    dateModif = NOW() WHERE id = :id');

    $request->bindValue(':title', $chapter->title());

    $request->bindValue(':content', $chapter->content());

    $request->bindValue(':id', $chapter->id(), PDO::PARAM_INT);

    $request->execute();

  }

}