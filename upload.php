<?php
    require_once './layout/upload_header.php';
?>

<div class="form-signin">
  <form action="./actions/upload_action.php" method="POST" enctype="multipart/form-data">
    <span class="img-container">
        <img class="mb-4" src="./assets/brand.png" alt="" width="72" height="57">
    </span>

    <h1 class="h3 mb-3 fw-normal txt-container">Please select a file</h1>

    <div class="mb-3">
        <!-- file_name is what we are to reference in our action php file -->
        <input type="file" name="file_name" class="form-control form-control-sm">
    </div>
    <?php 
      //if there is an error from the url
      if(isset($_GET['error'])){
        $error_type = $_GET['error'];
        //print the error on the page
        if($error_type == "empty"){
          ErrorAlert("Please select the file before you submit.");
        }elseif($error_type == "ext"){
          ErrorAlert("Error! Only text (.txt) files are allowed");         
        }elseif($error_type == "file_exists"){
          $file_exists_error = "The file: ".$_GET['file_name'].'.'.$_GET['file_extension']. " already exists in the upload directory.";
          ErrorAlert($file_exists_error);
        }elseif($error_type == "insertion"){
          ErrorAlert("Error! Something went wrong when saving to the database."); 
        }
      }

      //LET'S TRY TO STYLE OUR ERROR MESSAGES SO THAT THEY LOOK BETTER
      function ErrorAlert($message){
        //if the message is not empty, show the error
        if(!empty($message)){
          $error = '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">'
              //now we add our error message
              .$message.
              '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          ';
          echo $error;
        }
      }

      function modalDialog(){
        $dialog = '
            <div class="modal fade" id="exampleModalDefault" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>
        ';
        echo $dialog;
    } 
    ?> 

      
    <!-- submit is what we are to reference in our action php file -->
    <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Upload File</button>
  </form>
</div>

