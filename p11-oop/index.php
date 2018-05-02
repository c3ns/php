<?php
spl_autoload_register(function ($class) {
    include 'src/' . $class . '.class.php';
});
require ("selectList.php");
require ("data.php");
?>


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
    <table>
        <tr>
            <th>Mark</th>
            <th>Module</th>
            <th>Surname</th>
            <th>Forename</th>
        </tr>
        <?php printData() ?>
    </table>
    <hr>

    <!------------------------------------->
    <!--        Homework P11-oop         -->
    <!------------------------------------->

    <b>Add Student</b>
    <form action="input.php" method="POST">
        <input type="text" name="studentNo" placeholder="Student No">
        <input type="text" name="forename" placeholder="Forename">
        <input type="text" name="surname" placeholder="Surname">
        <input type="submit" value="Add Student" name="btnAddStudent">
    </form>
    <hr>
    <b>Add Module</b>
    <form action="input.php" method="POST">
        <input type="text" name="moduleCode" placeholder="Module Code">
        <input type="text" name="moduleName" placeholder="Module Name">
        <input type="submit" value="Add Module" name="btnAddModule">
    </form>
    <hr>
    <b>Add Mark</b>
    <form action="input.php" method="POST">
        <select name="studentSelect">
            <?php studentSelectList(); ?>
        </select>
        <select name="moduleSelect">
            <?php moduleSelectList(); ?>
        </select>

        <input type="text" name="mark" placeholder="Student Mark">
        <input type="submit" value="Add Mark" name="btnAddMark">
    </form>
</body>
</html>
