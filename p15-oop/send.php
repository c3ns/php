<?php
require_once "vendor/autoload.php";


use Models\Mail;

if (isset($_POST['sendMail'])){
    if(!empty($_POST['adress'])){
        $adress = $_POST['adress'];
    }
    if(!empty($_POST['subject'])){
        $subject = $_POST['subject'];
    }
    if(!empty($_POST['content'])){
        $content =$_POST['content'];
    }
    $filesUploaded = [];
    fileUpload($filesUploaded);

    $mail = new Mail($adress,$subject,$content,$filesUploaded);
    $mail->sendMail();
}

function fileUpload(&$fu){
    $files = normalize_files_array($_FILES);
    foreach($files['pictures'] as $file){
        $uploaddir = __DIR__ . "\\uploads\\";
        $uploadfile = $uploaddir . ($file['name']);
        if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
            array_push($fu, $file['name']);
        } else {
            array_push($fu, false);
        }
    }
    return $fu;
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