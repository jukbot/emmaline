<?php
    require_once ('/var/www/html/app/model/connect.php');

    $id = $_POST['id'];

    $sql = "DELETE FROM EMM_ZOO.CAFE_BRANCH WHERE BRANCHID=".$id.";";
    if ($conn) {
        $stmt = db2_exec($conn, $sql);
        header('location:index.php');
        db2_free_stmt($stmt);
    } 
    else {
    	echo db2_conn_errormsg($conn);
    }
 }
 ?>
?>