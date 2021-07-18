<?php

namespace Core;

class ConfigController 
{

    private $url;
    private $urlConjunto;
    private $urlController;
    private $urlParam;
    private static $formato;

    public function __construct()
    {
        if(!empty(filter_input(INPUT_GET, "url", FILTER_DEFAULT)))
        {
            $this->url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);
            $this->limparUrl();
            $this->urlConjunto = explode("/", $this->url);

            if(isset($this->urlConjunto[0]))
            {
                $this->urlController = $this->slugController($this->urlConjunto[0]);
            }
            else
            {
                $this->urlController = CONTROLLER;
            }

            if(isset($this->urlConjunto[1]))
            {
                $this->urlParam = $this->urlConjunto[1];
            }
            else
            {
                $this->urlParam = null;
            }
            // echo "URL: ".$this->url."<br>";
            // echo "Controller: ".$this->urlController."<br>";
        }
        else
        {
            $this->urlController = CONTROLLER;
            $this->urlParam = null;
        }

    }

    private function limparUrl()
    {
        // Eliminar tags
        $this->url = strip_tags($this->url);

        // Eliminar Espaços
        $this->url = trim($this->url);

        // Eliminar a barra no final da URL
        $this->url = rtrim($this->url, "/");

        self::$formato = array();
        self::$formato['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        self::$formato['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr--------------------------------';
        $this->url = strtr(utf8_decode($this->url), utf8_decode(self::$formato['a']), self::$formato['b']);
    }

    private function slugController($slugController)
    {
        $urlController = strtolower($slugController);
        $urlController = explode("-", $urlController);
        $urlController = implode(" ", $urlController);
        $urlController = ucwords($urlController);
        $urlController = str_replace(" ","",$urlController);
        return $urlController;
    }

    public function carregar()
    {
        $classe = "\\Sts\\Controller\\".$this->urlController;
        $classeCarregar = new $classe;
        $classeCarregar->index();
    }
}