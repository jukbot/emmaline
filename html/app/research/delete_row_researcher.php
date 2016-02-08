
<?php 
require_once ('/var/www/html/app/model/connect.php');
    
	echo $_POST["EMPID"];
	echo $_POST["ANIMALID"];
    $sql = "DELETE FROM EMM_ZOO.researcher WHERE empid=".$_POST["EMPID"]." and animalid=".$_POST["ANIMALID"].";" ;	
	echo $sql;
	
    if ($conn) {
        $stmt = db2_exec($conn, $sql);

		db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }
    	
?>

