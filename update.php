<?php
session_start();
require_once 'connectdb.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn -> connect_errno) die("Connect DB error");

if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];

    $query = "select * from product where proName = '$name'";
    $result = $conn->query($query);
    $row = $result->num_rows;
    if ($row > 0)
    {
        $query = "update product set proDesc = '$desc', price= '$price', amount = '$amount'";
        $result = $conn->query($query);
        if ($result) echo "Update successful !";
    } else echo "Product you has choice no exits !";
}
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
</head>
<body>
    <form action="update.php" method="POST" class="form-group d-flex flex-column w-50 border p-2">
              <label for="">Product Name </label>        
              <input type="text" name="name"> <br>
              <label for="">Product Description</label>  
              <input type="text" name="desc"> <br>
              <label for="">Price</label>                
              <input type="text" name="price"> <br>
              <label for="">Amount</label>               
              <input type="text" name="amount"> <br>
               <div class="box-submit">
                    <a href="admin.php" class="back">Back</a>
                    <input type="submit" value="submit" name="submit" class="mt-3"> 
                </div>
    </form>
</body>
</html>