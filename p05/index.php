<?php session_start() ?>
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
    <form enctype="multipart/form-data" action="data.php?upload=true" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
        <input name="userfile[]" type="file" multiple/>
        <input type="submit" value="Send File"/>
    </form>
    <?php echo !empty($_SESSION['msg'])? $_SESSION['msg'] : ''; ?>
    <?php unset($_SESSION['msg']); ?>
    <br>
    <a href="data.php?read=true">Uploaded files</a>
    <br>
    <?php
    if(!empty($_SESSION['fileData'])) {
        foreach ($_SESSION['fileData'] as $line) {
            echo $line . "<br>";
        }
        unset($_SESSION['fileData']);
    }
    ?>
    <br><br>---- 3 ----- <br>
    <a href="filter.php">filter date</a><br>
    <?php
    if(!empty($_SESSION['filtered'])) {
        foreach ($_SESSION['filtered'] as $date) {
            echo $date . "<br>";
        }
        unset($_SESSION['filtered']);
    }
    ?>
</body>
</html>