<?php

namespace Sts\Controller;

if(!defined('URL'))
{
    header("Location: /");
    exit();
}

class Blog
{
    public function index()
    {
        echo "Página Blog<br>";
    }
}