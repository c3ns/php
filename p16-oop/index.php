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
    <style>
        .remove{
            background: red!important;
        }
    </style>
</head>
<body>
    <a href="addJoke.php">addJokes</a><br>
    <?php
        $data = Jokes::getAllJokes();
        foreach($data as $key => $d):
           if(count($data) == $key+1 && count($data)%2 == 1):
               echo var_dump($key); ?>
               <div class="row">
                   <div class="col-sm-6">
                       <div class="card">
                           <div class="card-body">
                               <p class="card-text"><?php echo $d['content'] ?></p>
                               <a href="action.php?id=<?php echo $d['id'] ?>" class="btn btn-primary">Edit</a>
                               <a href="action.php?id=<?php echo $d['id'] ?>&act=remove" class="btn btn-primary remove">X</a>
                           </div>
                       </div>
                   </div>
               </div>
           <?php
           endif;

           if($key%2 == 0):
                $oldKey = $key;
           else:?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text"><?php echo $data[$oldKey]['content'] ?></p>
                                <a href="action.php?id=<?php echo $data[$oldKey]['id'] ?>" class="btn btn-primary">Edit</a>
                                <a href="action.php?id=<?php echo $data[$oldKey]['id'] ?>&act=remove" class="btn btn-primary remove">X</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text"><?php echo $d['content'] ?></p>
                                <a href="action.php?id=<?php echo $d['id'] ?>" class="btn btn-primary">Edit</a>
                                <a href="action.php?id=<?php echo $d['id'] ?>&act=remove" class="btn btn-primary remove">X</a>
                            </div>
                        </div>
                    </div>
                </div>
           <?php
            endif;
        endforeach;
    ?>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>

