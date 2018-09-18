<?php
namespace App\Controller;

use App\Model\frontend\Login;
use App\Model\backend\AdminManager;
use App\Model\backend\Admin;
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
        $authentication = new AccessManager();
        if (isset($_POST) && !empty($_POST)){
            //Je regarde ce qu'il y a comme champs
            //si ça me convient j'enregistre ça en bdd ou session
        }

        echo $this->twig->render('admin.html.twig');

    }

    public function admin()
    {

        echo $this->twig->render('admin.html.twig');

    }



}
