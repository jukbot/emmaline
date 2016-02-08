<?php 
require_once ('/var/www/html/app/model/connect.php');
    $conn = dbConnect();
    $sql = "SELECT MAINTEGERAINID FROM EMM_ZOO.MAINTAININFO 
ORDER BY MAINTEGERAINID;";

    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
            while ($row = db2_fetch_array($stmt)) {
                print "<option value='". $row['0']. "'>" .$row['0']. "</option>";
            }
    }
    db2_free_stmt($stmt);
    db2_close($conn);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }
        
?>
