<?php
namespace src\Model;
use PDO;
class Bdd {
    private static $_instance = null;

    public static function InitInstance(){
        $hostname="localhost";
        $username="root";
        $password="";

        $dbname="openmeet";

        try
        {
           self::$_instance = new PDO('mysql:host='.$hostname.';dbname='.$dbname.';charset=utf8', $username, $password);
           self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (\Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

    }

    public static function GetInstance(){
        if(self::$_instance == null ){
           self::InitInstance();
        }

        return self::$_instance;
    }

}
