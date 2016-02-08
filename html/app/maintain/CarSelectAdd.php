<?php 
require_once ('/var/www/html/app/model/connect.php');
    
    $sql = "SELECT * FROM EMM_ZOO.CARS ORDER BY CARID;";

    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
            while ($row = db2_fetch_assoc($stmt)) {
                print "<option value='". $row['CARID']. "'>" .$row['CARID']. "</option>";   
            }
    }
    db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }
    	
?>