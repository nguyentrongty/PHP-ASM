<?php
session_start();
require_once 'connectdb.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn -> connect_errno) die("Connect DB error");
// echo <<<_END
// <form action = "newpass.php" method = "POST"><pre>
// Password        <input type="password" name="password"><br>
//                <input type="submit" value="Change" name="change">   <input type="submit" value="back" name="back">             
// </pre></form>
// _END;
// if (isset($_POST['change'])) {

        // $id = $_SESSION['userID'];
        // $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // $query = "UPDATE user SET password = '$hash' WHERE userID = '$id'";
        // $result = $conn->query($query);
        // if ($result) {
        //     echo "Change password ok !";
        // }

// }
// if (isset($_POST['back'])) header('location: login.php');
?>