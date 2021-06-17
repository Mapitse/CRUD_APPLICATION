<?php
    //let's add the upload directory name in this file:
    $upload_dirname = '../uploads/';//all the uploaded text files will be saved in this directory
    //give the credentials needed for mysql connection
    $localhost = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'crud_db';

    //this line is needed for error handling
    mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
    //passing the connection credentials for database connection
    $dbconnection = new mysqli($localhost,$username,$password,$dbname);

    //if there is an error during database connection
    if($dbconnection->connect_error) {
        die("Connection to database: ".$dbname." failed ==> ".$dbconnection->connect_error);
    }
?>