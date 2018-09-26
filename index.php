<?php
if (!session_status()){
    session_start();
}
error_reporting(E_ALL);
ini_set("display_errors", 1);
require 'vendor/autoload.php';

use App\Controller\FrontendController;
use App\Controller\BackendController;
use App\Controller\ErrorController;

    $url = "";
    if(isset($_GET['url'])) {
        $url=$_GET['url'];
    }
//Redirect to the homepage of the site;
    if($url == "accueil") {
        $homepage=new FrontendController();
        $homepage->homepage();
    }
//Redirects to all book chapters part frontend page book;
    elseif ($url == "chapitres") {
        $book = new FrontendController();
        $book->book();
    }
//Redirects to a particular chapter allows you to add comments to the chapter and report them;
    elseif ($url == "chapitre") {
        if(isset($_GET['id'])) {
           $chapter = new FrontendController();
           $chapter->viewChapter($_GET['id']);
        }
    }
//Redirects towards the legal mentions of the site;
    elseif ($url == "mentions-legales") {
        $endorsements = new FrontendController();
        $endorsements->endorsements();
    }
//Redirect to about auter;
    elseif ($url == "a-propos") {
        $about = new FrontendController();
        $about->about();
    }
//Allows authentication to the backend;
    elseif ($url == "authentification") {
        $login = new FrontendController();
        $login->login();
    }
//Redirect to the backend homepage;
    elseif ($url === 'admin040591') {
        $authentication = new BackendController();
        $authentication->admin();
    }
//Add a comment;
    elseif ($url == "addComment") {
        $newComment = new FrontendController();
        $newComment->add($_GET['id'], $_POST['pseudo'],$_POST['content']);
    }
//Report a comment;
    elseif ($url == "reportComment") {
        $reportComment = new FrontendController();
        $reportComment->reportComment($_GET['id']);
    }
//Redirect to chapter administration page;
    elseif ($url == "adminchapitres"){
        $viewChapters = new BackendController();
        $viewChapters->adminAllChapters();
    }
//Delete to chapter administration page;
    elseif ($url == "deleteChapter") {
       if(isset($url) && !empty($_GET['id'])) {
           $delete = new BackendController();
           $delete->deleteChapter($_GET['id']);
       }
       else {
       echo "";
       }
     }
//Update to chapter administration page;
     elseif ($url == "updateChapter") {
        if(isset($url) && !empty($_GET['id'])) {
            $updateChapter = new BackendController();
            $updateChapter->updateChapter($_GET['id'], $_POST['title'],$_POST['content']);
        }
        else {
            return (new ErrorController())->error404();
        }
      }
//Redirect to comment report administration page;
    elseif ($url == "admincommentaires") {
            $adminComments = new BackendController();
            $adminComments->viewCommentsReport();
    }
//Add a chapter to administration page;
    elseif ($url == "addchapter") {
        $viewAddChapter = new BackendController();
        $viewAddChapter->viewAddChapter();
    }
//Show chapter to administration page;
    elseif ($url == "showchapter") {
            $showChapter = new BackendController();
            $showChapter->showChapter($_GET['id']);
    }
//Action to add a chapter in administration page;
    elseif ($url == "ajoutChapitre") {
        $newChapter = new BackendController();
        $newChapter->addNewChapter($_POST['title'],$_POST['content']);
    }
//Show list comment report in administration page;
    elseif ($url == "listCommentReport") {
        $listReport = new BackendController();
        $listReport->viewCommentsReport();
    }
//page to moderate a comment;
    elseif ($url == "updateComment") {
            $updateComment = new BackendController();
            $updateComment->updateReport($_GET['id']);
    }
//Error handling page unknown;
    elseif ($url == "") {
        ( new \App\Controller\ErrorController() )->error404();
    }
