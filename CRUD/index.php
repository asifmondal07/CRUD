<?php
  $insert=false;
  $delete=false;
  $update=false;
  //connection to the databse
  $servername="localhost";
  $username="root";
  $password="";
  $database="notes";
  //create a connection
  $conn=mysqli_connect($servername, $username, $password,$database);
  if(!$conn){
      die("SORRY WE FAILED TO CONNECT".mysqli_connect_error());
  }
if(isset($_GET['delete'])){
  $sno=$_GET['delete'];
  $delete = true;
  
  $sql="DELETE FROM `notes-` WHERE `notes-`.`sno` = $sno";
  $result=mysqli_query($conn,$sql);
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset( $_POST['snoEdit'])){  
    $sno=$_POST["snoEdit"];
    $Title=$_POST["TitleEdit"];
    $Description=$_POST["DescriptionEdit"];
    
    $sql= "UPDATE `notes-` SET `Title` = '$Title',`Description` = '$Description' WHERE `sno`= $sno";

    $result=mysqli_query($conn,$sql);
    if($result){
      $update=true;
    }
  }

  else{

    $Title=$_POST["Title"];
    $Description=$_POST["Description"];
    
    $sql= "INSERT INTO `notes-` (`Title`, `Description`, `tstamp`) VALUES ('$Title', '$Description', current_timestamp())";

    $result=mysqli_query($conn,$sql);
   
    if($result){
      $insert=true;
    }
    else{
      echo"The Record Has Not Been Succesfull<br>";
    }
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>inotes- notes taking made easy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  </head>
  <body>
          <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
          Edit
        </button> -->
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel" name="editmodal">Update Note</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="/CRUD/index.php" method="POST">
                <div class="modal-body">
                  
                    <input type="hidden" name="snoEdit" id="snoEdit">
                  <div class="mb-3">
                    <label for="Title" class="form-label">Add Note</label>
                    <input type="Title" class="form-control" id="TitleEdit" name="TitleEdit" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="Description">Note Description</label>
                    <textarea class="form-control" name="DescriptionEdit" id="DescriptionEdit" style="height: 100px"></textarea>
                  </div> 
                </div>
                  <div class="modal-footer  d-block mr-auto ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
              </form>
            </div>
          </div>
        </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">iNotes</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/CRUD/index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us </a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <?php
            if($insert){
              echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>SUCCESS!</strong> YOUR NOTE HAS BEEN SUBMITED SUCCESSFULLY.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
      ?>
      <?php
            if($delete){
              echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>SUCCESS!</strong> YOUR NOTE HAS BEEN DELETED SUCCESSFULLY.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
      ?>
      <?php
            if($update){
              echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>SUCCESS!</strong> YOUR NOTE HAS BEEN UPDATE SUCCESSFULLY.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
      ?>
      <div class="container my-5">
        <form action="/CRUD/index.php" method="POST">
            <div class="mb-3">
              <label for="Title" class="form-label">Add Note</label>
              <input type="Title" class="form-control" id="Title" name="Title" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="Description">Note Description</label>
                <textarea class="form-control" name="Description" id="Description" style="height: 100px"></textarea>
              </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
          </form>
      </div>

      <div class="container my-4">
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col">S.no</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
                $sql="SELECT * FROM `notes-`";
                $result=mysqli_query($conn,$sql);
                $sno1=0;
                while($row=mysqli_fetch_assoc($result)){
                  $sno1=$sno1+1;
                  echo"<tr>
                          <th scope='row'>". $sno1 ."</th>
                          <td>". $row['Title'] ."</td>
                          <td>". $row['Description'] ."</td>
                          <td><button class='edit btn btn-sm btn-primary'data-bs-toggle='modal' data-bs-target='#editModal' id=". $row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary'id=d".$row['sno'].">Delete</button></td>
                      </tr>";
                }   
          ?>
          </tbody>
        </table>
      </div>
      <hr>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
      let table = new DataTable('#myTable');
    </script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element)=>{
          element.addEventListener("click",(e)=>{
            console.log("edit");
            tr=e.target.parentNode.parentNode;
          Title=tr.getElementsByTagName("td")[0].innerText;
          Description=tr.getElementsByTagName("td")[1].innerText;
          console.log(Title,Description);
          DescriptionEdit.value=Description;
          TitleEdit.value=Title;
          snoEdit.value=e.target.id;
          console.log(e.target.id);
          })
        }) 
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element)=>{
          element.addEventListener("click",(e)=>{
            console.log("delete");
           sno=e.target.id.substr(1,);
           if(confirm("Press a button!")){
            console.log("Yes");
            window.location=`/CRUD/index.php?delete=${sno}`;
           }
           else{
            console.log("No");
           }
          })
        })  
        
    </script>
  </body>
</html>