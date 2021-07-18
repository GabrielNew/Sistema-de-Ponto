<?php

namespace Sts\Model\helper;

USE PDO;
use PDOException;

if(!defined('URL'))
{
    header('Location: /');
    exit();
}

class StsRead extends StsConn
{
    private $select;
    private $values;
    private $result;
    private $query;
    private $conn;

    public function getResultado()
    {
        return $this->result;
    }

    public function executeRead($tabela, $termos = null, $parseString = null)
    {
        if(!empty($parseString))
        {
            parse_str($parseString, $this->values);
        }
        $this->select = "SELECT * FROM {$tabela} {$termos}";
        echo $this->select;
        $this->exeInstrucao();
        
    }

    public function fullRead($query, $parseString = null)
    {
        $this->select = (string)$query;
        if(!empty($parseString))
        {
            parse_str($parseString, $this->values);
        }
        $this->exeInstrucao();
    }

    private function exeInstrucao()
    {
        $this->conexao();
        try
        {
            $this->getInstrucao();
            $this->query->execute();
            $this->result = $this->query->fetchAll();
        }
        catch(PDOException $exc)
        {
            $this->result = null;
            return "Mensagem".$exc->getMessage();
        }
    }

    private function conexao()
    {
        $this->conn = parent::getConn();
        echo $this->select;
        $this->query = $this->conn->prepare($this->select);
        $this->query->setFetchMode(PDO::FETCH_ASSOC);
    }

    private function getInstrucao()
    {
        if($this->values)
        {
            foreach($this->values as $link => $valor)
            {
                if($link == 'limit'||$link == 'offset')
                {
                    $valor = (int)$valor;
                }
                $this->query->bindValue(":{$link}", $valor, (is_int($valor ? PDO::PARAM_INT : PDO::PARAM_STR)));
            }
        }
    }
}