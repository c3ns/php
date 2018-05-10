<?php
namespace Models;

use Models\Db\DB;
use PDO;

class FillDb extends DB
{
    const API_URL = "https://api.chucknorris.io/jokes/random";
    private $result = null;

    public function __construct()
    {
        $this->result = json_decode(file_get_contents(self::API_URL));
    }
    public function save()
    {
        if($this->compare()){
            $sql = "INSERT INTO chuck (icon_url, icon_id, url, content)
                VALUES (:icon_url, :icon_id, :url, :content)";

            $result = $this->result;
            $data = [
                'icon_url' => $result->icon_url,
                'icon_id' => $result->id,
                'url' => $result->url,
                'content' => $result->value
            ];
            parent::query($sql,$data);
        }
    }
    private function compare(){
        $sql = "SELECT icon_id FROM chuck WHERE icon_id = :icon_id";

        $data = ['icon_id' => $this->result->id];

        $result = parent::query($sql, $data)->fetch(PDO::FETCH_ASSOC);

        return empty($result);
    }
}