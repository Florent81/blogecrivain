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

elseif ($url == "chapitre/id=".$id)
{
    $chapter = new FrontendController();
    $chapter->chapter($_GET['id']);
}   
