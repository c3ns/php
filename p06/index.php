<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="register.php" method="POST">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="name" placeholder="name">
    <input type="submit" value="Register"><br>
</form>
    <?php
    if(!empty($_SESSION['msg'])) {
        foreach ($_SESSION['msg'] as $error) {
            echo $error . "<br>";
        }
        unset($_SESSION['msg']);
    }
    ?>
</body>
</html>   