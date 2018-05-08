<?php
namespace Models;

use Models\Db\DB;
use PDO;

class GetData extends DB
{
    const MAX_LIMIT = 100;
    private $limit;
    private $author;

    public function __construct($limit = 15, $author = "")
    {
        if($limit <= 100 && $limit > 0)
            $this->limit = $limit;
        else
            $this->limit = null;
        $this->author = $author;

    }

    public function getJsonData(){
        $sql = "SELECT author, comment, created_at FROM comments WHERE author LIKE :author LIMIT ". $this->limit."" ;

        $data = [ 'author' => "%".$this->author."%" ];

        return parent::query($sql, $data)->fetchAll(PDO::FETCH_ASSOC);
    }
}