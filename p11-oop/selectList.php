<?php
function studentSelectList(){
    $sql = "SELECT student_no FROM students";
    $sth = getDB()->query($sql);
    foreach($sth as $row){
        echo "<option value='". $row['student_no'] ."'>". $row['student_no'] ."</option>";
    }
}
function moduleSelectList(){
    $sql = "SELECT module_name, module_code FROM modules";
    $sth = getDB()->query($sql);
    foreach($sth as $row){
        echo "<option value='". $row['module_code'] ."'>". $row['module_name'] ." (".$row['module_code'].")</option>";
    }
}