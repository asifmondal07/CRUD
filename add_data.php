<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name=$_POST['name'] ?? '';
        $email=$_POST['email'] ?? '';
        $phone=$_POST['number'] ?? '';
        
        $image_des1=$image_des2='';
        $upload_dir="uploading/";

        function ImageUpload($file,$upload_dir){
            
                $image_name=basename($file['name']);
                $image_dest=$upload_dir.$image_name;
            
                // Move the uploaded file to the target directory
                if (!move_uploaded_file($file["tmp_name"], $image_dest)) {
                    return "Failed to Move Upload File";
                }
            
                return $image_dest;
            
        }
        
    $imge_des1=ImageUpload($_FILES['img1'],$upload_dir);
    $imge_des2=ImageUpload($_FILES['img2'],$upload_dir);
    
    include 'db_connect.php';

    $sql = "INSERT INTO `user` (`name`, `phone_number`, `email`, `img1`, `img2`) VALUES ('$name', '$phone', '$email', '$imge_des1', '$imge_des2')";

    if($conn->query($sql) === true){
        echo"NEW RECORD UPLOADED SUCCESSFULL";
    }else{
        echo"ERROR:".$sql."<br>".$conn-error;
    }
}
$conn->close();



?>