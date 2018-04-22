<?php

function authorSelectList(){
    $sql = "SELECT * FROM author";
    $sth = getDB()->query($sql);
    foreach($sth as $row){
        echo $row['username']."<br>";
        echo "<option value='". $row['id'] ."'>".$row['name']."</option>";
    }
}
function setErrorMsg($msgType){
    if(!empty($_SESSION["$msgType"])) {
        if(is_array($_SESSION["$msgType"])){
            foreach ($_SESSION["$msgType"] as $error) {
                echo $error . "<br>";
            }
        }else{
            echo $_SESSION["$msgType"];
        }
        unset($_SESSION["$msgType"]);
    }
}

