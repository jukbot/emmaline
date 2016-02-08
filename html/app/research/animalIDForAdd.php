<?php 
require_once ('/var/www/html/app/model/connect.php');
    
    $sql = "SELECT ANIMALID,ANIMALNAME FROM EMM_ZOO.ANIMAL;";

    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
            while ($row = db2_fetch_assoc($stmt)) {
                print "<option value='". $row['ANIMALID']. "'>". $row['ANIMALID']. " - " .$row['ANIMALNAME']."</option>";   
            }
			
    }
    db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }
    	
?>