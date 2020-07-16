<?php
session_start();

if (isset($_SESSION['name']))
{
    $username = $_SESSION['name'];
}

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
    <title>User login</title>
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
 
        * {
            padding: 0;
            margin: 0;
            box-sizing: content-box;
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

        
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-success text-center">
            <?php if (isset($_COOKIE['mycookie'])) $username = $_COOKIE['mycookie'];
                echo "Wellcome ".$username;
            ?></h1>
            <ul class="d-flex flex-row justify-content-around border align-items-center">
                <li><a href="view-product.php" class="btn btn-outline-success">Home</a></li>
                <li>
                    <button class="profile btn btn-outline-info" onclick="myfunction()">
                        My profile
                    </button>
                </li>
                <li><button class="btn btn-outline-warning">Change password</button></li>
                <li>
                    <form action="view.php" method="POST">
                        <input type="submit" value="Logout" name="logout" class="submit btn btn-outline-warning">
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
        <script>
        function myfunction(){
            document.getElementById("profile").style.display = "block";
        }
    </script>
</body>

</html>