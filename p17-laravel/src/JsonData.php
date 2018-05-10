<?php
namespace Models;

use Models\Db\DB;
use PDO;

class JsonData extends DB
{
    public static function getData($val){
        $sql = "SELECT * FROM comments WHERE comment LIKE :search LIMIT 100";

        $data = ['search' => "%".$val."%"];

        return parent::query($sql, $data)->fetchAll(PDO::FETCH_ASSOC);
    }
}