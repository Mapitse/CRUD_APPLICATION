<?php
    require_once './layout/header.php';
    //include the connection settings to the database
    require_once './configs/dbconnetion.php';
    //select all files from the database to display on the table
    if(isset($_GET['id'])){
        $stmnt = $dbconnection->prepare('SELECT * FROM `files` WHERE id = ?');
        //'i' stands for string
        $stmnt->bind_param("i",$_GET['id']);
        $stmnt->execute();
        $result_set = $stmnt->get_result();
        $row = $result_set->fetch_assoc();
        $file_id = $row['id'];
        $file_name = $row['file_name'];
    }

    //NOW THAT WE SEE THAT IT WORKS, LET'S DESIGN THE edit.php FILE
    //I AM GOING TO COPY THE DESIGN FROM SOMEWHERE TO MAKE THING SIMPLE FOR US
?>

<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-center">EDIT FILE</div>
                    <div class="card-body">
                        <form action="./actions/edit_action.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="id" class="form-label">ID</label>
                                <!-- we assign the value for the database (id) to the id field -->
                                <input type="text" class="form-control" id="id" name="id" value=<?php echo $file_id; ?>>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">FILE NAME</label>
                                <!-- we assign the value for the database (file_name) to the name field -->
                                <input type="text" class="form-control" id="name" name="name" value=<?php echo $file_name; ?>>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">NEW FILE NAME</label>
                                <!-- we will update the file name using this field -->
                                <input type="text" class="form-control" id="new_name" name="new_name" placeholder="../uploads/somefile.txt">
                            </div>
                            <div class="row align-items-start">
                                <div class="col">
                                    
                                </div>
                                <div class="col">
                                <button class="w-100 btn btn-lg btn-primary" type="submit" name="updateFile">Update</button>
                                </div>
                                <div class="col">
                                    <!--<button class="w-100 btn btn-lg btn-primary" type="submit" name="updateFile">Update</button>-->
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>