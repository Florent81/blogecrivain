<?php

namespace Livrable3;

use Livrable3\Login;
use Livrable3\Chapter;
use Livrable3\ChapterManager;
use Livrable3\Comment;
use Livrable3\CommentManager;

class FrontController extends src\controller\TwigController

function listPosts()
{
    $posts = getPosts();

    require('listPostsView.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('postView.php');
}

public function listArticles(int $page)
    {
        $articleManager = new ArticleManager();
        
        $articles = $articleManager->getArticles($page);
        $numbers = $articleManager->getPage($articles);
         $chapters = $articleManager->getChapters();
         
        echo $this->twig->render('listArticlesView.twig', array(
            'articles'=>$articles,
            'numbers'=>$numbers,
            'chapters'=>$chapters
        ));
        
    }