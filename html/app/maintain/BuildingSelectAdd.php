<?php 
require_once ('/var/www/html/app/model/connect.php');
    
    $sql = "SELECT BUILDINGNAME FROM EMM_ZOO.BUILDING ORDER BY BUILDINGID;";

    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
            while ($row = db2_fetch_assoc($stmt)) {
                print "<option value='". $row['BUILDINGID']. "'>" .$row['BUILDINGNAME']. "</option>";   
            }
    }
    db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }
        
?>