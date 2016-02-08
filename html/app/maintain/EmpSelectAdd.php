<?php 
require_once ('/var/www/html/app/model/connect.php');
    
    $sql = "SELECT * FROM EMM_ZOO.EMPLOYEE ORDER BY EMPID;";

    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
            while ($row = db2_fetch_assoc($stmt)) {
                print "<option value='". $row['EMPID']. "'>" .$row['EMPID']."   ".$row['FIRSTNAME']."   ".$row['LASTNAME']. "</option>";   
            }
    } 
    db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }
    	
?>