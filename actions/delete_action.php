<?php
    //include the connection settings to the database
    require_once '../configs/dbconnetion.php';
    //select all files from the database to display on the table
    if(isset($_GET['id'])){
        //$stmnt = $dbconnection->prepare('DELETE FROM `files` WHERE id = ?');
        $stmnt = $dbconnection->prepare('SELECT * FROM `files` WHERE id = ?');
        //'i' stands for string
        $stmnt->bind_param("i",$_GET['id']);
        // if($stmnt->execute()){
        //     header("Location: ../edit_delete.php");
        // }
        $stmnt->execute();
        $result_set = $stmnt->get_result();
        $row = $result_set->fetch_assoc();
        $file_id = $row['id'];
        $file_name = $row['file_name'];

        echo 'File ID: '.$file_id.'<br>';
        echo 'File Name: '.$file_name.'<br>';
    }
?>