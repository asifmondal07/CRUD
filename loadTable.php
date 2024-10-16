<?php
include 'db_connect.php';

$sql="SELECT * FROM `user`";
$result=mysqli_query($conn,$sql);
$output="";
if(mysqli_num_rows($result)>0){
    $output='<table width=100% cellspeacing="0" cellpadding="0">
                <tr>
                    <th width="50px">ID</th>
                    <th width="100px">Name</th>
                    <th width="100px">Phone</th>
                    <th width="100px">Email</th>
                    <th width="100px">Image 1</th>
                    <th width="100px">Image2</th>
                    <th width="100px">Edit</th>
                    <th width="100px">Delete</th>
                </tr>';
            while($row=mysqli_fetch_assoc($result)){
                $output.="
                <tr>
                    <td> $row[id]</td>
                    <td> $row[name]</td>
                    <td> $row[phone_number]</td>
                    <td> $row[email]</td>
                    <td> <img src='$row[img1]' height='90px' width'90px'></td>
                    <td> <img src='$row[img2]' height='90px' width'90px'></td>
                    <td><button  class='btn btn-outline-success edit_btn' data-id='$row[id]'>EDIT</button></td>
                    <td> <button class='btn btn-outline-danger delete_btn' data-id='$row[id]'>DELTE</button></td>
                </tr>";
            }
    $output.='</table>';
    mysqli_close($conn);
    echo $output;
}else{
    echo"No Data Here";
}

?>