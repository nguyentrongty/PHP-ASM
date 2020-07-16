<?php 
    require_once 'connectdb.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn -> connect_errno) die("Connect DB error");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/view_product.css">
</head>

<body>
    <div class="container-fluid">
        <h1 class="text-center">My product view</h1>
        <div class="box-view">
        <?php
            $select = "select * from product";
            $result = $conn->query($select);
            while($rows=mysqli_fetch_array($result)) {
                echo "
                    <article class='p-1'>
                            <div class='frame-img'>
                                <img src='img/gallery/balenciaga.jpg' alt=''>
                            </div>
                            <ul>
                                <li>
                                    <h5>$rows[1]</h5>
                                    <span>$rows[3]</span>
                                </li>
                                <li>
                                    <p>$rows[2]</p>
                                </li>
                                <li>Số lượng: $rows[3]</li>
                            </ul>
                    </article>
                ";
            }
        ?>
        </div>
    </div>

</body>

</html>