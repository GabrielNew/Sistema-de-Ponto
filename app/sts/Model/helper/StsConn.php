<?php

namespace Sts\Model\helper;

use PDO;
use PDOException;

if(!defined('URL'))
{
    header('Location: /');
    exit();
}

class StsConn
{
   public static $host = HOST;
   public static $user = USER;
   public static $password = PASSWORD;
   public static $dbname = DBNAME;
   private static $connect = null;

   private static function conectar()
   {
       try
       {
           if(self::$connect == null)
           {
                self::$connect = new PDO('mysql:host='.self::$host.';dbname='.self::$dbname,self::$user,self::$password);
           }
       }
       catch(PDOException $exc)
       {
            echo('Mensagem '.$exc->getMessage());
            die;
       }
       return self::$connect;
   }

   public function getConn()
   {
       return self::conectar();
   }
}