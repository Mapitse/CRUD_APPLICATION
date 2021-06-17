<?php
    require_once './layout/header.php';
    //include the connection settings to the database
    require_once './configs/dbconnetion.php';
    //select all files from the database to display on the table
    $result_set = $dbconnection->query('SELECT * FROM `files` ORDER BY id ASC');   
    
?>

<div class="col">
    <div class="card">
        <div class="card-body">
            <span class="img-container">
                <img class="mb-4" src="./assets/brand.png" alt="" width="72" height="57">
            </span>
            <h1 class="card-title  txt-container">Edit/Delete</h1>
            <table class="table table-dark table-borderless">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">FILE NAME</th>
                        <th scope="col">EDIT OPERATION</th>
                        <th scope="col">DELETE OPERATION</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        //let's use the foreach loop to iterate through the array of table result set
                        foreach($result_set as $row){
                            echo "<tr>";
                                echo "<th scope='row'>".$row['id']."</th>";
                                echo "<td>".$row['file_name']."</td>";
                                //we parse parameters to the edit_action.php and delete_action.php file 
                                echo "<td><a href='edit.php?id=$row[id]'><button type='button' class='btn btn-primary'>Edit</button></a></td>";
                                //echo "<td><a href='edit_delete.php?id=$row[id]''><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdropLive'>Delete</button></a></td>";
                                
                    ?>          <td>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropLive">
                                        Delete
                                    </button>
                                </td>
                    <?php
                                //echo "<td><a href='edit_delete.php?id=$row[id]'><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdropLive'>Delete</button></a></td>";
                            echo "</tr>";
                        }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdropLive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLiveLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>I will not close if you click outside me. Don't even try to press escape key.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <?php echo "<a href='edit_delete.php?id=$row[id]'>"; ?><button type="button" class="btn btn-primary">Understood</button></a>
      </div>
    </div>
  </div>
</div>

<?php
    //include the footer to the file
    require_once './layout/footer.php';
?>
