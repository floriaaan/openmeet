<?php
namespace src\Controller;

use http\Message;
use src\Model\Bdd;
use src\Model\Like;
use src\Model\Messages;
use src\Model\Utilisateur;

class AbstractController {
    protected $loader;
    protected $twig;

    public function __construct()
    {
        //Conf de TWIG

        $this->loader = new \Twig\Loader\FilesystemLoader([$_SERVER['DOCUMENT_ROOT'].'/../views']);
        $this->twig = new \Twig\Environment(
            $this->loader,[
                'cache' => $_SERVER['DOCUMENT_ROOT'].'/../var/cache',
                'debug' => true
            ]
        );
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());

    }

    public function getTwig(){
        return $this->twig;
    }


}