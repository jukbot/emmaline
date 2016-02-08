<?php 
require_once ('/var/www/html/app/model/connect.php');

    $sql = "SELECT * FROM EMM_ZOO.ZONETYPE INNER JOIN EMM_ZOO.ZONE ON (EMM_ZOO.ZONETYPE.ZONETYPEID = EMM_ZOO.ZONE.ZONETYPEID) ORDER BY ZONEID;";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
        while ($row = db2_fetch_assoc($stmt)) {
            print "<tr><td>" . $row['ZONEID']. "</td><td>" . $row['ZONETYPENAME']. "</td><td>" . $row['ZONENAME']. "</td>";
            print "<td><button type='button' data-toggle='modal' data-target='#zoneEdit" . $row['ZONEID']. "' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></td>";
            
            print "<div class='modal fade' id='zoneEdit" . $row['ZONEID']. "' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h2 class='text-center'><b>Zone Edit</b></h2>
                                </div>
                                <div class='modal-body'>
                                    <center>
                                        <form action='editZoneAction.php' method='post'>
                                        <b>Zone ID</b><br><input type='text' class='form-control' disabled='disabled' placeholder='" . $row['ZONEID']. "'><br>
                                        <b>Zone Type</b><br><input type='text' class='form-control' disabled='disabled' placeholder='" . $row['ZONETYPENAME']. "'><br>
                                        <input type='hidden' name='zoneIdEdit' value='".$row['ZONEID']."'>
                                        <b>New Zone Name</b><br><input type='text' class='form-control' name='zoneNameEdit' required><br>
                                        <button type='submit' name='editZoneSubmit' class='btn btn-info'>Edit</button>
                                        </form>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>";



            print "<form action='deleteZoneAction.php' method='post'>";
            print "<td><input type='hidden' name='deleteZone' value='".$row['ZONEID']."'>";
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