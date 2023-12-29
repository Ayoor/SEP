<!-- <?php
include "connection.php";


if(isset($_POST["submit"])) {
    $image = $_FILES["image"]["tmp_name"];
    $imageData = addslashes(file_get_contents($image));
    $imageType = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

    // Insert image data into the database
    $sql = "INSERT INTO imgtest ('id', `image`, 'img_type') VALUES ('', '$imageData', '$imageType')";
    
    if ($link->query($sql) === TRUE) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>

<body>

<img width="20%" src="<?php
// Retrieve image data from the database
$sql = "SELECT `image`, img_type FROM imgtest WHERE id = 1"; // Replace '1' with the actual image ID

$result = $link->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $image = $row["image"];
    $imageType = $row["img_type"];

    // Display the image using base64 encoding
    echo 'data:image/' . $imageType . ';base64,' . base64_encode($image);
} else {
    echo "Image not found.";
}

$link->close();
?>" alt="">

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <button type="submit" name="submit">Upload Image</button>
    </form>
</body>
</html> -->

<?php
include "connect.php";


if(isset($_POST["submit"])) {
    $image = $_FILES["image"]["tmp_name"];
    $imageData = addslashes(file_get_contents($image));
    $imageType = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

    // Insert image data into the database
    $sql = "INSERT INTO imgtest (id, `image`, img_type) VALUES ('', '$imageData', '$imageType')";
    
    if ($link->query($sql) === TRUE) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>

<body>

<img width="20%" src="<?php
// Retrieve image data from the database
$sql = "SELECT `image`, img_type FROM imgtest WHERE id = 1"; // Replace '1' with the actual image ID

$result = $link->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $image = $row["image"];
    $imageType = $row["img_type"];

    // Display the image using base64 encoding
    echo 'data:image/' . $imageType . ';base64,' . base64_encode($image);
} else {
    echo "Image not found.";
}

$link->close();
?>" alt="">

    <form method="post" enctype="multipart/form-data">
        <div>
             <input type="file" name="image" accept="image/*" required>
        <button type="submit" name="submit">Upload Image</button>
        </div>
       
    </form>
</body>
</html>