<?php
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
if($url == "")
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
   $chapter = new FrontendController();
   $chapter->viewChapter($_GET['id']);
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

elseif ($url == "admin040590")
{
   $login = new FrontendController();
   $login->login();
}  
