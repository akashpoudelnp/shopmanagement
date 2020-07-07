<?php require("db.php"); ?>
<?php
 if (isset($_POST['upload'])) 
{
    $image = $_FILES['image']['name'];
    $target_dir = "storage/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $imname=$target_file;
    $usr = $conn->query( "INSERT INTO `candidate` (cphoto) VALUES ('$imname')");
    if (move_uploaded_file($_FILES['image']['tmp_name'], $imname)) {
        echo "Image uploaded successfully";
    }else{
        echo "Failed to upload image";
    }
}
else
{
echo "The Page Doesnot Exists";
}
?>
<form method="post" action="" enctype='multipart/form-data'>
<input type="file" name="image">
<input type="submit" name="upload">
</form>