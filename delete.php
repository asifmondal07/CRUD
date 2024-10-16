<?php
include 'db_connect.php';


$id=$_POST['id'];

$sql1="SELECT * FROM user WHERE id=$id";
$result=mysqli_query($conn,$sql1);
if($row=mysqli_fetch_assoc($result)){

    if(file_exists($row['img1']) || file_exists($row['img2'])){
        unlink($row['img1']);
        unlink($row['img2']);
    }
    
}
$sql="DELETE FROM user WHERE id= $id";
if(mysqli_query($conn,$sql)){
    echo 1 ;
}else{
    echo 0;
}


?>