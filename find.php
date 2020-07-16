
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
        <form action = "find.php" method = "POST" class="form-group d-flex flex-column w-50 border p-2">
        <label for="">Input product what you want find:</label>
        <input type="text" name="name"> <br>  

        <div class="box-submit">
                <a href="admin.php" class="back">Back</a>
                <input type="submit" value="Search" name="submit" class="mt-3"> 
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
        $row = $result->fetch_array(MYSQLI_NUM);

        echo '
            <div class="container">
                <table class="table table-striped">
            <tr>
                <th>ID</th>
                <td>'.$row[0].'</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>'.$row[1].'</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>'.$row[2].'</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>'.$row[3].'</td>
            </tr>
            <tr>
                <th>Amount</th>
                <td>'.$row[4].'</td>
            </tr>
        </table>
            </div>
        ';
    }
}
?>