<?php
require ("vendor/autoload.php");

use Models\Student;
use Models\Module;
use Models\Mark;


isset($_POST['btnAddStudent'])? addStudent() : null;
isset($_POST['btnAddModule'])? addModule() : null;
isset($_POST['btnAddMark'])? addMark() : null;

function addStudent(){
    $student = new Student(validate('studentNo'),validate('surname'),validate('forename'));
    $student->save();
}
function addModule(){
    $module = new Module(validate('moduleCode'), validate('moduleName'));
    $module->save();
}
function addMark(){
    $mark = new Mark($_POST['studentSelect'], $_POST['moduleSelect'], validate('mark'));
    $mark->save();
}

function validate($input){
    return filter_input(INPUT_POST, $input, FILTER_SANITIZE_SPECIAL_CHARS);
}
header("Location: index.php");