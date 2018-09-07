<?php
namespace Livrable3;

class BackendController extends src\controller\TwigController

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