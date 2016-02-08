<?php 
require_once ('/var/www/html/app/model/connect.php');

    $sql = "SELECT * FROM EMM_ZOO.ZONETYPE ORDER BY ZONETYPEID;";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
        while ($row = db2_fetch_assoc($stmt)) {
            print "<tr><td>" . $row['ZONETYPEID']. "</td><td>" . $row['ZONETYPENAME'] . "</td>";
            print "<td><button type='button' data-toggle='modal' data-target='#zoneTypeEdit" . $row['ZONETYPEID']. "' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></td>";
            
            print "<div class='modal fade' id='zoneTypeEdit" . $row['ZONETYPEID']. "' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h2 class='text-center'><b>Zone Type Edit</b></h2>
                                </div>
                                <div class='modal-body'>
                                    <center>
                                        <form action='editZoneTypeAction.php' method='post'>
                                        <b>Zone Type ID</b><br><input type='text' class='form-control' disabled='disabled' placeholder='" . $row['ZONETYPEID']. "'><br>
                                        <input type='hidden' name='zoneTypeIdEdit' value='".$row['ZONETYPEID']."'>
                                        <b>New Zone Type Name</b><br><input type='text' class='form-control' name='zoneTypeNameEdit' required><br>
                                        <button type='submit' name='editZoneTypeSubmit' class='btn btn-info'>Edit</button>
                                        </form>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>";

            print "<form action='deleteZoneTypeAction.php' method='post'>";
            print "<td><input type='hidden' name='deleteZoneType' value='".$row['ZONETYPEID']."'>";
            print "<button type='submit' name='deleteZoneTypeSubmit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td>";
            print "</form></tr>";
        }
    }
    db2_free_stmt($stmt);
    } 
    else {
    	echo db2_conn_errormsg($conn);
    }
?>