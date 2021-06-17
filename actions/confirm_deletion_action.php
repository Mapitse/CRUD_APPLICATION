<?php
    require_once '../layout/confirm_deletion_header.php';
    //include the connection settings to the database
    require_once '../configs/dbconnetion.php';
    //select all files from the database to display on the table
    if(isset($_GET['id'])){
        confirmDeletionMessage();
        // //$stmnt = $dbconnection->prepare('DELETE FROM `files` WHERE id = ?');
        // $stmnt = $dbconnection->prepare('SELECT * FROM `files` WHERE id = ?');
        // //'i' stands for string
        // $stmnt->bind_param("i",$_GET['id']);
        // // if($stmnt->execute()){
        // //     header("Location: ../edit_delete.php");
        // // }
        // if($stmnt->execute()){
        //     $result_set = $stmnt->get_result();
        //     $row = $result_set->fetch_assoc();
        //     $file_id = $row['id'];
        //     $file_name = $row['file_name'];
            
        // }
        
        // $result_set = $stmnt->get_result();
        // $row = $result_set->fetch_assoc();
        // $file_id = $row['id'];
        // $file_name = $row['file_name'];
        // confirmDeletionMessage($file_name);
    }

    function confirmDeletionMessage(){
        $message = '
            <div class="modal fade" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title h4" id="exampleModalFullscreenLabel">Full screen modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
        ';
        echo $message;
    }
?>
