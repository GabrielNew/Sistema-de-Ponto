<?php

namespace Core;

class ConfigView
{

    private $nome;
    private $dados;

    public function __construct($nome, $dados = null)
    {
        $this->nome = (string)$nome;
        $this->dados = $dados;
    }

    public function renderizar()
    {
        if(file_exists('app/'.$this->nome.".php"))
        {
            include('app/sts/View/include/cabecalho.php');
            include('app/'.$this->nome.".php");
            include('app/sts/View/include/rodape.php');
        }
        else
        {
            echo "ERRO AO CARREGAR A PÁGINA".$this->nome;
        }

    }
}