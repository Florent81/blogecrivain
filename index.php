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
    if($url == "accueil") {
        $homepage=new FrontendController();
        $homepage->homepage();
    }
    elseif ($url == "chapitres") {
        $book = new FrontendController();
        $book->book();
    }
    elseif ($url == "chapitre") {
        if(isset($_GET['id'])) {
           $chapter = new FrontendController();
           $chapter->viewChapter($_GET['id']);
        }
    }
    elseif ($url == "mentions-legales") {
        $endorsements = new FrontendController();
        $endorsements->endorsements();
    }
    elseif ($url == "a-propos") {
        $about = new FrontendController();
        $about->about();
    }
    elseif ($url == "authentification") {
        $login = new FrontendController();
        $login->login();
    }
    elseif ($url === 'admin040591') {
        $authentication = new BackendController();
        $authentication->admin();
    }
    elseif ($url == "addComment") {
        $newComment = new FrontendController();
        $newComment->add($_GET['id'], $_POST['pseudo'],$_POST['content']);
    }
    elseif ($url == "reportComment") {
        $reportComment = new FrontendController();
        $reportComment->reportComment($_GET['id']);
    }
    elseif ($url == "adminchapitres"){
        $viewChapters = new BackendController();
        $viewChapters->adminAllChapters();
    }
    elseif ($url == "deleteChapter") {
       if(isset($url) && !empty($_GET['id'])) {
           $delete = new BackendController();
           $delete->deleteChapter($_GET['id']);
       }
       else {
       echo "";
       }
     }
     elseif ($url == "updateChapter") {
        if(isset($url) && !empty($_GET['id'])) {
            $updateChapter = new BackendController();
            $updateChapter->updateChapter($_GET['id'], $_POST['title'],$_POST['content']);
        }
        else {
            return (new ErrorController())->error404();
        }
      }
    elseif ($url == "admincommentaires") {
            $adminComments = new BackendController();
            $adminComments->viewCommentsReport();
    }
    elseif ($url == "addchapter") {
        $viewAddChapter = new BackendController();
        $viewAddChapter->viewAddChapter();
    }
    elseif ($url == "showchapter") {
            $showChapter = new BackendController();
            $showChapter->showChapter($_GET['id']);
    }
    elseif ($url == "ajoutChapitre") {
        $newChapter = new BackendController();
        $newChapter->addNewChapter($_POST['title'],$_POST['content']);
    }
    elseif ($url == "listCommentReport") {
        $listReport = new BackendController();
        $listReport->viewCommentsReport();
    }

    elseif ($url == "updateComment") {
            $updateComment = new BackendController();
            $updateComment->updateReport($_GET['id']);
    }

    elseif ($url == "") {
        ( new \App\Controller\ErrorController() )->error404();
    }
