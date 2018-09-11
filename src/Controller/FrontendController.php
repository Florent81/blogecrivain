<?php

namespace App\Controller;

use App\Controller\Login;
use App\Controller\Chapter;
use App\Model\ChapterManager;
use App\Controller\Comment;
use App\Controller\CommentManager;

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
}