<?php
session_start();
require_once 'connectdb.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn -> connect_errno) die("Connect DB error");

// echo "Please input Product infomation !!!";

// echo <<<_END
// <form action = "add.php" method = "POST"><pre>
//               Product Name         <input type="text" name="name"> <br>
//               Product Description  <input type="text" name="desc"> <br>
//               Price                <input type="text" name="price"> <br>
//               Amount               <input type="text" name="amount"> <br>
//                         <input type="submit" value="submit" name="submit">   <input type="submit" value="back" name="back">
// </pre></form>
// _END;
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];

    $query = "select * from product where proName = '$name'";
    $result = $conn->query($query);
    $row = $result->num_rows;
    if ($row > 0) {
        echo "Product has exits !";
    } else {
        $_SESSION['name'] = $name;
        $_SESSION['desc'] = $desc;
        $_SESSION['price'] = $price;
        $_SESSION['amount'] = $amount;
        header('location:upload.php');
    }
}
if (isset($_POST['back'])) header('location: admin.php');
if (isset($_POST['upload'])) header('location: upload.php');

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
    <div class="container">
        <h1 class="text-center">Add product</h1>
        <form action="add.php" method="POST" class="form-group w-50 border d-flex flex-column p-3">
            <label for="">Product Name</label>
            <input type="text" name="name"> <br>
        
            <label for="">Product Description</label>
            <input type="text" name="desc"> <br>
        
            <label for="">Price</label>
            <input type="text" name="price"> <br>
        
            <label for="">Amount</label>
            <input type="text" name="amount"> 

            <div class="box-submit">
                <a href="admin.php" class="back">Back</a>
                <input type="submit" value="submit" name="submit" class="mt-3"> 
            </div>
        </form>
    </div>
</body>

</html>