<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert_data</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>PHP & AJAX CRUD</h1>
                <div id="search-bar">
                <label for="">search :</label>
                <input type="text" id="search" >  
                </div>
            </td>
        </tr>
        <tr>    
            <td id="table-from">
                 <form id="addform">
                    First Name: <input type="text" id="fname">
                    Last Name: <input type="text" id="lname">
                    <input type="submit" id="save-button" value="save">
                </form> 
            </td>
        </tr>
        <tr>
            <td id="table-data">
            </td>
        </tr>
    </table>
    <div id="error-message"></div>
    <div id="success-message"></div>
    <div id="modal">
        <div id="modal-form">
            <h2>EDIT MODAL</h2>
            <table width="100%" cellpadding="10">
                
            </table>
            <div id="close-btn">x</div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        //Load Table Records
        $(document).ready(function(){
            function loadtable(page){
                $.ajax({
                    url:"ajax-load.php",
                    type:"POST",
                    data:{page_no:page},
                    success : function(data){
                        $("#table-data").html(data);
                    }                   
                });
            }
            loadtable();
            //pagination
                $(document).on("click","#pagination a",function(e){
                    e.preventDefault();
                    var page_id= $(this).attr("id");
                    loadtable(page_id);
                })
            //Insert Table Records
            $("#save-button").on("click",function(e){
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();
                if(fname=="" || lname==""){
                    $("#error-message").html("ALL FIELDS ARE REQUiRED").slideDown();
                    $("#success-message").slideUp();
                }
                else{
                    $.ajax({
                    url:"ajax-insert.php",
                    type: "POST",
                    data:{first_name:fname, last_name:lname},
                    success:function(data){
                        if(data == 1){
                            loadtable();
                            $("#addform").trigger("reset");
                            $("#success-message").html("DATA HAS BEEN SAVE").slideDown();
                            $("#error-message").slideUp();
                        }
                        else{
                            $("#error-message").html("DATA CAN'T BE SAVE").slideDown();
                            $("#success-message").slideUp();
                        }                        
                    }

                });
                }
            })
            //Delete Table Records
            $(document).on("click",".delete-btn",function(){
                if(confirm("DO YOU WANT TO DELET DATA")){
                    var studentid=$(this).data("id");
                    var element=this;
                    $.ajax({
                        url:"ajax-delete.php",
                        type:"POST",
                        data:{id : studentid},
                        success : function(data){
                            if(data ==1 ){
                                $(element).closest("tr").fadeOut();
                                $("#success-message").html("DATA HAS BEEN DELETED").slideDown();
                                $("#error-message").slideUp();
                            }
                            else{
                                $("#error-message").html("DATA CAN'T DELETE").slideDown();
                                $("#success-message").slideUp();
                            }
                        }
                    }) 

                }
            })
            //Show Modal Box
            $(document).on("click",".edit-btn",function(){
                $("#modal").show();
                var studentid=$(this).data("id")
                $.ajax({
                    url:"load-update.php",
                    type:"POST",
                    data:{id:studentid},
                    success:function(data){
                        $("#modal-form table").html(data);
                    }
                })
            })
            //Hide Model Box
            $("#close-btn").on("click",function(e){
                $("#modal").hide();
            })
            //Update Modal Box
            $(document).on("click","#edit-submit",function(){
                var stuid=$("#edit-id").val();
                var fname=$("#edit-fname").val();
                var lname=$("#edit-lname").val();

                $.ajax({
                    url:"ajax-update-form.php",
                    type:"POST",
                    data:{id: stuid,first_name: fname,last_name: lname},
                    success:function(data){   
                        if(data == 1){
                            $("#modal").hide();
                            loadtable();
                            $("#success-message").html("DATA HAS BEEN UPDATE").slideDown();
                            $("#error-message").slideUp();
                        }
                        else{
                            $("#error-message").html("DATA CAN'T BE UPDATE").slideDown();
                            $("#success-message").slideUp();
                        }
                    }
                })
            })
            //live Search
            $("#search").on("keyup",function(){ 
                var search_term=$(this).val();

                $.ajax({
                    url:"ajax-live-search.php",
                    type:"POST",
                    data:{search:search_term},
                    success:function(data){
                        $("#table-data").html(data);
                        $('#search'). reset();
                    }
                })
            })
            
        });
        
    </script>
</body>
</html>