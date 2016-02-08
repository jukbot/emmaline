<?php 
require_once ('/var/www/html/app/model/connect.php');

    $sql = "SELECT * FROM EMM_ZOO.TOYTYPE ORDER BY TOYTYPEID;";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
        while ($row = db2_fetch_assoc($stmt)) {
            print "<tr><td>" . $row['TOYTYPEID']. "</td><td>" . $row['TOYTYPENAME']. "</td>";
            print "<td><button type='button' data-toggle='modal' data-target='#toyTypeEdit" . $row['TOYTYPEID']. "' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></td>";
            
            print "<div class='modal fade' id='toyTypeEdit" . $row['TOYTYPEID']. "' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h2 class='text-center'><b>Toy Type Edit</b></h2>
                                </div>
                                <div class='modal-body'>
                                    <center>
                                        <form action='editToyTypeAction.php' method='post'>
                                        <b>Toy Type ID</b><br><input type='text' class='form-control' disabled='disabled' placeholder='" . $row['TOYTYPEID']. "'><br>
                                        <input type='hidden' name='toyTypeIdEdit' value='".$row['TOYTYPEID']."'>
                                        <b>New Toy Type Name</b><br><input type='text' class='form-control' name='toyTypeNameEdit' required><br>
                                        <button type='submit' name='editToyTypeSubmit' class='btn btn-info'>Edit</button>
                                        </form>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>";


            print "<form action='deleteToyTypeAction.php' method='post'>";
            print "<td><input type='hidden' name='deleteToyType' value='".$row['TOYTYPEID']."'>";
            print "<button type='submit' name='deleteToyTypeSubmit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td>";
            print "</form></tr>";
        }
    }
    db2_free_stmt($stmt);
    } 
    else {
        	echo db2_conn_errormsg($conn);
    }
?>