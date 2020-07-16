<?php
session_start();
require_once 'connectdb.php';
$conn = new mysqli($hn, $un, $pw, $db);

$name = $_SESSION['userID'];

if (isset($_POST['home'])) echo "Wellcome Home !";
if (isset($_POST['logout']))
{
    unset($_SESSION['name']);
    unset($_SESSION['password']);
    setcookie('mycookie','', time()-3600);
    header('location:login.php');
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
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: content-box;
        }
        ul {
            list-style-type: none;
            margin: auto;
        }
        
        .submit {
            outline: none;
            border: none;
            background-color: white;
            color: rgb(230, 187, 49)
        }
        li:hover .submit {
            background-color: rgb(255, 193, 7);
            color: black
        }
        label {
            font-weight: bold
        }
        input {
            border: none;
            border-bottom: 1px solid rgb(190, 189, 189);
            margin: 5px
        }
         input:focus {
            outline: none !important;
            border: none;
            border-bottom: 1px solid rgb(59, 192, 163) !important
        }

        /* ChangePassword */
        #ChangePassword, #profile {
            margin: auto;
            width: 500px; height: 400px;
            border: none
        }

        form {
            border-radius: 20px;

        }
        .change {
            color: white;
            font-weight: 900;
            border-radius: 10px;

            background: rgb(53, 132, 235) !important;
        }
        .change:hover {background: rgb(21,99,203) !important;}
        
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-success text-center">
            <?php if($conn -> connect_errno) die("Connect DB error");
                echo  "Wellcome Admin: " . $_SESSION['name'];
            ?>
        </h1>
            <ul class="d-flex flex-row justify-content-around align-items-baseline border">
                <!-- <li>
                    <a href="view-product.php" class="btn btn-outline-info">Home</a>
                </li> -->
                <li>
                    <button class="profile btn btn-outline-info" onclick="myfunction(0)">
                        My profile
                    </button>
                </li>
                <li>
                    <button class="ChangePassword btn btn-outline-info" onclick="myfunction(1)">
                        Change password
                    </button>
                </li>
               <li>
                    <a href="add.php" class="addPrd btn btn-outline-info">Add product</a>
                </li>
               <li>
                    <a href="find.php" class="FindPrd btn btn-outline-info">Find Product</a>
                </li>
               <li>
                    <a href="delete.php" class="deletePrd btn btn-outline-info">Delete Product</a>
                </li>
               <li>
                    <a href="update.php" class="updatePrd btn btn-outline-info">Update Product</a>
                </li>
                <li>
                    <form action="admin.php" method="post">
                        <input type="submit" name="logout" value="Logout" class="btn btn-outline-danger">
                    </form>
                </li>
            </ul>
    </div>
    <dialog id="profile">
        <?php
            echo '<table class="table table-striped">
            <tr>
                <th>ID</th>
                <td>'.$_SESSION['userID'].'</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>'.$_SESSION['name'].'</td>
            </tr>
            <tr>
                <th>Password</th>
                <td>'.$_SESSION['password'].'</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>'.$_SESSION['email'].'</td>
            </tr>
        </table>'
        ?>
    </dialog>
        
    <dialog id="ChangePassword">
        <form action = "admin.php" method = "POST" class="d-flex flex-column justify-content-center p-2 border">  
            <label for="lastPass">last pass</label>
            <input type="password" name="lastPass" id="lastPass" required>

            <label for="password">New Password</label>  
            <input type="password" name="password" id="Password" required>

            <label for="CFpassword">Confirm Password</label>  
            <input type="password" name="Cfpassword" id="CFPassword" required>

            <input type="submit" value="Change" name="change" class="change">   
            <!-- // Change Pass -->
            <?php 
                
            if (isset($_POST['change'])) {
                $pass1 = $_POST['password'];
                $pass2 = $_POST['Cfpassword'];
                    
                if($pass1===$pass2) {
                    $id = $_SESSION['userID'];
                    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $query = "UPDATE user SET password = '$hash' WHERE userID = '$id'";
                    $result = $conn->query($query);
                    if ($result) {
                        header("location: ok.html");
                    }
                }
            }
            ?>
            <!-- // End Change Pass -->
        </form>
    </dialog>

    <dialog id="addPrd">
    </dialog>
    
    <dialog id="FindPrd">
    </dialog>
    <dialog id="deletePrd">
    </dialog>
    
    <dialog id="updatePrd">
    </dialog>
    <script>
        var myid = ["profile", "ChangePassword", "addPrd", "FindPrd", "deletePrd", "updatePrd"];
        function myfunction(n){
            for(var i=0; i<myid.length;i++ ) {document.getElementById(myid[i]).style.display = "none";}
            document.getElementById(myid[n]).style.display = "block";
        }
    </script>
</body>

</html>