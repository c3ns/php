<?php
session_start();
function getDB(){
    return new PDO('mysql:host=localhost;dbname=learn', 'root', '');
}
function addAuthor(){
    $sql = "INSERT INTO author (name, surname, email) VALUES (:name, :surname, :email)";
    $sth = getDB()->prepare($sql);

    $author = [
        'name' => checkInput($_POST['name']),
        'surname' => checkInput($_POST['surname']),
        'email' => checkInput($_POST['email'], "mail")
    ];
    $msgType = "autMsg";
    addErrors($sth,$author,$msgType);
}
function addPost(){
    $sql = "INSERT INTO posts (title, post, parent_id) VALUES (:title, :post, :parent_id)";
    $sth = getDB()->prepare($sql);
    echo $_POST['authorSelect'];
    $post = [
      'title' => checkInput($_POST['title']),
      'post' => checkInput($_POST['post'], "post"),
      'parent_id' => $_POST['authorSelect'],
    ];
    $msgType = "postMsg";
    addErrors($sth,$post,$msgType);
}
//check error array. if errors array is empty then wirte data to DB.
//otherwise save errors to session
function addErrors($sth,$post,$msgType){
    $errors = [];
    if(!checkErrors($post,$errors)){
        $sth->execute($post);
        $_SESSION["$msgType"] = "successful!";
    }else{
        $_SESSION["$msgType"] = $errors;
    }
    header(header("Location: index.php"));
}

//if element in data array have null,then add error to errors array
function checkErrors($data, &$errors){
    $bool = false;
    foreach ($data as $key => $d){
        if($d == null){
            array_push($errors, "Incorect ".$key);
            $bool = true;
        }
    }
    return $bool;
}
function checkInput($input, $type=""){
    if($type === "mail"){
        return filter_var($input, FILTER_VALIDATE_EMAIL)? $input : null;
    }
    else if($type === "post"){
        return !empty($input)? filter_var($input,FILTER_SANITIZE_SPECIAL_CHARS) : null;
    }
    else{
        return !empty($input)? filter_var($input, FILTER_SANITIZE_STRING) : null;
    }
}
(function(){
    isset($_POST['btnAddAuthor'])? addAuthor() : null;
    isset($_POST['btnAddPost'])? addPost() : null;
})();