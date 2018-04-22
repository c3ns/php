<?php
function getDB(){
    return new PDO('mysql:host=localhost;dbname=learn', 'root', '');
}
function getPosts(){
    $sql = "SELECT * FROM author a LEFT JOIN posts p ON p.parent_id = a.id";
    $posts = getDB()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $tmp_cat = [];
    echo '<pre>';
    foreach ($posts as $post){
        if(isset($post['parent_id'])){
            echo $post['title'] . "<br>";
            echo $post['post'] . "<br>";
            echo $post['name'] . " " . $post['surname'] . "<br>";
            echo $post['time_stamp'] . "<br><hr>";
        }

    }
    echo '<pre>';


}