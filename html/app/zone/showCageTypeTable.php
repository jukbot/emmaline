<?php 
require_once ('/var/www/html/app/model/connect.php');

    $sql = "SELECT * FROM EMM_ZOO.CAGETYPE ORDER BY CAGETYPEID;";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
        while ($row = db2_fetch_assoc($stmt)) {
            print "<tr><td>" . $row['CAGETYPEID']. "</td><td>" . $row['CAGETYPENAME']. "</td>";
            print "<td><button type='button' data-toggle='modal' data-target='#cageTypeEdit" . $row['CAGETYPEID']. "' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></td>";
            
            print "<div class='modal fade' id='cageTypeEdit" . $row['CAGETYPEID']. "' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h2 class='text-center'><b>Cage Type Edit</b></h2>
                                </div>
                                <div class='modal-body'>
                                    <center>
                                        <form action='editCageTypeAction.php' method='post'>
                                        <b>Cage Type ID</b><br><input type='text' class='form-control' disabled='disabled' placeholder='" . $row['CAGETYPEID']. "'><br>
                                        <input type='hidden' name='cageTypeIdEdit' value='".$row['CAGETYPEID']."'>
                                        <b>New Cage Type Name</b><br><input type='text' class='form-control' name='cageTypeNameEdit' required><br>
                                        <button type='submit' name='editCageTypeSubmit' class='btn btn-info'>Edit</button>
                                        </form>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>";



            print "<form action='deleteCageTypeAction.php' method='post'>";
            print "<td><input type='hidden' name='deleteCageType' value='".$row['CAGETYPEID']."'>";
            print "<button type='submit' name='deleteCageTypeSubmit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td>";
            print "</form></tr>";
        }
    }
    db2_free_stmt($stmt);
    } 
    else {
        	echo db2_conn_errormsg($conn);
    }
?>