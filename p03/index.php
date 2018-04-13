<?php
//------------- 1 ---------------//

$sport = ["Football","Basketball","Volleyball","Tennis","Rugby"];
function printTable($sport){
    foreach ($sport as $key => $s)
        echo "<tr><td>".$key." ".$s."</td></tr>";
}
echo"<table>";
printTable($sport);
echo"</table>";
echo"----------</br>";
//------------- 2 ---------------//

$shopping_cart = [
    [
        'type' => 'vegetables',
        'name' => 'potato',
        'quantity' => '10',
        'price' => '1.0'
    ],
    [
        'type' => 'vegetables',
        'name' => 'onion',
        'quantity' => '5',
        'price' => '0.5'
    ],
    [
        'type' => 'vegetables',
        'name' => 'cucumber',
        'quantity' => '2',
        'price' => '1.2'
    ],
    [
        'type' => 'fruits',
        'name' => 'banana',
        'quantity' => '2',
        'price' => '1.0'
    ],
    [
        'type' => 'fruits',
        'name' => 'apple',
        'quantity' => '3',
        'price' => '1.2'
    ]
];
function filter($cart, $type){
    $total = 0;
    foreach ($cart as $c){
        if($c['type'] === $type){
            $total+=$c['quantity']*$c['price'];
            echo $c['name']."</br>";
        }
    }
    echo "price: " .$total. "<br>";
}
filter($shopping_cart, 'fruits');
echo "----<br>";
filter($shopping_cart, 'vegetables');
echo"----------</br>";

//------------- 3 ---------------//

$numbers = [5,1,9,7,3,6,4,2,8];
$something = [];
function lastElement($num){
    return empty($num)? "Array is empty" : end($num);
}
echo lastElement($numbers);
echo "<br>--<br>";
echo lastElement($something);