<?php
declare(strict_types = 1);
$name = "Ernestas";

function writeName(String $name){
        echo "<h1>".$name."</h1>";
}
function writeText(String $s, bool $b){
    if($b)
        echo "<h1>".$s."</h1>";
    else
        echo $s;
    return !empty($s);
}
function emotions(String $em){
   if ($em === 'happy')
       return ':)';
   else if($em === 'sad')
       return ':(';
   else
       return ':|';
}
writeName($name);
writeText("Kazkoks tekstas", true);
writeName($name." is ".emotions('happy')." today!");