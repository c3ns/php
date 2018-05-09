<?php
require ("vendor/autoload.php");

use Models\Mail;

for($i=0;$i<5;$i++){
    $joke = new Mail;
    $joke->save();
}

header("Location: index.php");