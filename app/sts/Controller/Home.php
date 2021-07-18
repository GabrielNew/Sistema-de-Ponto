<?php

namespace Sts\Controller;

if(!defined('URL'))
{
    header("Location: /");
    exit();
}

class Home
{
    private $dados;

    public function index()
    {
        $home = new \Sts\Model\StsHome();
        $this->dados = $home->index();
        
        $carregarView = new \Core\ConfigView("sts/View/home/home", $this->dados);
        $carregarView->renderizar();
    }

}