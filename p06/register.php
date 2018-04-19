<?php
session_start();
$errors = [];
$bool = true;


$pdo = new PDO('mysql:host=localhost;dbname=learn', 'root', '');
$sql = "INSERT INTO users (username, password, email, name) VALUES (:username, :password, :email, :name)";
$sth = $pdo->prepare($sql);

$data = [
    'username' => checkInput($_POST['username']),
    'password' => checkInput($_POST['password'], "pass"),
    'email' => checkInput($_POST['email'], "mail"),
    'name' => checkInput($_POST['name'])
];

foreach ($data as $key => $d){
    if($d == null){
        array_push($errors, "Incorect ".$key);
        $bool = false;
    }
}
if($bool){
    $sth->execute($data);
    $_SESSION['msg'] = "Registration successful!";
    header(header("Location: login.php"));
}else{
    $_SESSION['msg'] = $errors;
    header(header("Location: index.php"));
}


function checkInput($input,$type=""){
    if($type === "mail"){
        return filter_var($input, FILTER_VALIDATE_EMAIL)? $input : null;
    }else if($type === "pass"){
        return !empty($input)? password_hash($input, PASSWORD_DEFAULT): null;
    }
    else{
        return filter_var($input, FILTER_SANITIZE_STRING)? filter_var($input, FILTER_SANITIZE_STRING) : null;
    }
}

