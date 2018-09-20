<?php
namespace App\Controller;

use App\Model\frontend\Login;
use App\Model\backend\AdminChapter;
use App\Model\backend\AdminChapterManager;
use App\Model\backend\AccessManager;
use App\Model\backend\Access;
use App\Model\backend\Crud;
use App\Model\backend\DBFactory;
use App\Model\backend\NewsManagerMySQLi;
use App\Model\backend\NewsManagerPDO;

class BackendController extends \App\controller\TwigController
{
    public function authentication()
    {



        echo $this->twig->render('admin.html.twig');



    }

    public function addNewChapter($title, $content)
    {
       $newChapter = new AdminChapter();
       $newChapter->setTitle($title);
       $newChapter->setContent($content);

       $addNewChapter = new AdminChapterManager();
       $addChapter  = $addNewChapter->addNewChapter($newChapter);

       header("Location:chapitres");
    }


    public function admin()
    {

        echo $this->twig->render('admin.html.twig');

    }

    public function adminChapters()
    {

        echo $this->twig->render('adminchapter.html.twig');

    }
    public function adminComments()
    {

        echo $this->twig->render('admincomment.html.twig');

    }



}
