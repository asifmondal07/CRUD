<?php

$student_id=$_POST["id"];
$conn=mysqli_connect("localhost","root","","table")or die("Connection was failed");
$sql="DELETE FROM student where  id={$student_id}";
if(mysqli_query($conn,$sql)){
    echo 1;
}
else{
    echo 0;
}


?>