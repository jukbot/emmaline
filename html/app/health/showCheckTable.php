<?php 
require_once ('/var/www/html/app/model/connect.php');

    $sql = "SELECT * FROM EMM_ZOO.ANIMAL_CHECK;";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
        while ($row = db2_fetch_assoc($stmt)) {
            print "<tr><td>" . $row['CHECKID']. "</td><td>" . $row['EMPID']. "</td><td>" . $row['ANIMALID']. "</td><td>". $row['STATUS'] ."</td>";
            // ADD to DB
            print "<td><button type='button' data-toggle='modal' data-target='#checkEdit" . $row['CHECKID']. "' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></td>";
            
            print "<div class='modal fade' id='checkEdit" . $row['CHECKID']. "' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h2 class='text-center'><b>Check Edit</b></h2>
                                </div>
                                <div class='modal-body'>
                                    <center>
                                        <form action='editCheck.php' method='post'>
                                        <b>Check ID</b><br><input type='text' class='form-control' disabled='disabled' placeholder='" . $row['CHECKID']. "'><br>
                                        <b>Animal ID</b><br><input type='text' class='form-control' disabled='disabled' placeholder='" . $row['STATUS']. "'><br>
                                        <input type='hidden' name='checkIdEdit' value='".$row['CHECKID']."'>
                                        <b>Update Animal's Health</b><br><input type='text' class='form-control' name='statusA' required><br>
                                        <button type='submit' name='editZoneSubmit' class='btn btn-info'>Edit</button>
                                        </form>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>";


            // DELEATE
            print "<form action='deleteCheck.php' method='post'>";
            print "<td><input type='hidden' name='deleteCheckID' value='".$row['CHECKID']."'>";
            print "<button type='submit' name='deleteZoneSubmit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td>";
            print "</form></tr>";
            
        }
    }
    db2_free_stmt($stmt);
    } 
    else {
    	echo db2_conn_errormsg($conn);
    }
?>