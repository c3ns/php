<?php
spl_autoload_register(function ($class) {
    include 'src/' . $class . '.class.php';
});

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>

<?php
 $cart = new ShoppingCart;
 $item = new ShoppingCartItem;
 $item1 = new ShoppingCartItem;

$item->name = "Tarchunas";
$item->price = 1.5;
$item->quantity = 1;
$item->id = 1;

$cart->addItem($item);

$item1->name = "Apple";
$item1->price = 0.5;
$item1->quantity = 1;
$item1->id = 2;

$cart->addItem($item1);

var_dump($cart->getItem());
echo "<br>";
$cart->deleteItem(1);
var_dump($cart->getItem());
echo "<br>";

$coffee = new Coffee;
echo "My new drink is: ".$coffee->getDrinkName();
