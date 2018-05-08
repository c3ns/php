<?php
require ("vendor/autoload.php");

use Models\GetData;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if(count($_GET) > 0){
    $limit = 15;
    $author = "";
    $bool = false;
    foreach ($_GET as $key => $val) {
        if($key === "limit"){
            $bool = true;
            $limit = $val;
        }
        if($key === "author"){
            $bool = true;
            $author = $val;
        }
    }
    if($bool)
        $data = new GetData($limit, $author);
    else
        echo "error";
}else{
    $data = new GetData();
}
echo json_encode($data->getJsonData());


