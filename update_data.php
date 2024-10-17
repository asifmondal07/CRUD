<?php
include '../CRUD/db_connect.php';
$id=$_POST['userid'];
$name=$_POST['new_name'];
$phone=$_POST['new_phone'];

$image1=$image2="";

$sql="SELECT * FROM user WHERE id=$id";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
    $row=mysqli_fetch_assoc($result);
    $image1=$row['img1'];
    $image2=$row['img2'];
}else {
    echo "No user found with ID $userid";
    exit();
}


// Handle image upload if a new file is uploaded
if (!empty($_FILES['new_image1']['name'])) {
    $target_dir = "uploading/";
    $target_file1 = $target_dir . basename($_FILES["new_image1"]["name"]);
    if (move_uploaded_file($_FILES["new_image1"]["tmp_name"], $target_file1)) {
        $image1 = $target_file1;
    }
}
if (!empty($_FILES['new_image2']['name'])) {
    $target_dir = "uploading/";
    $target_file2 = $target_dir . basename($_FILES["new_image2"]["name"]);
    if (move_uploaded_file($_FILES["new_image2"]["tmp_name"], $target_file2)) {
        $image2 = $target_file2;
    }
}


$sql1="UPDATE user SET `name`='$name', `phone_number`='$phone',`img1`='$image1',`img2`='$image2' WHERE id =$id";
if(mysqli_query($conn,$sql1)){
    echo 1;
}else{
    echo 0;
}



?>