
<?php 
require_once ('/var/www/html/app/model/connect.php');
    

    $sql = "DELETE FROM EMM_ZOO.disease_link WHERE diseaseid=".$_POST["diseaseid"].";" ;	
	echo $sql;
	
    if ($conn) {
        $stmt = db2_exec($conn, $sql);

		db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }
    	
	$sql = "DELETE FROM EMM_ZOO.animaldisease WHERE diseaseid=".$_POST["diseaseid"].";" ;	
	echo $sql;
	
    if ($conn) {
        $stmt = db2_exec($conn, $sql);

		db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }	
?>

