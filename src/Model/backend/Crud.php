<?php

namespace App\Model\backend;

use App\Model\frontend\Login;

abstract class Crud

{

  abstract protected function add(Chapter $chapter);

  abstract public function count();

  abstract public function delete($id);

  abstract public function getList($debut = -1, $limite = -1);

  abstract public function getUnique($id);

  public function save(Chapter $chapter)

  {
    if ($chapter->isValid())
    {
      $chapter->isNew() ? $this->add($chapter) : $this->update($chapter);
    }
    else
    {
      throw new RuntimeException('Le chapitre doit être valide pour être enregistrée');
    }
  }

  abstract protected function update(Chapter $chapter);

}