<?php
session_start();
require_once 'connectdb.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn -> connect_errno) die("Connect DB error");
// echo <<<_END
// <form action = "login.php" method = "POST"><pre>
// Name            <input type="text" name="name"><br>
// Password        <input type="password" name="password"><br>
//                 <input type="submit" value="Login" name="login"> 
//                 <input type="checkbox" value="1" name="rmm"><label for="">Remember Me</label>
// </pre></form>
// _END;
if (isset($_POST['login']))
{
    $name = $_POST['name'];
    $password = $_POST['password'];


    $query = "select * from user where name = '$name'";
    $result = $conn -> query($query);
    if ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_NUM);
        $result->close();
        if (password_verify($password,$row[2]))
        {
            $_SESSION['userID'] = $row[0];
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $hash;
            $_SESSION['email'] = $row[3];
       if (isset($_POST['rmm']) && $_POST['rmm'] == '1')
       {
            setcookie('mycookie',$name.' '.$password,time()+3600);
       }
       if ($row[4] == 1)
       {
           header("location: admin.php");
       } else header("location: view.php");
        } else echo "Login fail !";
    }
}
?>
<!--  -->
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
    <div class="container d-flex align-items-center flex-column">
        <h1 class="font-weight-bold">Login</h1>
        <form action="login.php" method="post" class="form-group d-flex flex-column w-50 border p-2">
            <label for="name">User Name:</label>
            <input type="text" name="name" id="name"></br>

            <label for="pass">Pass:</label>
            <input type="password" name="password" id="pass"></br>

            <div class="form-footer">
                <span>
                    <input type="checkbox" value="1" name="rmm" id="checkbox">
                    <label for="checkbox" class="ml-1">remember</label>
                </span>
                <a href="register.php">Register</a>
            </div>
            <input type="submit" value="Login" name="login">  
        </form>
    </div>
</body>

</html>
