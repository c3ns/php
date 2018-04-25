<?php
declare(strict_types=1);
include ('post.class.php');
include ('person.class.php');
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
<?php
echo "---- 1 ----<br>";
//----------------- 1 -------------------
    $content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s";

    $content1 = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s";

    $post1 = new Post();

    $post1->setContent($content);
    echo $post1->getContent();

    echo "<br>--<br>";

    $post1->setContent($content1);
//---------------------------------------
    echo "<br>---- 2 ----<br>";
//----------------- 2 -------------------
    $person = new Person();
    $person->setName("John");
    $person->setId(10);

    $post = new Post();
    $post->setTitle("My titile");
    $post->setContent("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s");
    $post->setAuthor($person);

    echo $post->getTitle();
    echo "<br>";
    echo $post->getContent();
    echo "<br>";
    echo $post->getAuthor()->getName();
    echo "<br>";
    echo $post->getAuthor()->getId();
?>
</body>
</html>