<?php
namespace Models;

use Models\Db\DB;
use PDO;

class Jokes extends DB
{
    private function selectData(){
        $sql = "SELECT id, content FROM chuck";
        return parent::query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    static public function delete($id){
        $sql = "DELETE FROM chuck WHERE id = :id";
        $data = ['id' => $id];
        parent::query($sql, $data);
    }
    static public function edit($id, $content){
        $sql = "UPDATE chuck SET content = :content WHERE id = :id";
        $data = [
            'id' => $id,
            'content' => $content
        ];
        parent::query($sql, $data);
    }
    static public function getContentById($id){
        $sql = "SELECT content FROM chuck WHERE id = :id";
        $data = ['id' => $id];
        return parent::query($sql,$data)->fetch(PDO::FETCH_ASSOC);
    }
    static public function getAllJokes(){
        $data = self::selectData();
        if(count($data) > 0)
            return $data;
    }
}