<?php
namespace Models\Db;

use PDO;
use Exception;

abstract class DB
{
    const HOST = "localhost";
    const DB = "learn";
    const USERNAME = "root";
    const PASSWORD = "";

    protected function getDB(){
        $dsn = "mysql:host=".self::HOST.";dbname=".self::DB."";
        try{
            return new PDO($dsn, self::USERNAME, self::PASSWORD);
        }
        catch (Exception $e){
            echo $e->getMessage();
            echo "Don`t can connect";
        }
    }

    protected function query($sql, $props = []){
        $sth = self::getDB()->prepare($sql);
        $sth->execute($props);
        return $sth;
    }
}