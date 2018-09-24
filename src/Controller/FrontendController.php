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
    public function homepage() {
        $lastChapter = new ChapterManager();
        $lastest = $lastChapter->getLastChapter();
        echo $this->twig->render('index.html.twig', array(
            'lastest' => $lastest,
        ));
    }

    public function book() {
       $allChapters = new ChapterManager();
       $chapters = $allChapters->getAllChapters();
       echo $this->twig->render('book.html.twig', array(
            'chapters' => $chapters,
        ));
    }

    public function viewChapter($id) {
       $chapterManager = new ChapterManager();
       $commentChapter = new CommentManager();
       $chapter = $chapterManager->getChapter($id);
       $comment  = $commentChapter->getViewComment();
       echo $this->twig->render('viewChapter.html.twig', array(
            'chapter' => $chapter,
            'comment' => $comment,
        ));
    }

    public function endorsements() {
        echo $this->twig->render('mentionsLegales.html.twig');
    }

    public function about() {
        echo $this->twig->render('propos.html.twig');
    }

    public function login() {
        echo $this->twig->render('login.html.twig');
    }

    public function add($id_chapter, $pseudo, $content) {
       $newComment = new Comment();
       $newComment->setIdChapter($id_chapter);
       $newComment->setPseudo($pseudo);
       $newComment->setContent($content);
       $commentChapter = new CommentManager();
       $addComment  = $commentChapter->addNewComment($newComment);
       header("Location:chapitre&id={$id_chapter}");
    }

    public function reportComment($id) {
       $comment = new Comment();
       $comment->setreport(true);
       $comment->setId($id);
       $commentChapter = new CommentManager();
       $reportComment  = $commentChapter->signalComment($comment);
       header("Location:chapitres");
    }

}
