<?php
$id=$_POST['id'];

include '../CRUD/db_connect.php';


$sql="SELECT * FROM user WHERE id = $id";

$result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $output="";
                    while($row=mysqli_fetch_assoc($result)){

                        $output.="<form id='edit_form' role='form' method='post' enctype='multipart/form-data'>
                                                <div class='mb-3'>
                                                    <label for='exampleInputName' class='form-label'>Enter Name</label>
                                                    <input type='number' class='form-control ' hidden id='userid' name='userid' value='{$row["id"]}'>
                                                    <input type='name' class='form-control ' id='new_name' name='new_name' value='{$row["name"]}'>                                                           
                                                </div>
                                                <div class='mb-3'>
                                                    <label for='exampleInputName' class='form-label'>Enter Name</label>
                                                    <input type='number' class='form-control ' id='new_phone' name='new_phone' value='{$row["phone_number"]}'>                                                           
                                                </div>
                                                <div class='mb-3'>
                                                    <label for='exampleInputName' class='form-label'>Enter Name</label>
                                                    <input type='file' class='form-control ' id='new_image1' name='new_image1' value=''>                                                           
                                                </div>

                                                <div class='mb-3'>
                                                    <label for='exampleInputName' class='form-label'>Enter Name</label>
                                                    <input type='file' class='form-control ' id='new_image2' name='new_image2' value=''>                                                           
                                                </div>

                                                <div class='modal-footer'>
                                                    <button type='button' id='closed' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                    <button type='button' id='update_data' class='btn btn-primary'>UPDATE</button>
                                                </div>
                                </form>";
                    }
            mysqli_close($conn);
            echo $output;                    

    }
?>