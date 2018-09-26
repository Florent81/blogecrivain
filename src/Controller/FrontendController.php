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
//function that returns the home page;
    public function homepage() {
        $lastChapter = new ChapterManager();
        $lastest = $lastChapter->getLastChapter();
        echo $this->twig->render('index.html.twig', array(
            'lastest' => $lastest,
        ));
    }
//function that displays the chapters of the book;
    public function book() {
       $allChapters = new ChapterManager();
       $chapters = $allChapters->getAllChapters();
       echo $this->twig->render('book.html.twig', array(
            'chapters' => $chapters,
        ));
    }
//function that displays a whole chapter;
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
//function that displays the legal notices;
    public function endorsements() {
        echo $this->twig->render('mentionsLegales.html.twig');
    }
//feature that displays the biography of the author;
    public function about() {
        echo $this->twig->render('propos.html.twig');
    }
//function that displays the authentication page;
    public function login() {
        echo $this->twig->render('login.html.twig');
    }
//function that allows the addition of comment;
    public function add($id_chapter, $pseudo, $content) {
       $newComment = new Comment();
       $newComment->setIdChapter($id_chapter);
       $newComment->setPseudo($pseudo);
       $newComment->setContent($content);
       $commentChapter = new CommentManager();
       $addComment  = $commentChapter->addNewComment($newComment);
       header("Location:chapitre&id={$id_chapter}");
    }
//function that can report a comment;
    public function reportComment($id) {
       $comment = new Comment();
       $comment->setreport(true);
       $comment->setId($id);
       $commentChapter = new CommentManager();
       $reportComment  = $commentChapter->signalComment($comment);
       header("Location:chapitres");
    }

}
