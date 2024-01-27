<?php
$serach_value=$_POST['search'];

$conn=mysqli_connect("localhost","root","","table")or die("Connection was failed");
$limit_per_page=5;
$page="";
if(isset($_POST['page_no'])){
    $page=$_POST['page_no'];
}
else{
    $page=1;
}
$offset=($page-1) * $limit_per_page;
$sql="SELECT * FROM  student WHERE first_name LIKE '%{$serach_value}%' OR last_name LIKE '%{$serach_value}%'";
$result=mysqli_query($conn,$sql) or die("SQL QUERY FAILED"); 
    $output="";
    if(mysqli_num_rows($result) > 0){
        $output='<table class="load-table" border="1" width="100%" cellspacing="0" sellpadding="10px">
                    <tr>
                        <th width="100px">Id</th>
                        <th>Name</th>
                        <th width="100px">Edit</th>
                        <th width="100px">Delete</th>
                    </tr>';
            while($row=mysqli_fetch_assoc($result)){
                $output .= "<tr><td>{$row["id"]}</td><td>{$row["first_name"]} {$row["last_name"]}</td><td><button class='edit-btn' data-id='{$row["id"]}'>EDIT</button></td><td><button class='delete-btn' data-id='{$row["id"]}'>DELETE</button></td></tr>";
            }

        $output .="</table>";
        $sql_total="SELECT * FROM student";
        $records=mysqli_query($conn,$sql_total);
        $total_records=mysqli_num_rows($records);
        $total_pages=ceil($total_records/$limit_per_page);

            $output.='<div id="pagination">';
        for($i=1; $i <= $total_pages; $i++){
            if($i== $page){
                $class_name="active";
            }else{
                $class_name="";
            }
            $output.="<a class='{$class_name}' id='{$i}' herf=''>{$i}</a>";
        }
        $output.='</div>';
        mysqli_close($conn);
        echo $output;
    }
    else{
        echo "<h2>No Record Found</h2>";
    }
?>