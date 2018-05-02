<?php
spl_autoload_register(function ($class) {
    include 'src/' . $class . '.class.php';
});
isset($_POST['btnAddStudent'])? addStudent() : null;
isset($_POST['btnAddModule'])? addModule() : null;
isset($_POST['btnAddMark'])? addMark() : null;

function addStudent(){
    $student = new Student(validateA('studentNo'),validateA('surname'),validateA('forename'));
    $student->save();
}
function addModule(){
    $module = new Module(validateA('moduleCode'), validateA('moduleName'));
    $module->save();
}
function addMark(){
    $mark = new Mark($_POST['studentSelect'], $_POST['moduleSelect'], validateA('mark'));
    $mark->save();
}

function validateA($input){
    return filter_input(INPUT_POST, $input, FILTER_SANITIZE_SPECIAL_CHARS);
}
header("Location: index.php");