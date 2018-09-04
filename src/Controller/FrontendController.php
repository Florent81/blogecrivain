<?php

require('/src/Model/Login.php');
require('/src/Model/Chapter.php');
require('/src/Model/Comment.php');
require('/src/Model/CommentAdd.php');


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