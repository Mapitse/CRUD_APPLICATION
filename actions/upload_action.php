<?php
    //to check the validity of the uploaded file
    $validUpload = true;
    //include the connection settings to the database
    require_once '../configs/dbconnetion.php';
    //ensure that the submit button is pressed
    if(isset($_POST['submit']) && $_FILES['file_name']['size'] > 0){
        //this is the original file name on the client machine
        $file = $_FILES['file_name']['name'];
        //returns the information about the path
        $path_info = pathinfo($file);
        //extract file name and file extension from the pathinfo method
        $file_name = $path_info['filename'];
        $file_ext = $path_info['extension'];

        //The temporary filename of the file in which the uploaded file was stored on the
        // server.
        $temp_name = $_FILES['file_name']['tmp_name'];
        //combine the upload directory, the file name and its extension 
        $path_file_name_ext = $upload_dirname.$file_name.'.'.$file_ext;

        //ensure that the file extension is .txt
        if($file_ext != 'txt'){
            $validUpload = false;
            header("Location: ../upload.php?error=ext");
        }

        //if the file selected is valid, continue with the upload process
        if($validUpload == true){
            //ensure that the file doest not exists
            //(file_exists — Checks whether a file or directory exists)
            if(file_exists($path_file_name_ext)){
                //echo "The file: ".$file_name.'.'.$file_ext. " already exists in the upload directory.<br>";
                //return to the upload page to display the error
                header("Location: ../upload.php?error=file_exists&file_name=$file_name&file_extension=$file_ext");
            }
            elseif(move_uploaded_file($temp_name,$path_file_name_ext)){
                //insert the file path to the database
                //using the prepared statement to avoid sql injection
                $insert_stmnt = $dbconnection->prepare("INSERT INTO `files`(file_name) VALUES(?)");
                //'s' stands for string
                $insert_stmnt->bind_param("s",$path_file_name_ext);
    
                //if the execution succeeded, redirect to the edit/delete page
                if($insert_stmnt->execute()){
                    header("Location: ../edit_delete.php");
                }
                else{
                    //echo 'Sorry! Something went wrong...';
                    //return to the upload page to display the error
                    header("Location: ../upload.php?error=insertion");
                }
            }
        }
    }
    else{
        header("Location: ../upload.php?error=empty");
    }

    
?>