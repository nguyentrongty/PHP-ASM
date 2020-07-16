
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
        <form action="delete.php" method="POST" class="form-group d-flex flex-column w-50 border p-2">
        <label for="">Input product what you want delete:</label>
        <input type="text" name="name"> <br>  

        <div class="box-submit">
                <a href="admin.php" class="back">Back</a>
                <input type="submit" value="submit" name="submit" class="mt-3"> 
        </div>
    </form>
    </div>
</body>
</html>
<?php
session_start();
require_once 'connectdb.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn -> connect_errno) die("Connect DB error");

if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    $query = "select * from product where proName = '$name'";
    $result = $conn->query($query);
    $row = $result->num_rows;
    if ($row > 0)
    {
        $query = "delete from product where proName = '$name'";
        $result = $conn->query($query);
        echo "<h1 class='text-success text-center'>Delete product 100%</h1>";
    }
    else {
        echo "<script>alert('Nothing product');</script>";
    }
}
?>