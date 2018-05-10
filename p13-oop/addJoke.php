<?php
require ("vendor/autoload.php");

use Models\Joke;

for($i=0;$i<5;$i++){
    $joke = new Joke;
    $joke->save();
}

header("Location: index.php");