<?php

namespace Sts\Model;

if(!defined('URL'))
{
    header('Location: /');
    exit();
}

class StsHome
{
    private $resultado;

    public function index()
    {
        echo "listar dados<br>";
        //$conexao = new \Sts\Model\helper\StsConn();
        //$conexao->getConn();
        $listar = new \Sts\Model\helper\StsRead();
        //$listar->executeRead('sts_carousels','WHERE adms_situacoe_id=:adms_situacoe_id LIMIT :limit','adms_situacoe_id=1&limit=4');
        $listar->fullRead('SELECT nome, link FROM sts_carousels WHERE adms_situacoe_id=:adms_situacoe_id LIMIT :limit','adms_situacoe_id=1&limit=4');
        $this->resultado['sts_carousels'] = $listar->getResultado();
        //var_dump($this->resultado['sts_carousels']);
        return $this->resultado['sts_carousels'];
    }
}