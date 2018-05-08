<?php
require ("vendor/autoload.php");

use Models\Comment;

for($i=0;$i<1000;$i++){
    $com = new Comment;
    $com->save();
}
header("Location: index.php");
