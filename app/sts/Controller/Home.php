<?php

namespace Sts\Controller;

if(!defined('URL'))
{
    header("Location: /");
    exit();
}

class Home
{

    public function index()
    {
        $carregarView = new \Core\ConfigView("sts/View/home/home");
        $carregarView->renderizar();
    }

}