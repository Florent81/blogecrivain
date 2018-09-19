<?php

if (!session_status()){
    session_start();
}

error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'vendor/autoload.php';
use App\Controller\FrontendController;
use App\Controller\BackendController;


$url = "";
if(isset($_GET['url']))
{
    $url=$_GET['url'];

}

if($url == "accueil")
{
   $homepage=new FrontendController();
    $homepage->homepage();
}

elseif ($url == "chapitres")


    {
    $book = new FrontendController();
    $book->book();
    }


elseif ($url == "chapitre")
{
    if(isset($_GET['id']))

    {
     $chapter = new FrontendController();
     $chapter->viewChapter($_GET['id']);
    }
}

elseif ($url == "mentions-legales")
{
   $endorsements = new FrontendController();
   $endorsements->endorsements();
}

elseif ($url == "a-propos")
{
   $about = new FrontendController();
   $about->about();
}

elseif ($url == "authentification")
{

   $login = new FrontendController();
   $login->login();
}

elseif ($url === 'admin040591')
{

   $authentication = new BackendController();
   $authentication->authentication();

}

elseif ($url == "addComment")
{
   $newComment = new FrontendController();
   $newComment->add($_GET['id'], $_POST['pseudo'],$_POST['content']);
}

elseif ($url == "reportComment")
{
   $reportComment = new FrontendController();
   $reportComment->reportComment($_GET['id']);
}
elseif ($url == "adminchapitres")
{
  $adminChapters = new BackendController();
  $adminChapters->adminChapters();
}
elseif ($url == "admincommentaires")
{
  $adminComments = new BackendController();
  $adminComments->adminComments();
}


elseif ($url == "")
{
    ( new \App\Controller\ErrorController() )->error404();
}
