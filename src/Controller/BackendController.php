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
    public function authentication($pseudo, $pass)
    {
      {
        if (isset($_POST) && !empty($_POST))
        $authentication = new AccessManager();
        $authentication->setPseudo($pseudo);
        $authentication->setPass($pass);

        echo $this->twig->render('admin.html.twig');
      }
      else {
        echo $this->twig->render('login.html.twig');
      }

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
