<?php

namespace Sts\Controller;

if(!defined('URL'))
{
    header("Location: /");
    exit();
}

class SobreEmpresa
{
    public function index()
    {
        echo "Página Sobre Empresa<br>";
    }
}