<?php


namespace src\Controller;


class HomeController extends AbstractController
{

    public function Install() {
        return $this->twig->render('install.html.twig');
    }

}