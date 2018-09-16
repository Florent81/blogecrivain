<?php

public function backend();
  {
  protected $db;
  $db = DBFactory::getMysqlConnexionWithPDO();
  $manager = new NewsManagerPDO($db);
  }
 
  if (isset($_GET['modifier']));

  {
    $chapters = $manager->getUnique((int) $_GET['modifier']);
  }

  if (isset($_GET['supprimer']))
  {
    $manager->delete((int) $_GET['supprimer']);
    $message = 'Le chapitre a bien été supprimé !';
  }

  if (isset($_POST['title']))
  {
   $chapters = new Chapters(
      [
      'title' => $_POST['title'],
      'content' => $_POST['content'],
      'date_publication' => $_POST['date_publication']
      ]
   );
  }

  if (isset($_POST['id']))
  {
    $chapters->setId($_POST['id']);
  }

  if ($chapters->isValid())
  {
    $manager->save($chapters);
    $message = $chapters->isNew() ? 'Le chapitre a bien été ajouté !' : 'Le chapitre a bien été modifié !';
  }
  else
  {
    $errors = $chapters->errors();
  }
  {
    if (isset($message))
  }
  {
  echo $message, '<br />';
  }
}
//A insérer dans le tableau gestion des erreurs
if (isset($erreurs) && in_array(News::AUTEUR_INVALIDE, $erreurs)) 
echo 'L\'auteur est invalide.<br />';

if (isset($erreurs) && in_array(News::TITRE_INVALIDE, $erreurs)) 
echo 'Le titre est invalide.<br />';

if (isset($erreurs) && in_array(News::CONTENU_INVALIDE, $erreurs)) 
echo 'Le contenu est invalide.<br />'; 

//A insérer dans le tableau parti contenu
if (isset($news)) echo $news->contenu(); 
if(isset($news) && !$news->isNew())

//Variable compte le nombre de chapitre
$manager->count(); 


foreach ($manager->getList() as $news);


//affichage de la boucle

{
  echo '<tr><td>', $news->auteur(), '</td><td>', $news->titre(), '</td><td>', $news->dateAjout()->format('d/m/Y à H\hi'), '</td><td>', ($news->dateAjout() == $news->dateModif() ? '-' : $news->dateModif()->format('d/m/Y à H\hi')), '</td><td><a href="?modifier=', $news->id(), '">Modifier</a> | <a href="?supprimer=', $news->id(), '">Supprimer</a></td></tr>', "\n";

}


