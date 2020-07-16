<?php
session_start();
if (isset($_POST['submit'])){
    $newFileName = $_POST['filename'];
    if (empty($newFileName)){
        $newFileName = "gallery";
    } else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];

    $file = $_FILES['file'];
    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    $fileExt = explode(".",$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("jpeg","jpg","png");



    if (in_array($fileActualExt, $allowed)){
        if ($fileError === 0){
            if ($fileSize < 3000000){
                $imageFullName = $newFileName . "." . uniqid("",true) . "." . $fileActualExt;
                $fileDestination = "../img/gallery/" . $imageFullName;
                include_once "dbh.inc.php";
                if (empty($imageTitle) || empty($imageDesc)){
                    header("Location: ../gallery.php?upload=empty");
                    exit();
                } else {
                    $sql = "select * from gallery";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt,$sql)){
                        echo "SQL statement failed !";
                    }
                    else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        $setImageOrder = $rowCount + 1;

                        $name = $_SESSION['name'];
                        $desc = $_SESSION['desc'];
                        $price = $_SESSION['price'];
                        $amount = $_SESSION['amount'];

                        $query = "insert into product values ('','$name','$desc','$price','$amount')";
                        $result = $conn->query($query);

                        $query2 = "select proID from product where proName = '$name'";
                        $result2 = $conn->query($query2);
                        if ($result2 -> num_rows) {
                            $row = $result2->fetch_array(MYSQLI_NUM);
                            $query3 = "INSERT INTO `gallery`(`titleGallery`, `descGallery`, `imgFullNameGallery`, `orderGallery`, `proID`) VALUES ('$imageTitle','$imageDesc','$imageFullName','$setImageOrder','$row[0]')";
                            $result3 = $conn->query($query3);
                        }
                        move_uploaded_file($fileTempName, $fileDestination);
                        header('location: ../add.php');
                    }
                }
            } else {
                echo "file size is too big !";
                exit();
            }
        } else{
            echo "you had an error !";
            exit();
        }
    } else {
        echo "you need to upload a proper file type !";
        exit();
    }
}
?>
