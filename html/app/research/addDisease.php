
<?php 
require_once ('/var/www/html/app/model/connect.php');
    
	
    $sql = "INSERT INTO EMM_ZOO.animaldisease (DISEASEID, COMMON_NAME, SPREADING_PERIOD) VALUES (". $_POST["diseaseid"] .", '" . $_POST["name"] ."', '" . $_POST["spread"] ."' );" ;	
	//echo $sql;
    if ($conn) {
        $stmt = db2_exec($conn, $sql);

		db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }
    	
	$sql = "INSERT INTO EMM_ZOO.diseasesymptom (symptomid,blood,skin,mucus,behaviorchange,infection,organ1,organ2,organ3) VALUES (". $_POST["symid"] .", '" . $_POST["blood"] ."', '". $_POST["skin"] ."','". $_POST["mucus"] . "','". $_POST["behave"] ."','". $_POST["infect"] ."','". $_POST["organ"] ."','no','no' );" ;	
	//echo $sql;
    if ($conn) {
        $stmt = db2_exec($conn, $sql);

		db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }

    $sql = "INSERT INTO EMM_ZOO.disease_link (DISEASEID, symptomid ) VALUES (". $_POST["diseaseid"] .", " . $_POST["symid"] ." );" ;	
	//echo $sql;
    if ($conn) {
        $stmt = db2_exec($conn, $sql);

		db2_free_stmt($stmt);
    } 
    else {
        echo db2_conn_errormsg($conn);
    }	
?>


