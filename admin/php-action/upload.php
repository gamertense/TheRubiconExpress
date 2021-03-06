<?php
//Image upload section
if (isset($_FILES["file"]["type"])) {
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
        ) && ($_FILES["file"]["size"] < 5000000) //Approx. 5 MB files can be uploaded.
        && in_array($file_extension, $validextensions)
    ) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        } else {
            if (file_exists("upload/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
            } else {
                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "../../product-images/" . $_FILES['file']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
                echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
//                echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
//                echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
//                echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//                echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";

                require_once '../../dbconfig.php';

                $productName = $_POST['productName']; //here getting result from the post array after submitting the form.
                $productPrice = $_POST['productPrice'];
                $categoryID = $_POST['category'];
                //Fix file target in database
                $targetPath = "product-images/" . $_FILES['file']['name']; // Target path where file is to be stored

                try {
                    $stmt = $connect->prepare("INSERT INTO product (name, image, price, category_id) VALUES ('$productName', '$targetPath', $productPrice, $categoryID)");


                    if ($stmt->execute()) {
                        echo "Product has been added successfully!";
                    } else {
                        echo "Query Problem";
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }
    } else {
        echo "<span id='invalid'>***Invalid file Size or Type***<span>";
    }
}
?>
