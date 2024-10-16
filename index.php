<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div>           
       
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        ADD DETAILS
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  id="close" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="add_data" role="form" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputnName" class="form-label">FULL NAME</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">PHONE NUMBER</label>
                            <input type="number" class="form-control" id="number" name="number">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">IMAGE 1 </label>
                            <input type="file" class="form-control" id="img1" name="img1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">IMAGE 2 </label>
                            <input type="file" class="form-control" id="img2" name="img2">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>          
            </div>
        </div>
    </div>
                                <!-- Data Load Table -->
    <div class="container">
        <div class="row">
            <div class="m-auto">
                <table class="table table-hover border my-6">
                    <tr>
                        <td id="table_data">

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

                                                <!-- Update Data -->
                                                 <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="Edit_btn" data-bs-target="#UpdateModal" style="display:none">
        Update
        </button>

        <!-- Modal -->
        <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="edit_modal">
                        
                    </div>
                </div>
            </div>
        </div>
                

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
    <script src="jquery.js"></script>
  </body>
</html>