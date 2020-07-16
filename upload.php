<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
    [type="file"] {
        height: 0;
        overflow: hidden;
        width: 0;
        }
        input {
            margin: 10px 0px
        }
    .file:after {
        content: 'Select file';
        color: white;

        padding: 2px; margin-left: 10px;
        background: rgb(53, 132, 235);
        border-radius: 10px;
        
    }
    </style>
</head>
<body>
    <div>
        <h1 class="text-center">Upload</h1>
        <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data" class="form-group d-flex flex-column w-50 border p-2">
        <label for="">File name</label>
        <input type="text" name="filename">

        <label for="">Image title</label>
        <input type="text" name="filetitle">

        <label for="">Image description</label>
        <input type="text" name="filedesc">

        <label for="file" class="file">Your image:</label>
        <input type="file" name="file" id="file">

        <div class="box-submit">
            <a href="admin.php" class="back">Back</a>
            <input type="submit" value="Upload" name="submit" class="mt-3"> 
        </div>
        </form>
    </div>
</body>
</html>
