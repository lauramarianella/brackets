<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (!isset($_POST["btn_submit"])) {
    ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <label for="file">Filename:</label>
            <input type="file" name="file" /><br />
            <input type="submit" name="btn_submit" value="Upload" /><br />
        </form>
    <?php
    } else {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        } else {
            echo "File size: "  . $_FILES['file']["size"]          . '<br/>';
            echo "Upload: "     . $_FILES["file"]["name"]           . "<br>";
            echo "Type: "       . $_FILES["file"]["type"]           . "<br>";
            echo "Size: "       . ($_FILES["file"]["size"] / 1024)  . " kB<br>";
            echo "Stored in: "  . $_FILES["file"]["tmp_name"];

            $file = isset($_FILES["file"]) ? file_get_contents($_FILES['file']['tmp_name']) : null;

            $allowedExts = array("gif", "jpeg", "jpg");
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            if (
                (($_FILES["file"]["type"] == "image/gif")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg"))
                && in_array($extension, $allowedExts)
            ) {
                echo "Valid file.<br/>";
            } else {
                echo "Invalid file.<br/>";
            }


            if (file_exists("upload/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists.";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
            }
        }
    }

    ?>
</body>

</html>