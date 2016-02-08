<?php 
require_once ('/var/www/html/app/model/connect.php');

    $sql = "SELECT * FROM EMM_ZOO.ZONE INNER JOIN EMM_ZOO.BUILDING ON (EMM_ZOO.ZONE.ZONEID = EMM_ZOO.BUILDING.ZONEID) ORDER BY BUILDINGID;";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
        while ($row = db2_fetch_assoc($stmt)) {
            print "<tr><td>" . $row['BUILDINGID']. "</td><td>" . $row['BUILDINGNAME']. "</td><td>" . $row['ZONENAME']. "</td>";
            print "<td><button type='button' data-toggle='modal' data-target='#buildingEdit" . $row['BUILDINGID']. "' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></td>";
            
            print "<div class='modal fade' id='buildingEdit" . $row['BUILDINGID']. "' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h2 class='text-center'><b>Building Edit</b></h2>
                                </div>
                                <div class='modal-body'>
                                    <center>
                                        <form action='editBuildingAction.php' method='post'>
                                        <b>Building ID</b><br><input type='text' class='form-control' disabled='disabled' placeholder='" . $row['BUILDINGID']. "'><br>
                                        <b>Zone Name</b><br><input type='text' class='form-control' disabled='disabled' placeholder='" . $row['ZONENAME']. "'><br>
                                        <input type='hidden' name='buildingIdEdit' value='".$row['BUILDINGID']."'>
                                        <b>New Building Name</b><br><input type='text' class='form-control' name='buildingNameEdit' required><br>
                                        <button type='submit' name='editBuildingSubmit' class='btn btn-info'>Edit</button>
                                        </form>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>";

            print "<form action='deleteBuildingAction.php' method='post'>";
            print "<td><input type='hidden' name='deleteBuilding' value='".$row['BUILDINGID']."'>";
            print "<button type='submit' name='deleteBuildingSubmit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td>";
            print "</form></tr>";
        }
    }
    db2_free_stmt($stmt);
    } 
    else {
        	echo db2_conn_errormsg($conn);
    }
?>