<?php
require ("vendor/autoload.php");

use Models\FillDb;

for($i=0;$i<5;$i++){
    $joke = new FillDb;
    $joke->save();
}

header("Location: index.php");