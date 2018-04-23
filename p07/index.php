<?php session_start(); ?>
<?php include 'forms.php'; ?>
<?php include 'posts.php'; ?>
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
    <form action="input.php" method="POST">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="surname" placeholder="surname">
        <input type="text" name="email" placeholder="email">
        <input type="submit" value="Add Author" name="btnAddAuthor"><br>
        <!--        show msg if input is empty-->
        <?php setErrorMsg("autMsg"); ?>
    </form>
    <hr>
    <form action="input.php" method="POST">
        <input type="text" name="title" placeholder="title"><br>
        <textarea name="post" cols="30" rows="10" placeholder="post..."></textarea><br>
        Author: <select name="authorSelect">
            <!--        show <select> elements-->
            <?php authorSelectList(); ?>
        </select>
        <input type="submit" value="Add Post" name="btnAddPost"><br>
        <!--        show msg if input is empty-->
        <?php setErrorMsg("postMsg"); ?>
    </form><br>
    <a href="index.php?posts=true">Show Posts</a>
    <!--        show posts-->
    <?php isset($_GET['posts'])? getPosts() : null; ?>
</body>
</html>