<?php
require ("vendor/autoload.php");

use Models\JsonData;

if(isset($_GET['q'])){
    $data = JsonData::getData($_GET['q']);
    if(count($data) > 0){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($data);
    }
    else
        header('HTTP/1.0 500 Internal Server Error');
}

