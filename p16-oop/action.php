<?php
require ("vendor/autoload.php");

use Models\Jokes;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="action.php" method="post">
        <div class="form-group">
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="5">
                <?php $asd = Jokes::getContentById($_GET['id']);
                echo $asd['content']; ?>
            </textarea>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <input type="submit" value="Edit" name="btnEdit">
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['btnEdit'])){
    Jokes::edit($_POST['id'], $_POST['content']);
    header("Location: index.php");
}


if(!empty($_GET['id']) && !empty($_GET['act']) && $_GET['id'] !== false){
    if($_GET['act'] === 'remove'){
        Jokes::delete($_GET['id']);
        header("Location: index.php");
    }
}
