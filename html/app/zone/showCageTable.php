<?php 
require_once ('/var/www/html/app/model/connect.php');

    $sql = " SELECT * FROM EMM_ZOO.CAGETYPE INNER JOIN EMM_ZOO.CAGE ON (EMM_ZOO.CAGETYPE.CAGETYPEID = EMM_ZOO.CAGE.CAGETYPEID) INNER JOIN EMM_ZOO.EMPLOYEE ON
            (EMM_ZOO.CAGE.CAGEKEEPERID = EMM_ZOO.EMPLOYEE.EMPID) INNER JOIN EMM_ZOO.BUILDING ON (EMM_ZOO.CAGE.BUILDINGID = EMM_ZOO.BUILDING.BUILDINGID) ORDER BY CAGEID;";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
        while ($row = db2_fetch_assoc($stmt)) {
            print "<tr><td>" . $row['CAGEID']. "</td><td>" . $row['CAGENAME']. "</td><td>" . $row['CAGETYPENAME']. "</td><td>". $row['BUILDINGNAME']. 
                  "</td><td>" . $row['FIRSTNAME'] . " " . $row['LASTNAME']. "</td>";
            print "<td><button type='button' data-toggle='modal' data-target='#cageEdit" . $row['CAGEID']. "' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span></button></td>";
            
            print "<div class='modal fade' id='cageEdit" . $row['CAGEID']. "' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h2 class='text-center'><b>Cage Edit</b></h2>
                                </div>
                                <div class='modal-body'>
                                    <center>
                                        <form action='editCageAction.php' method='post'>
                                        <b>CAGE ID</b><br><input type='text' class='form-control' disabled='disabled' placeholder='" . $row['CAGEID']. "'><br>
                                        <b>CAGE Type</b><br><input type='text' class='form-control' disabled='disabled' placeholder='" . $row['CAGETYPENAME']. "'><br>
                                        <b>Building Name</b><br><input type='text' class='form-control' disabled='disabled' placeholder='" . $row['BUILDINGNAME']. "'><br>
                                        <b>Cage Keeper Name</b><br><input type='text' class='form-control' disabled='disabled' placeholder='" . $row['FIRSTNAME'] . " " . $row['LASTNAME']. "'><br>
                                        <input type='hidden' name='cageIdEdit' value='".$row['CAGEID']."'>
                                        <b>New Cage Name</b><br><input type='text' class='form-control' name='cageNameEdit' required><br>
                                        <button type='submit' name='editCageSubmit' class='btn btn-info'>Edit</button>
                                        </form>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>";


            print "<form action='deleteCageAction.php' method='post'>";
            print "<td><input type='hidden' name='deleteCage' value='".$row['CAGEID']."'>";
            print "<button type='submit' name='deleteCageSubmit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-remove'></span></button></td>";
            print "</form></tr>";
        }
    }
    db2_free_stmt($stmt);
    } 
    else {
    	echo db2_conn_errormsg($conn);
    }
?>