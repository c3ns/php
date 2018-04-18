<?php
session_start();
date_default_timezone_set ("Europe/Vilnius");

function uploadFile(){
    if(isset($_GET['upload'])) {
        $good_array = normalize_files_array($_FILES);
        foreach($good_array['userfile'] as $file) {
            $uploaddir = __DIR__ . "\\uploads\\";
            $uploadfile = $uploaddir . ($file['name']);
            if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
                $_SESSION['msg'] = "File is valid, and was successfully uploaded.\n";
                writeData(($file['name']));
            } else {
                $_SESSION['msg'] = "Possible file upload attack!\n";
            }
        }
    }
}
function normalize_files_array($files = []) {
    $normalized_array = [];
    foreach($files as $index => $file) {
        if (!is_array($file['name'])) {
            $normalized_array[$index][] = $file;
            continue;
        }
        foreach($file['name'] as $idx => $name) {
            $normalized_array[$index][$idx] = [
                'name' => $name,
                'type' => $file['type'][$idx],
                'tmp_name' => $file['tmp_name'][$idx],
                'error' => $file['error'][$idx],
                'size' => $file['size'][$idx]
            ];
        }
    }
    return $normalized_array;
}
function writeData($fName){
    $file = 'files.txt';
    $data = $fName." - ". date("Y-m-d H:i:s") . PHP_EOL;
    if(!file_exists($file)){
        file_put_contents($file, $data);
    } else {
        file_put_contents($file, $data, FILE_APPEND);
    }
}
function readData(){
    $file = 'files.txt';
    (isset($_GET['read']) && file_exists($file))? $_SESSION['fileData'] = file($file) : null;
}
uploadFile();
readData();
header("Location: index.php");

