<?php
require ("vendor/autoload.php");

use Models\JsonData;
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
    <input type="text" name="search" placeholder="search..">
    <div id="data"></div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>

        $( document ).ready(function() {
            $('input').on("input",function () {
                getData($(this).val());
            });
        });
        function getData(val){
            var req = $.ajax({
                url: `api.php`,
                method: 'GET',
                data: {q: val }
            })
                .done(function(data) {
                    $("#data").html("");
                    $.each(data, function(key, val){
                        var block = `<div class="card">
                                      <div class="card-header">${val.author}</div>
                                      <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                          <p>${val.comment}</p>
                                          <footer class="blockquote-footer">${val.created_at}</footer>
                                        </blockquote>
                                      </div>
                                    </div>`;
                        $("#data").append(block);
                    })
                })
                .fail(function() {
                    $("#data").html("");
                    var block = `<div class='alert alert-danger'>Klaida</div>`;
                    $("#data").append(block);
                })
        }
    </script>
</body>
</html>