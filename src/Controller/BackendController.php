<?php
namespace App\Controller;

use App\Model\frontend\Login;
use App\Model\backend\AdminManager;
use App\Model\backend\Admin;
use App\Model\backend\Crud;
use App\Model\backend\DBFactory;
use App\Model\backend\NewsManagerMySQLi;
use App\Model\backend\NewsManagerPDO;

class BackendController extends \App\controller\TwigController
{
    public function authentication()
    {
        $authentication = new AdminManager();
        $authentication = $authentication->getLastChapter();
       
        echo $this->twig->render('index.html.twig', array(
            'lastest' => $lastest,
        ));

    }

    public function admin()
    {
      
        echo $this->twig->render('admin.html.twig');
        
    }
}