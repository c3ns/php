<?php
session_start();
//-------------1----------------//

function checkForms($name, $pass){
    if(!empty($name) && !empty($pass)){
        $_SESSION['username'] = $name;
    }
    header("Location: index.php");
}
checkForms($_POST['username'], $_POST['password']);

//--------------2-----------------//
$user = [
    'username' => 'admin',
    'password' => 'admin123'
];
$otherUser = [
    'username' => 'test',
    'password' => 'test123'
];
function checkUser($user, $oUser){
    return ($user['username'] === $oUser['username'] && $user['password'] === $oUser['password']);
}
checkUser($user, $otherUser);

