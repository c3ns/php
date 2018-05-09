<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({
            selector:'textarea',
            plugins: 'paste, image'
        });</script>
</head>
<body>
    <form enctype="multipart/form-data" action="send.php" method="POST">
        <input type="text" name="adress" placeholder="adress"><bR>
        <input type="text" name="subject" placeholder="subject"><br>
        <textarea name="content" id="" cols="30" rows="10"></textarea><br>
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
        <input type="file" name="pictures[]" multiple/>
        <input type="submit" value="Send.." name="sendMail">
    </form>
</body>
</html>