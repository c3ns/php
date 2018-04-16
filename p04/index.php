<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        p{
            color: red;
        }
    </style>
</head>
<body>
<form action="user.php" method="POST">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <input type="submit" value="Login"><br>
    <?php
        $msg = !empty($_SESSION['username'])? "<p>Welcome back ".$_SESSION['username']."</p>" : "";
        echo $msg;
    ?>
</form>
</body>
</html>