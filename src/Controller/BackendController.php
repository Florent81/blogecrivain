<?php
namespace App\Controller;

use App\Model\frontend\Login;
use App\Model\backend\AdminChapter;
use App\Model\backend\AdminChapterManager;
use App\Model\backend\AccessManager;
use App\Model\backend\Access;
use App\Model\backend\AdminCommentsReportManager;
use App\Model\backend\AdminCommentsReport;
use App\Servicies\Authentication;

class BackendController extends \App\controller\TwigController
{
    public $msg = 'Vous ne pouvez pas vous connecter à la partie Administration';

    public function addNewChapter($title, $content) {
           $newChapter = new AdminChapter();
           $newChapter->setTitle($title);
           $newChapter->setContent($content);
           $addNewChapter = new AdminChapterManager();
           $addChapter  = $addNewChapter->addNewChapter($newChapter);
           return header("Location:adminchapitres");
    }

    public function deleteChapter($id) {
       $deleteChapter = new AdminChapterManager();
       $delete = $deleteChapter->delete($id);
       header("Location: adminchapitres");
    }

    public function updateChapter($id, $title, $content) {
       $updateChapter = new AdminChapter();
       $updateChapter->setId($id);
       $updateChapter->setTitle($title);
       $updateChapter->setContent($content);
       $updateAllChapter = new AdminChapterManager();
       $newUpdateChapter = $updateAllChapter->update($updateChapter);
       header("Location: adminchapitres");
    }

    public function showChapter($id) {
      $showChapter = new AdminChapterManager();
      $show = $showChapter->getChapter($id);
      echo $this->twig->render('showchapter.html.twig',array(
          'show' => $show
      )) ;
    }

    public function adminAllChapters() {
           $allChapters = new AdminChapterManager();
           $chapters = $allChapters->getAdminAllChapters();
           echo $this->twig->render('adminchapter.html.twig', array(
           'chapters' => $chapters,
           ));

    }

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

    public function adminChapters() {
            echo $this->twig->render('adminchapter.html.twig');
    }

    public function adminComments() {
            echo $this->twig->render('admincomment.html.twig');
    }

    public function viewCommentsReport() {
       $comment = new AdminCommentsReport();
       $comment->setreport(true);
       $commentsReport = new AdminCommentsReportManager();
       $report = $commentsReport->getAllCommentsReport();
       echo $this->twig->render('admincomment.html.twig', array(
            'comment' => $report,
        ));
    }
}
