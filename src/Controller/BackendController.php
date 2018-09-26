<?php
namespace App\Controller;

use App\Model\frontend\Login;
use App\Model\backend\AdminChapter;
use App\Model\backend\AdminChapterManager;
use App\Model\backend\AccessManager;
use App\Model\backend\Access;
use App\Model\backend\AdminCommentsReportManager;
use App\Model\backend\AdminCommentsReport;
use App\Model\frontend\Comment;
use App\Model\frontend\CommentManager;
use App\servicies\Authentication;

class BackendController extends \App\Controller\TwigController
{
    public $msg = 'Vous ne pouvez pas vous connecter à la partie Administration';
//function to add chapter;
    public function addNewChapter($title, $content) {
           $newChapter = new AdminChapter();
           $newChapter->setTitle($title);
           $newChapter->setContent($content);
           $addNewChapter = new AdminChapterManager();
           $addChapter  = $addNewChapter->addNewChapter($newChapter);
           return header("Location:adminchapitres");
    }
//function to delete chapter;
    public function deleteChapter($id) {
       $deleteChapter = new AdminChapterManager();
       $delete = $deleteChapter->delete($id);
       header("Location: adminchapitres");
    }
//function to update chapter;
    public function updateChapter($id, $title, $content) {
       $updateChapter = new AdminChapter();
       $updateChapter->setId($id);
       $updateChapter->setTitle($title);
       $updateChapter->setContent($content);
       $updateAllChapter = new AdminChapterManager();
       $newUpdateChapter = $updateAllChapter->update($updateChapter);
       header("Location: adminchapitres");
    }
//function to show chapter;
    public function showChapter($id) {
      $showChapter = new AdminChapterManager();
      $show = $showChapter->getChapter($id);
      echo $this->twig->render('showchapter.html.twig',array(
          'show' => $show
      )) ;
    }
//function to show chapters;
    public function adminAllChapters() {
           $allChapters = new AdminChapterManager();
           $chapters = $allChapters->getAdminAllChapters();
           echo $this->twig->render('adminchapter.html.twig', array(
           'chapters' => $chapters,
           ));

    }
//function allowing access to the admin area;
    public function admin() {
        if(isset($_POST['pseudo'])&& isset($_POST['pass'])) {
            Authentication::authenticate($_POST['pseudo'], $_POST['pass']);
            unset($_POST['pseudo'], $_POST['pass']);
        }
        if(Authentication::isAuthenticated()) {
            echo $this->twig->render('admin.html.twig');
            return true;
        }
        echo $this->msg;
        return (new FrontendController())->homepage();
    }
//function to return the page adminchapter;
    public function adminChapters() {
            echo $this->twig->render('adminchapter.html.twig');
    }
//function to return the page admincomment;
    public function adminComments() {
            echo $this->twig->render('admincomment.html.twig');
    }
//function to return the page addchapter;
    public function viewAddChapter() {
            echo $this->twig->render('addchapter.html.twig');
    }
//feature to see comments posted;
    public function viewCommentsReport() {
       $commentsReport = new AdminCommentsReportManager();
       $report = $commentsReport->getAllCommentsReport();
       echo $this->twig->render('admincomment.html.twig', array(
           'report' => $report,
        ));
    }
//feature to moderate comments posted;
    public function updateReport($id) {
       $comment = new Comment();
       $comment->setreport(true);
       $comment->setId($id);
       $commentReport = new AdminCommentsReportManager();
       $rep = $commentReport->update($comment);
       echo $this->twig->render('admin.html.twig', array(
           'report' => $rep,
        ));
    }
}
