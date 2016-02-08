<?php 
require_once ('/var/www/html/app/model/connect.php');
    $id = $_POST['delete_PubMed'];
    $sql = "DELETE FROM EMM_ZOO.PUBMEDREFERENCES WHERE PUBMEDID = $id;";

    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        if($stmt) {
            #while ($row = db2_fetch_assoc($stmt)) {
                echo "<script>";
				echo "alert('Added successfully')";
				echo "</script>";
				header("Refresh:0; url=PubMedRef.php"); 
            #}
    }
    db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }
    	
?>