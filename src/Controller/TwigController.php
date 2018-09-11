<?php

namespace App\Controller;

use Twig_Environment;
use Twig_Extension_Debug;
use Twig_Loader_Filesystem;
use Twig_Extension_Session;

class TwigController
{
    protected $twig;
    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(array('./src/View', './src/View/frontend', './src/View/backend'));
        $this->twig = new Twig_Environment($loader, array( 'cache' => false, 'debug' => true ));
        $this->twig->addExtension(new Twig_Extension_Debug());
    }
}