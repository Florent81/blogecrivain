<?php

namespace App\Controller;

use App\Model\frontend\Login;
use App\Model\frontend\Chapter;
use App\Model\frontend\ChapterManager;
use App\Model\frontend\Comment;
use App\Model\frontend\CommentManager;
use App\Model\frontend\User;
use App\Model\frontend\UserManager;

class FrontendController extends \App\Controller\TwigController
{
    public function homepage()
    {
        $lastChapter = new ChapterManager();
        $lastest = $lastChapter->getLastChapter();
       
        echo $this->twig->render('index.html.twig', array(
            'lastest' => $lastest,
        ));

    }

    public function book()
    {
       $allChapters = new ChapterManager();
       $chapters = $allChapters->getAllChapters();

        echo $this->twig->render('book.html.twig', array(
            'chapters' => $chapters,
           
        ));
        
    }

    public function viewChapter($id)
    {
       $chapterManager = new ChapterManager();
       $chapter = $chapterManager->getChapter($id);

        echo $this->twig->render('viewChapter.html.twig', array(
            'chapter' => $chapter,
           
        ));
        
    }

    public function viewComment($id_chapter)
    {
       $commentChapter = new CommentManager();
       $comment  = $commentChapter->getViewComment($id_chapter);

        echo $this->twig->render('viewChapter.html.twig', array(
            'comment' => $comment,    
        ));
          
    }

    public function endorsements()
    {
      
        echo $this->twig->render('mentionsLegales.html.twig');
        
    }

    public function about()
    {
      
        echo $this->twig->render('propos.html.twig');
        
    }

    public function login()
    {
      
        echo $this->twig->render('login.html.twig');
        
    }



}