<?php
include 'db_connect.php';


$id=$_POST['id'];


$sql="DELETE FROM user WHERE id= $id";
if(mysqli_query($conn,$sql)){
    echo 1 ;
}else{
    echo 0;
}


?>