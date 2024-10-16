$(document).ready(function(){
    
                //load table data

    function LoadTable(){
        $.ajax({
            url:"loadTable.php",
            type:"POST",
            success:function(data){
                $("#table_data").html(data);
            }
        })
    }
    LoadTable();
                    //ADD Data

    
                    $('#add_data').submit(function (e){
                        e.preventDefault();
                        var formData = new FormData(this);
                        
                        $.ajax({
                            url: 'add_data.php',                         
                            type: 'POST',
                            data: formData,
                            contentType: false, // Don't set contentType
                            processData: false, // Don't process data
                            success: function (response) {
                                console.log(response);
                                if (response.trim() === "Email already exists") {
                                    alert("Email already exists");
                                }
                                $("#close").click();
                                LoadTable();
                                $("add_data").reset();        
                            },
                            error: function (xhr, status, error) {
                             // Handle error
                            console.error(xhr.responseText);
                            }
                        });
                    });

                    //DELTE BTN

        $(document).on("click",".delete_btn",function(){
            if(confirm("DO YOU WANT TO DELETE THIS RECORD")){
                var productID=$(this).data("id");
                
                var element=this;
                $.ajax({
                    url:"delete.php",
                    type:"POST",
                    data:{id:productID},
                    success:function(data){
                        console.log(data);
                        if(data == 1){
                            $(element).closest("tr").fadeOut();
                            LoadTable();
                        }
                    }
                })
            }
        })
                        //EDit Btn
        $(document).on("click",".edit_btn",function(){
                var productID=$(this).data("id");
                
               $("#Edit_btn").click(); 
                $.ajax({
                    url:"edit_modal.php",
                    type:"POST",
                    data:{id:productID},
                    success:function(data){
                        $("#edit_modal").html(data);
                        
                    }
                })
            
        })
                        //Update Data

        $(document).on("click","#update_data",function(){
                var formData=new FormData($("#edit_form")[0]);

                $.ajax({
                    url:"update_data.php",
                    type:"POST",                
                    data:formData,
                    contentType:false,
                    processData:false,
                    success:function(response){
                        if(response == 1){
                            $("#closed").click();
                            LoadTable();
                        }
                        console.log(response);
                    },
                    error: function (xhr, status, error) {
                     // Handle error
                    console.error(xhr.responseText);
                    }
                })
        })


})