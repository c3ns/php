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
    <form action="" method="POST">
        <input type="text" name="forename" placeholder="forename">
        <input type="text" name="surname" placeholder="surname">
        <input type="text" name="module_name" placeholder="module name">
        <input type="submit" value="search..." name="btnSearch">
    </form>
    <table>
        <tr>
            <th>Mark</th>
            <th>Module</th>
            <th>Surname</th>
            <th>Forename</th>
        </tr>
        <?php isset($_POST['btnSearch'])? validate() : null; ?>
    </table>

</body>
</html>

<?php

//if input forms is not empty, then array "$inputData" is filled from input forms
function validate(){
    $sql = [];       // use for sql strings.
    $inputData =[];  // use for importing data to database.

    if(!empty($_POST['forename'])) {
        makeSql($sql, " forename LIKE :forenameKey ");
        $inputData['forenameKey'] = "%".$_POST['forename']."%";
    }
    if(!empty($_POST['surname'])){
        makeSql($sql," surname LIKE :surnameKey ");
        $inputData['surnameKey'] = "%".$_POST['surname']."%";
    }
    if(!empty($_POST['module_name'])){
        makeSql($sql," module_name LIKE :moduleKey ");
        $inputData['moduleKey'] = "%".$_POST['module_name']."%";
    }
    //make full sql string
    $sqlInjection = implode("",$sql);
    printData($sqlInjection, $inputData);
}
// make and push sql injection to array
function makeSql(&$sql, $key){
    if(count($sql) == 0){
        array_push($sql, "WHERE".$key);
    }else{
        array_push($sql, "AND".$key);
    }
}


function printData($sqlInjection = "", $inputData =""){
    $data = selectData($sqlInjection, $inputData);

    if(count($data) > 0):
        foreach($data as $d):?>
            <tr>
                <td><?php echo $d['mark'] ?></td>
                <td><?php echo $d['module_name'] ?></td>
                <td><?php echo $d['surname'] ?></td>
                <td><?php echo $d['forename'] ?></td>
            </tr><?php
        endforeach;
    endif;
}
// select data form database.
// if search forms is empty then return all data from database
function selectData($sqlInjection, $inputData)
{
    $sql = "SELECT t1.mark as mark,
            t2.module_name as module_name,
            t3.surname as surname,
            t3.forename as forename
            FROM marks t1 
                LEFT JOIN modules t2
                    ON t1.module_code = t2.module_code
                LEFT JOIN students t3
                    ON t1.student_no = t3.student_no
            $sqlInjection"; // attach sql string if search forms is filled. if not then $sqlInjection is empty


    if(empty($sqlInjection) && empty($inputData)){
        $sth = getDB()->query($sql);
    }else{
        $sth = getDB()->prepare($sql);
        $sth->execute($inputData);
    }
    $data = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
function getDB(){
    return new PDO('mysql:host=localhost;dbname=learn', 'root', '');
}


